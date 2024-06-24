@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Inventory for {{ $item->name }}</h1>
    <form method="POST" action="{{ route('inventory_movements.store', $item->id) }}">
        @csrf
        <div class="form-group">
            <label for="type">Type</label>
            <select class="form-control" id="type" name="type" required>
                <option value="in">In</option>
                <option value="out">Out</option>
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="0" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
