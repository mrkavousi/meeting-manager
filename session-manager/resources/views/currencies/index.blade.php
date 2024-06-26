@extends('layouts.app')

@section('content')
<div class="container">
    <h1>نرخ به لحظه ارزها</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ارز</th>
                <th>پایین ترین قیمت</th>
                <th>بالاترین قیمت</th>
                <th>قیمت فعلی</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prices as $currency => $price)
            <tr>
                <td>{{ $currency }}</td>
                <td>{{ number_format($price['min']/10, 0) }}</td>
                <td>{{ number_format($price['max']/10, 0) }}</td>
                <td>{{ number_format($price['current']/10, 0) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
