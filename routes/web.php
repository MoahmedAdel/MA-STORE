<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\DashboardController as user;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

Route::middleware(['auth','admin'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboardAdmin');
});

// Route::middleware(['can:isUser'])->group(function () {
//     Route::get('dashboard', [user::class, 'index'])->name('dashboard');
// });
