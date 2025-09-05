<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Student routes
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::post('/books/{book}/borrow', [StudentController::class, 'borrow'])->name('student.books.borrow');
    Route::post('/books/{book}/return', [StudentController::class, 'return'])->name('student.books.return');
});

// Admin routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {

    // Admin dashboard with filter
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Book CRUD routes
    Route::resource('books', BookController::class)->except(['index'])->names([
        'create' => 'admin.books.create',
        'store' => 'admin.books.store',
        'edit' => 'admin.books.edit',
        'update' => 'admin.books.update',
        'destroy' => 'admin.books.destroy',
    ]);

    // Student search
    Route::get('/users', [AdminController::class, 'showStudentSearch'])->name('admin.users.index');
    Route::post('/users', [AdminController::class, 'searchStudentById'])->name('admin.users.search');
});

require __DIR__.'/auth.php';
