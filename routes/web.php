<?php

use App\Http\Controllers\TodayController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskResourceController;
use App\Http\Controllers\NotesResourceController;
use App\Http\Controllers\LabelsResourceController;

use App\Http\Controllers\CompletedController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingsController;

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

    // Resource Routes
    Route::resource('/labels', LabelsResourceController::class,
        ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    Route::resource('/notes', NotesResourceController::class,
        ['only' => ['index', 'store', 'update', 'destroy']]);
    Route::resource('/tasks', TaskResourceController::class,
        ['only' => ['index', 'store', 'update', 'destroy']]);

    // GET Routes
    Route::get('/', [TaskResourceController::class, 'index'])->name('index');
    Route::get('/completed', [CompletedController::class, 'index'])->name('completed');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');
    Route::get('/today', [TodayController::class, 'index'])->name('today');
    Route::get('/search', [SearchController::class, 'index'])->name('search');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

    // PUT Routes
    Route::put('/settings/updateGoals', SettingsController::class . '@updateGoals');
    Route::put('/settings/updateTheme', SettingsController::class . '@updateTheme');
    Route::put('/settings/updateAccount', SettingsController::class . '@updateAccount');
    Route::put('/settings/updatePassword', SettingsController::class . '@updatePassword');

    // DELETE Routes
    Route::delete('/settings/deleteAccount', SettingsController::class . '@deleteAccount');


});
