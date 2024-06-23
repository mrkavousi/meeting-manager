@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Accounting Book</h1>
    <form method="POST" action="{{ route('accounting_books.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
