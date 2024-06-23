<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountingBook;
use Illuminate\Support\Facades\Auth;

class AccountingBookController extends Controller
{
    public function index()
    {
        $books = AccountingBook::where('user_id', Auth::id())->get();
        return view('accounting_books.index', compact('books'));
    }

    public function create()
    {
        return view('accounting_books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        AccountingBook::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
        ]);

        return redirect()->route('accounting_books.index')->with('success', 'Accounting book created successfully');
    }

    public function show($id)
    {
        $book = AccountingBook::with('transactions')->where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('accounting_books.show', compact('book'));
    }
}
