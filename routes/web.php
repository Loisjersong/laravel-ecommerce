<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleManager;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'rolemanager:customer'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'rolemanager:admin'])->name('admin.dashboard');

Route::get('/vendor/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'rolemanager:vendor'])->name('vendor.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
