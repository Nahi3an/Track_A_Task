<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TATController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\TesterController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [TATController::class, 'index'])->name('home');
Route::get('/user-register', [TATController::class, 'userRegister'])->name('user.register');
Route::get('/user-login', [TATController::class, 'userLogin'])->name('user.login');


Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin-dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/add-company-admin', [AdminController::class, 'showCompanyAdminForm'])->name('add.company.admin');
    Route::post('/new-company-admin', [AdminController::class, 'addCompanyAdmin'])->name('new.company.admin');
    Route::post('/manage-company-admin', [AdminController::class, 'manageCompanyAdmin'])->name('manage.company.admin');


    // Route::group(['middleware' => 'manager_role_access'], function () {
    //     Route::get('/manager/home', [ManagerController::class, 'index'])->name('manager_dashboard');

    //     Route::post('/manager/project/store', [ProjectController::class, 'store'])->name('project.store');
    //     Route::get('/manager/project/task', [ProjectController::class, 'getProjectAndTaskInfo'])->name('add_task');
    //     Route::post('/manager/project/task/selected', [ProjectController::class, 'addTaskToProject'])->name('project.addTaskToProject');
    //     Route::get('/manager/project/task/add', [TaskController::class, 'index'])->name('task_dashboard');
    //     Route::post('/manager/project/task/store', [TaskController::class, 'create'])->name('task.create');
    //     Route::get('/manager/project/all/{key?}', [ProjectController::class, 'index'])->name('project.show');
    //     Route::get('/manager/project/{id}', [ProjectController::class, 'show'])->name('project.getInfo');
    //     Route::get('/manager/project/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    //     Route::put('/manager/project/update/{id}', [ProjectController::class, 'update'])->name('project.update');
    //     Route::get('/manager/project/delete/{id}', [ProjectController::class, 'destroy'])->name('project.delete');


    //     Route::get('/manager/team', [TeamsController::class, 'index'])->name('team.index');
    // });
    // Route::group(['middleware' => 'developer_role_access'], function () {
    //     Route::get('/developer/home', [DeveloperController::class, 'index'])->name('developer_dashboard');
    // });
    // Route::group(['middleware' => 'tester_role_access'], function () {
    //     Route::get('/tester/home', [TesterController::class, 'index'])->name('tester_dashboard');
    // });
});