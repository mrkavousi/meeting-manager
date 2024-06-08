<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\AttendanceRecord;

class AttendanceController extends Controller
{
    public function index()
    {
        $employees = Employee::with('attendanceRecords')->get();
        return view('attendance.index', compact('employees'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('attendance.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'enter_time' => 'required|date',
            'exit_time' => 'nullable|date|after:enter_time',
        ]);

        AttendanceRecord::create($request->all());

        return redirect()->route('attendance.index')->with('success', 'Attendance recorded successfully.');
    }
}
