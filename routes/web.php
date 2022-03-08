<?php

use App\Http\Controllers\CompletedController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SparkResourceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Group all routes and protect them
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [SparkResourceController::class, 'index'])->name('index');
    Route::resource('/tasks', SparkResourceController::class);
    Route::resource('/search', SearchController::class);
    Route::get('/completed', [CompletedController::class, 'index'])->name('completed');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::put('/settings/update', SettingsController::class . '@update');
});
