<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DaycareController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StageController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('admin', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('admin', [LoginController::class, 'login'])->name('login.submit');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::get('home', [AdminController::class, 'index'])->name('home');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('admins', AdminsController::class)->except(['show']);
    Route::resource('books', DaycareController::class);
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('roles', RoleController::class)->except(['show']);

    Route::get('cities/{city}/change-status', [CityController::class, 'cityStatus'])->name('city.active');

//    Route::prefix('ajax')->as('ajax.')->group(function () {
//        Route::get('kids/dataTable/{daycare}', [DaycareController::class, 'getKids'])->name('kids');
//    });

});

