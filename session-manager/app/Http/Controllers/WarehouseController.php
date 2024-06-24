<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Auth;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::where('user_id', Auth::id())->get();
        return view('warehouses.index', compact('warehouses'));
    }

    public function create()
    {
        return view('warehouses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Warehouse::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
        ]);

        return redirect()->route('warehouses.index')->with('success', 'Warehouse created successfully');
    }

    public function show($id)
    {
        $warehouse = Warehouse::with('items')->where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('warehouses.show', compact('warehouse'));
    }
}
