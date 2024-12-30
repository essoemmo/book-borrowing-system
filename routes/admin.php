<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('admin', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('admin', [LoginController::class, 'login'])->name('login.submit');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::get('home', [AdminController::class, 'index'])->name('home');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('admins', AdminsController::class)->except(['show']);
    Route::get('admins/{id}/change-status', [AdminsController::class, 'adminStatus'])->name('admins.active');

    Route::resource('books', BookController::class);
    Route::resource('loans', LoanController::class);
    Route::resource('users', UserController::class)->except(['show']);
    Route::get('users/{id}/change-status', [UserController::class, 'userStatus'])->name('user.active');
    Route::resource('roles', RoleController::class)->except(['show']);
});

