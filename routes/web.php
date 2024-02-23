<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WordController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('only_guest')->group(function () {

Route::get('/',[LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register',[RegisterController::class, 'index']);
Route::post('/register',[RegisterController::class, 'store']);

});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index']);
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/dictionary',[WordController::class, 'index']);
    Route::post('/dictionary',[WordController::class,'store']);
    Route::get('/history',[WordController::class, 'show']);
    
});