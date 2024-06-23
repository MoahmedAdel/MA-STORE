<?php

use App\Http\Controllers\User\DashboardController as user;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//------------------------------------ Include Routes Authentication ------------------------------------//
require __DIR__ . '/auth.php';

//------------------------------------ Include Routes Dashboard Admin ------------------------------------//
require __DIR__ . '/admin.php';

