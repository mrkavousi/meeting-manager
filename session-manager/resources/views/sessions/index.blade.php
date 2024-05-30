@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>جلسات</h1>
            <a href="{{ route('sessions.create') }}" class="btn btn-primary">ایجاد جلسه جدید</a>
        </div>

        @if ($sessions->isEmpty())
            <div class="alert alert-warning" role="alert">
                هیچ جلسه‌ای یافت نشد.
            </div>
        @else
            <div class="row">
                @foreach ($sessions as $session)
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">{{ $session->title }}</h5>
                                <p class="card-text"><strong>تاریخ:</strong> {{ $session->date }}</p>
                                <p class="card-text"><strong>زمان:</strong> {{ $session->start_time }} - {{ $session->end_time }}</p>
                                <p class="card-text"><strong>مکان:</strong> {{ $session->location }}</p>
                                <a href="{{ route('sessions.show', $session->id) }}" class="btn btn-info">نمایش</a>
                                <a href="{{ route('sessions.edit', $session->id) }}" class="btn btn-warning">ویرایش</a>
                                <form action="{{ route('sessions.destroy', $session->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
