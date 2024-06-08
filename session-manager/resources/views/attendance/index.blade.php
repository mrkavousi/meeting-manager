@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employee Attendance</h1>
    <a href="{{ route('attendance.create') }}" class="btn btn-primary">Record Attendance</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Total Work Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>
                        @php
                            $totalWorkTime = $employee->attendanceRecords->reduce(function ($carry, $record) {
                                if ($record->enter_time && $record->exit_time) {
                                    $workTime = \Carbon\Carbon::parse($record->exit_time)->diffInSeconds($record->enter_time);
                                    return $carry + $workTime;
                                }
                                return $carry;
                            }, 0);
                        @endphp
                        {{ gmdate('H:i:s', $totalWorkTime) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
