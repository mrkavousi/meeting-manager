@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $warehouse->name }}</h1>
    <a href="{{ route('items.create', $warehouse->id) }}" class="btn btn-primary">Add Item</a>
    <ul class="list-group mt-4">
        @foreach($warehouse->items as $item)
        <li class="list-group-item">
            <strong>{{ $item->name }}:</strong> Quantity: {{ $item->quantity }}<br>
            <a href="{{ route('items.edit', [$warehouse->id, $item->id]) }}" class="btn btn-secondary btn-sm">Edit</a>
            <form action="{{ route('items.destroy', [$warehouse->id, $item->id]) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
            <a href="{{ route('inventory_movements.create', $item->id) }}" class="btn btn-secondary btn-sm">Manage Inventory</a>
            
            <!-- لیست ورود و خروج‌ها به صورت آکاردیون -->
            <div class="accordion mt-3" id="accordion{{ $item->id }}">
                <div class="card">
                    <div class="card-header" id="heading{{ $item->id }}">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $item->id }}" aria-expanded="true" aria-controls="collapse{{ $item->id }}">
                                Inventory Movements
                            </button>
                        </h5>
                    </div>

                    <div id="collapse{{ $item->id }}" class="collapse" aria-labelledby="heading{{ $item->id }}" data-parent="#accordion{{ $item->id }}">
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($item->movements as $movement)
                                <li class="list-group-item">
                                    <strong>{{ ucfirst($movement->type) }}:</strong> Quantity: {{ $movement->quantity }}<br>
                                    <small>{{ $movement->description }}</small><br>
                                    <small>Date: {{ $movement->created_at->format('Y-m-d H:i:s') }}</small>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
