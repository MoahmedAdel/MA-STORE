<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {

//------------------------------------ index ------------------------------------//
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboardAdmin');

//------------------------------------ Resources Category " create - update - delete ... "  ------------------------------------//
    Route::resource('admin/categories', CategoriesController::class);

});

