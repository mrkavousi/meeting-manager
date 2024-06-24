@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Item to {{ $warehouse->name }}</h1>
    <form method="POST" action="{{ route('items.store', $warehouse->id) }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="0" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
