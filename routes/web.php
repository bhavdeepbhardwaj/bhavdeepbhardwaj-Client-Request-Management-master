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

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('changePassword', [HomeController::class, 'changePasswordSave'])->name('changePassword');



Route::group(['prefix' => 'SuperAdmin', 'middleware' => ['isAdmin', 'auth', 'PreventBackHistory']], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('setting', [AdminController::class, 'setting'])->name('admin.setting');
    Route::get('reports', [AdminController::class, 'reports'])->name('admin.reports');

    // Roles
    Route::get('roles', [AdminController::class, 'role'])->name('admin.role');

    // Brands
    Route::get('brand', [AdminController::class, 'brand'])->name('admin.brand');
    Route::post('brand/store/', [AdminController::class, 'brandStore'])->name('store.brandStore');

    // Ticket
    Route::get('ticket', [AdminController::class, 'ticket'])->name('admin.ticket');
    Route::get('ticket/details_ticket/{id}', [AdminController::class, 'details_ticket'])->name('admin.details_ticket');

    // Help
    Route::get('help', [AdminController::class, 'help'])->name('admin.help');
    Route::get('help-info/{id}', [AdminController::class, 'info_help'])->name('admin.info-help');

    // Help Category
    Route::get('helpCategory', [AdminController::class, 'helpCategory'])->name('admin.helpCategory');
    Route::post('helpCategory/store/', [AdminController::class, 'helpCategoryStore'])->name('store.helpCategoryStore');

    // Category
    Route::get('category', [AdminController::class, 'category'])->name('admin.category');
    Route::post('category/store/', [AdminController::class, 'categoryStore'])->name('store.categoryStore');

    // Country
    Route::get('country', [AdminController::class, 'country'])->name('admin.country');
    Route::post('country/store/', [AdminController::class, 'countryStore'])->name('store.countryStore');

    // Priorities
    Route::get('priorities', [AdminController::class, 'priorities'])->name('admin.priorities');
    Route::post('priorities/store/', [AdminController::class, 'prioritiesStore'])->name('store.prioritiesStore');

    // Statuses
    Route::get('statuses', [AdminController::class, 'statuses'])->name('admin.statuses');
    Route::post('statuses/store/', [AdminController::class, 'statusesStore'])->name('store.statusesStore');

    // Account
    Route::get('show_account', [AdminController::class, 'show_account'])->name('admin.show_account');

    // User(Agency) Create
    Route::get('create_admin_account', [AdminController::class, 'create_ADMIN_account'])->name('admin.create_ADMIN_account');
    Route::post('create_admin_account/create', [AdminController::class, 'createAdmin'])->name('admin.createAdmin');

    // Client Create
    Route::get('create_client_account', [AdminController::class, 'create_CLIENT_account'])->name('admin.create_CLIENT_account');
    Route::post('create_client_account/create', [AdminController::class, 'createClient'])->name('admin.createClient');
});


Route::group(['prefix' => 'agency', 'middleware' => ['isUser', 'auth', 'PreventBackHistory']], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('setting', [UserController::class, 'setting'])->name('user.setting');
    Route::get('reports', [UserController::class, 'reports'])->name('user.reports');
    Route::get('calendar', [UserController::class, 'calendar'])->name('user.calendar');
    Route::get('help', [UserController::class, 'help'])->name('user.help');
    Route::post('help/store', [UserController::class, 'help_store'])->name('user.help.store');
    Route::get('show_account', [UserController::class, 'show_account'])->name('user.show_account');
    Route::get('designation', [UserController::class, 'designation'])->name('user.designation');
    Route::get('task/show_task', [UserController::class, 'show_task'])->name('user.task.show_task');
    Route::get('task/create_task', [UserController::class, 'create_task'])->name('user.task.create_task');
    Route::get('resource/show_resource', [UserController::class, 'show_resource'])->name('user.resource.show_resource');
    Route::get('resource/create_resource', [UserController::class, 'create_resource'])->name('user.resource.create_resource');
    Route::get('ticket/show_ticket', [UserController::class, 'show_ticket'])->name('user.ticket.show_ticket');
    Route::get('ticket/details_ticket/{id}', [UserController::class, 'details_ticket'])->name('user.ticket.details_ticket');
    Route::get('ticket/create_ticket', [UserController::class, 'create_ticket'])->name('user.ticket.create_ticket');
    Route::post('ticket/details_ticket/{id}', [UserController::class, 'comment_ticket'])->name('user.comment.store');
    Route::post('ticket/details_ticket/update/{id}', [UserController::class, 'ticket_update'])->name('user.ticket.update');
    Route::get('comment/detail_comment/{id}', [UserController::class, 'show_comment'])->name('user.comment.detail_comment');
    Route::get('comment/view_comment', [UserController::class, 'view_comment'])->name('user.comment.view_comment');
});


