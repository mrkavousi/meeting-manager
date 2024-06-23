<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\AccountingBook;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function create($book_id)
    {
        $book = AccountingBook::where('id', $book_id)->where('user_id', Auth::id())->firstOrFail();
        return view('transactions.create', compact('book'));
    }

    public function store(Request $request, $book_id)
    {
        $book = AccountingBook::where('id', $book_id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        Transaction::create([
            'accounting_book_id' => $book->id,
            'type' => $request->type,
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        return redirect()->route('accounting_books.show', $book->id)->with('success', 'Transaction added successfully');
    }
}
