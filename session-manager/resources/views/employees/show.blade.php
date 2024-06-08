@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employee Details</h1>
    <div>
        <strong>Name:</strong> {{ $employee->name }}
    </div>
    <div>
        <strong>Email:</strong> {{ $employee->email }}
    </div>

    <h2 class="mt-3">Attendance Records</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Enter Time</th>
                <th>Exit Time</th>
                <th>Total Work Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendanceRecords as $record)
                <tr>
                    <td>{{ $record->enter_time }}</td>
                    <td>{{ $record->exit_time }}</td>
                    <td>
                        @php
                            if ($record->enter_time && $record->exit_time) {
                                $workTime = \Carbon\Carbon::parse($record->exit_time)->diffInSeconds($record->enter_time);
                                echo gmdate('H:i:s', $workTime);
                            } else {
                                echo 'Incomplete';
                            }
                        @endphp
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('employees.index') }}" class="btn btn-primary mt-3">Back</a>
</div>
@endsection
