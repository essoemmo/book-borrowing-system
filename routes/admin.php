<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('admin', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('admin', [LoginController::class, 'login'])->name('login.submit');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::get('home', [AdminController::class, 'index'])->name('home');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('admins', AdminsController::class)->except(['show']);
    Route::resource('books', BookController::class);
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('roles', RoleController::class)->except(['show']);
});

