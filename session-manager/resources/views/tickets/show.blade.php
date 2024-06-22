@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $ticket->title }}</h1>
    <p>{{ $ticket->description }}</p>
    <p>Status: {{ $ticket->status }}</p>
    <p>Created at: {{ $ticket->created_at }}</p>
    
    <h2>Replies</h2>
    @foreach($ticket->replies as $reply)
    <div class="card mb-2">
        <div class="card-body">
            <p>{{ $reply->reply }}</p>
            <p><small>By {{ $reply->user->name }} on {{ $reply->created_at }}</small></p>
        </div>
    </div>
    @endforeach

    @if($ticket->status == 'open')
    <form method="POST" action="{{ route('tickets.reply', $ticket->id) }}">
        @csrf
        <div class="form-group">
            <label for="reply">Reply</label>
            <textarea class="form-control" id="reply" name="reply" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Reply</button>
    </form>
    <form method="POST" action="{{ route('tickets.close', $ticket->id) }}">
        @csrf
        <button type="submit" class="btn btn-danger mt-2">Close Ticket</button>
    </form>
    @endif
</div>
@endsection
