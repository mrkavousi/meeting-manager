@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $warehouse->name }}</h1>
    <a href="{{ route('items.create', $warehouse->id) }}" class="btn btn-primary">Add Item</a>
    <ul class="list-group mt-4">
        @foreach($warehouse->items as $item)
        <li class="list-group-item">
            <strong>{{ $item->name }}:</strong> Quantity: {{ $item->quantity }}<br>
            <a href="{{ route('inventory_movements.create', $item->id) }}" class="btn btn-secondary btn-sm">Manage Inventory</a>
        </li>
        @endforeach
    </ul>
</div>
@endsection
