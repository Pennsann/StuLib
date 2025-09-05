<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/logout', 
[AuthenticatedSessionController::class, 
'destroy'])-> name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth',
 'role:admin'])->group(function () {
    Route::get('/admin/dashboard',
    function() {
        return view('admin.dashboard');
    });
});

Route::middleware(['auth',
 'role:student'])->group(function () {
    Route::get('/student/dashboard', 
    function() {
        return view('student.dashboard');
    })->name('student.dashboard');
});

Route::post('/books/{book}/borrow', [BorrowController::class, 'borrow'])->name('books.borrow');
Route::post('/books/{book}/return', [BorrowController::class, 'return'])->name('books.return');

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function() {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('books', BookController::class)->names([
        'index' => 'admin.books.index',
        'create' => 'admin.books.create',
        'store' => 'admin.books.store',
        'edit' => 'admin.books.edit',
        'update' => 'admin.books.update',
        'destroy' => 'admin.books.destroy',
    ]);
});

Route::prefix('admin')->group(function()
{
    Route::get('/dashboard',
    [AdminController::class,
    'dashboard'])->name('admin.dashboard');
    Route::get('/users', function()
    {return "Users page coming soon!";
    })->name('admin.users.index');
    
    Route::get('/borrowed', function()
    {return "Borrowed page coming soon!";
    })->name('admin.borrowed.index');
});

require __DIR__.'/auth.php';
