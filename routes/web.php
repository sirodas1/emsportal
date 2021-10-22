<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

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
    return redirect('login');
});

Route::get('login', [LoginController::class, 'showLogin'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::post('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [DashboardController::class, 'index'])->name('home');
    Route::group(['prefix' =>'patient', 'as' => 'patients.'], function (){
        Route::get('access', [DashboardController::class, 'access'])->name('access'); 
        Route::get('folder/{id}', [DashboardController::class, 'folder'])->name('folder'); 
        Route::post('folder/lock/{id}', [DashboardController::class, 'openLockedFolder'])->name('open-locked-folder');
    });
    Route::group(['prefix' =>'account', 'as' => 'account.'], function () {
        Route::get('', [DashboardController::class, 'account'])->name('view');
        Route::put('', [DashboardController::class, 'updateAccount'])->name('update');
    });
    Route::post('change-password', [DashboardController::class, 'changePassword'])->name('change-password');
});
