@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Transaction to {{ $book->name }}</h1>
    <form method="POST" action="{{ route('transactions.store', $book->id) }}">
        @csrf
        <div class="form-group">
            <label for="type">Type</label>
            <select class="form-control" id="type" name="type" required>
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
