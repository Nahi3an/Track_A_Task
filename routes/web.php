<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/manager', [App\Http\Controllers\ManagerController::class, 'index'])->name('manager');
Route::get('/developer', [App\Http\Controllers\DeveloperController::class, 'index'])->name('developer');
Route::get('/tester', [App\Http\Controllers\TesterController::class, 'index'])->name('tester');