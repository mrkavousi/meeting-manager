<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceRecord extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id', 'enter_time', 'exit_time'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
