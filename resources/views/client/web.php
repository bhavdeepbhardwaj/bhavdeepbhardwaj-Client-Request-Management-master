<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\EmployeeController;
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

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){


});

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']],function(){
            Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
            Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
            Route::get('setting',[AdminController::class,'setting'])->name('admin.setting');
            Route::get('reports',[AdminController::class,'reports'])->name('admin.reports');
            Route::get('ticket',[AdminController::class,'ticket'])->name('admin.ticket');
            Route::get('show_account',[AdminController::class,'show_account'])->name('admin.show_account');
            Route::get('create_ADMIN_account',[AdminController::class,'create_ADMIN_account'])->name('admin.create_ADMIN_account');
            Route::get('create_CLIENT_account',[AdminController::class,'create_CLIENT_account'])->name('admin.create_CLIENT_account');
});


Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']],function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('setting',[UserController::class,'setting'])->name('user.setting');
    Route::get('reports',[UserController::class,'reports'])->name('user.reports');
    Route::get('calendar',[UserController::class,'calendar'])->name('user.calendar');
    Route::get('help',[UserController::class,'help'])->name('user.help');
    Route::get('show_account',[UserController::class,'show_account'])->name('user.show_account');
    Route::get('designation',[UserController::class,'designation'])->name('user.designation');
    Route::get('task/show_task',[UserController::class,'show_task'])->name('user.task.show_task');
    Route::get('task/create_task',[UserController::class,'create_task'])->name('user.task.create_task');
    Route::get('resource/show_resource',[UserController::class,'show_resource'])->name('user.resource.show_resource');
    Route::get('resource/create_resource',[UserController::class,'create_resource'])->name('user.resource.create_resource');
    Route::get('ticket/show_ticket',[UserController::class,'show_ticket'])->name('user.ticket.show_ticket');
    Route::get('ticket/create_ticket',[UserController::class,'create_ticket'])->name('user.ticket.create_ticket');
});


Route::group(['prefix'=>'client', 'middleware'=>['isClient','auth','PreventBackHistory']],function(){
    Route::get('dashboard',[ClientController::class,'index'])->name('client.dashboard');
    Route::get('profile',[ClientController::class,'profile'])->name('client.profile');
    Route::get('setting',[ClientController::class,'setting'])->name('client.setting');
    Route::get('reports',[ClientController::class,'reports'])->name('client.reports');
    Route::get('show_task',[ClientController::class,'show_task'])->name('client.task.show_task');
    Route::get('create_task',[ClientController::class,'create_task'])->name('client.task.create_task');
    Route::get('help',[ClientController::class,'help'])->name('client.help');
    Route::get('calendar',[ClientController::class,'calendar'])->name('client.calendar');
    Route::get('show_account',[ClientController::class,'show_account'])->name('client.show_account');
    Route::get('designation',[ClientController::class,'designation'])->name('client.designation');
    Route::get('show_resource',[ClientController::class,'show_resource'])->name('client.resource.show_resource');
    Route::get('create_resource',[ClientController::class,'create_resource'])->name('client.resource.create_resource');
    Route::get('show_ticket',[ClientController::class,'show_ticket'])->name('client.ticket.show_ticket');
    Route::get('create_ticket',[ClientController::class,'create_ticket'])->name('client.ticket.create_ticket');
});

Route::group(['prefix'=>'employee', 'middleware'=>['isEmployee','auth','PreventBackHistory']],function(){
    Route::get('dashboard',[EmployeeController::class,'index'])->name('employee.dashboard');
    Route::get('profile',[EmployeeController::class,'profile'])->name('employee.profile');
    Route::get('setting',[EmployeeController::class,'setting'])->name('employee.setting');
});


Route::group(['prefix'=>'resource', 'middleware'=>['isResource','auth','PreventBackHistory']],function(){
    Route::get('dashboard',[ResourceController::class,'index'])->name('resource.dashboard');
    Route::get('profile',[ResourceController::class,'profile'])->name('resource.profile');
    Route::get('setting',[ResourceController::class,'setting'])->name('resource.setting');
});




