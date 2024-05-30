@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">ایجاد جلسه</div>
            <div class="card-body">
                <form action="{{ route('sessions.store') }}" method="POST">
                    @csrf
                    @include('sessions.form')
                    <button type="submit" class="btn btn-primary">ذخیره</button>
                </form>
            </div>
        </div>
    </div>
@endsection
