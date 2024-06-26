@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Currency Prices</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Currency</th>
                <th>Min Price</th>
                <th>Max Price</th>
                <th>Current Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prices as $currency => $price)
            <tr>
                <td>{{ $currency }}</td>
                <td>{{ number_format($price['min'], 2) }}</td>
                <td>{{ number_format($price['max'], 2) }}</td>
                <td>{{ number_format($price['current'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