Route::group(['prefix' => 'client', 'middleware' => ['isClient', 'auth', 'PreventBackHistory']], function () {
    Route::get('/', [ClientController::class, 'index']);
    Route::get('dashboard', [ClientController::class, 'index'])->name('client.dashboard');
    Route::get('profile', [ClientController::class, 'profile'])->name('client.profile');
    Route::get('setting', [ClientController::class, 'setting'])->name('client.setting');
    Route::get('reports', [ClientController::class, 'reports'])->name('client.reports');
    Route::get('help', [ClientController::class, 'help'])->name('client.help');
    Route::post('help/store', [ClientController::class, 'help_store'])->name('help.store');
    Route::get('calendar', [ClientController::class, 'calendar'])->name('client.calendar');
    Route::get('designation', [ClientController::class, 'designation'])->name('client.designation');
    Route::get('show_account', [ClientController::class, 'show_account'])->name('client.show_account');
    Route::get('task/show_task', [ClientController::class, 'show_task'])->name('client.task.show_task');
    Route::get('task/create_task', [ClientController::class, 'create_task'])->name('client.task.create_task');
    Route::get('employee/show_employee', [ClientController::class, 'show_employee'])->name('client.employee.show_employee');
    Route::get('employee/create_employee', [ClientController::class, 'create_employee'])->name('client.employee.create_employee');
    Route::get('ticket/show_ticket', [ClientController::class, 'show_ticket'])->name('client.ticket.show_ticket');
    Route::get('ticket/details_ticket/{id}', [ClientController::class, 'details_ticket'])->name('client.ticket.details_ticket');
    Route::get('ticket/create_ticket', [ClientController::class, 'create_ticket'])->name('client.ticket.create_ticket');
    Route::post('ticket/create_ticket/store', [ClientController::class, 'ticket_store'])->name('ticket.store');
    Route::post('ticket/details_ticket/{id}', [ClientController::class, 'comment_ticket'])->name('comment.store');
    Route::get('comment/detail_comment/{id}', [ClientController::class, 'show_comment'])->name('client.comment.comment_detail');
    Route::get('comment/view_comment', [ClientController::class, 'view_comment'])->name('client.comment.view_comment');
});

Route::group(['prefix' => 'employee', 'middleware' => ['isEmployee', 'auth', 'PreventBackHistory']], function () {
    Route::get('/', [EmployeeController::class, 'index']);
    Route::get('dashboard', [EmployeeController::class, 'index'])->name('employee.dashboard');
    Route::get('profile', [EmployeeController::class, 'profile'])->name('employee.profile');
    Route::get('setting', [EmployeeController::class, 'setting'])->name('employee.setting');
    Route::get('reports', [EmployeeController::class, 'reports'])->name('employee.reports');
    Route::get('comment', [EmployeeController::class, 'comment'])->name('employee.comment');
    Route::get('help', [EmployeeController::class, 'help'])->name('employee.help');
    Route::get('task/show_task', [EmployeeController::class, 'show_task'])->name('employee.task.show_task');
    Route::get('ticket/show_ticket', [EmployeeController::class, 'show_ticket'])->name('employee.ticket.show_ticket');
});


Route::group(['prefix' => 'resource', 'middleware' => ['isResource', 'auth', 'PreventBackHistory']], function () {
    Route::get('/', [ResourceController::class, 'index']);
    Route::get('dashboard', [ResourceController::class, 'index'])->name('resource.dashboard');
    Route::get('profile', [ResourceController::class, 'profile'])->name('resource.profile');
    Route::get('setting', [ResourceController::class, 'setting'])->name('resource.setting');
    Route::get('reports', [ResourceController::class, 'reports'])->name('resource.reports');
    Route::get('comment', [ResourceController::class, 'comment'])->name('resource.comment');
    Route::get('help', [ResourceController::class, 'help'])->name('resource.help');
    Route::get('task/show_task', [ResourceController::class, 'show_task'])->name('resource.task.show_task');
    Route::get('ticket/show_ticket', [ResourceController::class, 'show_ticket'])->name('resource.ticket.show_ticket');
});
