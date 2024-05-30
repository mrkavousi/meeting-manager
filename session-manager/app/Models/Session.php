<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = ['title','date','start_time','end_time','location','participants','absentees','agenda','summary','actions','follow_up_items','next_meeting'];
    protected $table = 'sessions1'; // نام جدید جدول
}
