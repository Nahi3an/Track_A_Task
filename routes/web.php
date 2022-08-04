<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'manager_role_access'], function () {
        Route::get('/manager', [App\Http\Controllers\ManagerController::class, 'index'])->name('manager_dashboard');
        Route::get('/manager/task', [TaskController::class, 'index'])->name('task_dashboard');
        // Project: not in use index, create
        Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
    });
    Route::group(['middleware' => 'developer_role_access'], function () {
        Route::get('/developer', [App\Http\Controllers\DeveloperController::class, 'index'])->name('developer_dashboard');
    });
    Route::group(['middleware' => 'tester_role_access'], function () {
        Route::get('/tester', [App\Http\Controllers\TesterController::class, 'index'])->name('tester_dashboard');
    });
});