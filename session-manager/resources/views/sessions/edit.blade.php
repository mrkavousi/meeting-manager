@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">ویرایش جلسه</div>
            <div class="card-body">
                <form action="{{ route('sessions.update', $session->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('sessions.form')
                    <button type="submit" class="btn btn-primary">به‌روزرسانی</button>
                </form>
            </div>
        </div>
    </div>
@endsection
