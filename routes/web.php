<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    SettingsController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing.landing');
})->name('landing');

// Auth Routes - Login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'access']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Auth Routes - Register
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'create']);

// Protected routes
Route::group(['middleware' => 'auth'], function () {

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard/data', [DashboardController::class, 'data']);

    // Settings
    Route::get('users/admin', [SettingsController::class, 'indexU'])->name('userAdmin');
    Route::get('users/admin/new', [SettingsController::class, 'createU'])->name('userAdminNew');
    Route::post('users/admin', [SettingsController::class, 'storeU']);
    Route::get('works', [SettingsController::class, 'indexW'])->name('work');
    Route::get('works/new', [SettingsController::class, 'createW'])->name('workNew');
    Route::post('works', [SettingsController::class, 'storeW']);
});


