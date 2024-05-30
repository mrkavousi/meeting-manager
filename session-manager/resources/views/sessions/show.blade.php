@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">{{ $session->title }}</div>
            <div class="card-body">
                <p><strong>تاریخ:</strong> {{ $session->date }}</p>
                <p><strong>زمان شروع:</strong> {{ $session->start_time }}</p>
                <p><strong>زمان پایان:</strong> {{ $session->end_time }}</p>
                <p><strong>مکان:</strong> {{ $session->location }}</p>
                <p><strong>شرکت‌کنندگان:</strong> {{ $session->participants }}</p>
                <p><strong>غایبان:</strong> {{ $session->absentees }}</p>
                <p><strong>دستور جلسه:</strong> {{ $session->agenda }}</p>
                <p><strong>خلاصه:</strong> {{ $session->summary }}</p>
                <p><strong>اقدامات:</strong> {{ $session->actions }}</p>
                <p><strong>موارد پیگیری:</strong> {{ $session->follow_up_items }}</p>
                <p><strong>جلسه بعدی:</strong> {{ $session->next_meeting }}</p>
                <a href="{{ route('sessions.index') }}" class="btn btn-primary">بازگشت به جلسات</a>
            </div>
        </div>
    </div>
@endsection
