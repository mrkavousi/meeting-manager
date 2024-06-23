@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Accounting Books</h1>
    <a href="{{ route('accounting_books.create') }}" class="btn btn-primary">Create Accounting Book</a>
    <ul class="list-group mt-4">
        @foreach($books as $book)
        <li class="list-group-item">
            <a href="{{ route('accounting_books.show', $book->id) }}">{{ $book->name }}</a>
        </li>
        @endforeach
    </ul>
</div>
@endsection
