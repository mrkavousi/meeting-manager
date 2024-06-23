@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $book->name }}</h1>
    <a href="{{ route('transactions.create', $book->id) }}" class="btn btn-primary">Add Transaction</a>
    <ul class="list-group mt-4">
        @foreach($book->transactions as $transaction)
        <li class="list-group-item">
            <strong>{{ ucfirst($transaction->type) }}:</strong> ${{ $transaction->amount }}<br>
            {{ $transaction->description }}
        </li>
        @endforeach
    </ul>
</div>
@endsection
