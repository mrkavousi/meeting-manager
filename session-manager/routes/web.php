<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Session;
use Illuminate\Auth\Events\Verified;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AccountingBookController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\InventoryMovementController;

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

Route::group(['middelware' => ['auth']], function () {
Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance.index');
Route::get('attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
Route::post('attendance', [AttendanceController::class, 'store'])->name('attendance.store');

Route::resource('employees', EmployeeController::class);
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('tickets.show');
    Route::post('/tickets/{id}/reply', [TicketController::class, 'reply'])->name('tickets.reply');
    Route::post('/tickets/{id}/close', [TicketController::class, 'close'])->name('tickets.close');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('accounting_books', AccountingBookController::class);
    Route::get('accounting_books/{book}/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('accounting_books/{book}/transactions', [TransactionController::class, 'store'])->name('transactions.store');
});


Route::group(['middleware' => ['auth']], function () {
    Route::resource('warehouses', WarehouseController::class);
    Route::get('warehouses/{warehouse}/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('warehouses/{warehouse}/items', [ItemController::class, 'store'])->name('items.store');
    Route::get('items/{item}/inventory_movements/create', [InventoryMovementController::class, 'create'])->name('inventory_movements.create');
    Route::post('items/{item}/inventory_movements', [InventoryMovementController::class, 'store'])->name('inventory_movements.store');
});

require __DIR__.'/auth.php';
