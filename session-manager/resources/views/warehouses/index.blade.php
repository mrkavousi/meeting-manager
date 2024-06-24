@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Warehouses</h1>
    <a href="{{ route('warehouses.create') }}" class="btn btn-primary">Create Warehouse</a>
    <ul class="list-group mt-4">
        @foreach($warehouses as $warehouse)
        <li class="list-group-item">
            <a href="{{ route('warehouses.show', $warehouse->id) }}">{{ $warehouse->name }}</a>
        </li>
        @endforeach
    </ul>
</div>
@endsection
