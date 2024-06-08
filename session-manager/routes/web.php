<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Session;
use Illuminate\Auth\Events\Verified;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    $sessions = Session::all();
    return view('sessions.index', compact('sessions'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    $sessions = Session::all();
    return view('sessions.index', compact('sessions'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\SessionController;

Route::middleware(['auth'])->group(function () {
    Route::resource('sessions', SessionController::class);
});


Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance.index');
Route::get('attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
Route::post('attendance', [AttendanceController::class, 'store'])->name('attendance.store');

Route::resource('employees', EmployeeController::class);

require __DIR__.'/auth.php';
