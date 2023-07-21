<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/details/{id}', [FrontController::class, 'details'])->name('details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/add-product', [ProductController::class, 'add'])->name('product.add');
    Route::post('/create-product', [ProductController::class, 'create'])->name('product.create');
    Route::get('/manage-product', [ProductController::class, 'manage'])->name('product.manage');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update-product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/delete-product/{id}', [ProductController::class, 'delete'])->name('product.delete');
});
