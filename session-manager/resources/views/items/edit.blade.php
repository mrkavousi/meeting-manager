@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Item</h1>
    <form method="POST" action="{{ route('items.update', [$warehouse->id, $item->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $item->quantity }}" min="0" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
