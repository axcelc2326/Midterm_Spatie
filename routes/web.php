<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecordController;
use Illuminate\Support\Facades\Route;

// Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Home Page
Route::get('/home', function () {
    return view('home.index');
})->name('home');

// Profile Page (Only for authenticated users)
Route::get('/profile', function () {
    return view('profile.index');
})->name('profile')->middleware(['auth']);

// Authentication Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/signin', [LoginController::class, 'login'])->name('signin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// User Management (Only accessible by users with 'manage-users' permission)
Route::middleware(['auth', 'can:manage-users'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/users/{user}/permissions', [UserController::class, 'updatePermissions'])->name('update-permissions');
});

// Records Management (Only for authenticated users)
Route::middleware(['auth'])->group(function () {
    Route::get('/records', [RecordController::class, 'index'])->name('records.index');

    Route::middleware(['can:create-records'])->group(function () {
        Route::get('/records/create', [RecordController::class, 'create'])->name('records.create');
        Route::post('/records', [RecordController::class, 'store'])->name('records.store');
    });

    Route::middleware(['can:edit-records'])->group(function () {
        Route::get('/records/{record}/edit', [RecordController::class, 'edit'])->name('records.edit');
        Route::put('/records/{record}', [RecordController::class, 'update'])->name('records.update');
    });

    Route::middleware(['can:delete-records'])->group(function () {
        Route::delete('/records/{record}', [RecordController::class, 'destroy'])->name('records.destroy');
    });
});
