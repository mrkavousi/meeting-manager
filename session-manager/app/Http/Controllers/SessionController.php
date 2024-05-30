<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::all();
        return view('sessions.index', compact('sessions'));
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required|string|max:255',
            'participants' => 'required|string',
            'agenda' => 'required|string',
            'summary' => 'required|string',
            'actions' => 'required|string',
            'follow_up_items' => 'required|string',
            'next_meeting' => 'required|string|max:255',
        ]);

        Session::create($request->all());

        return redirect()->route('sessions.index')->with('success', 'Session created successfully.');
    }

    public function show(Session $session)
    {
        return view('sessions.show', compact('session'));
    }

    public function edit(Session $session)
    {
        return view('sessions.edit', compact('session'));
    }

    public function update(Request $request, Session $session)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'location' => 'required|string|max:255',
            'participants' => 'required|string',
            'agenda' => 'required|string',
            'summary' => 'required|string',
            'actions' => 'required|string',
            'follow_up_items' => 'required|string',
            'next_meeting' => 'required|string|max:255',
        ]);

        $session->update($request->all());

        return redirect()->route('sessions.index')->with('success', 'Session updated successfully.');
    }

    public function destroy(Session $session)
    {
        // Check if the user is authorized to delete the session
        // $this->authorize('delete', $session);

        try {
            // Attempt to delete the session
            $session->delete();

            // Redirect with success message
            return redirect()->route('sessions.index')->with('success', 'Session deleted successfully.');
        } catch (\Exception $e) {
            // Handle the error and redirect with an error message
            return redirect()->route('sessions.index')->with('error', 'Failed to delete the session.');
        }
    }
}
