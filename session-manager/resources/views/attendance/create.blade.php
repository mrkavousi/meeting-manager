@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Record Attendance</h1>
    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="employee_id">Employee</label>
            <select name="employee_id" id="employee_id" class="form-control" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="enter_time">Enter Time</label>
            <input type="datetime-local" name="enter_time" id="enter_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="exit_time">Exit Time</label>
            <input type="datetime-local" name="exit_time" id="exit_time" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Record</button>
    </form>
</div>
@endsection
