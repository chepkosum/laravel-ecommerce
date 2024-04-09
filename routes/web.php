<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    //Category Routes
Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
    Route::get('/category', 'index');
    Route::get('/category/create', 'create');
    Route::post('/category', 'store');
    Route::get('/category/{category}/edit', 'edit');
    Route::put('/category/{category}', 'update');
});


// Brands Routes
// Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
//     Route::get('/brands', 'index');
// });

Route::get('/brands', App\Livewire\Admin\Brand\Index::class);
});
