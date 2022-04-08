<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Help;
use App\Models\HelpCategory;
use App\Models\Priority;
use App\Models\Status;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    //
    function index()
    {
        return view('admin.index');
    }

    function profile()
    {
        return view('admin.profile');
    }

    function setting()
    {
        return view('admin.setting');
    }

    function reports()
    {
        return view('admin.reports');
    }

    function help()
    {
        $helps = Help::first()->get();
        return view('admin.help.help', ['helps' => $helps]);
    }

    function info_Help($id)
    {
        $helps = Help::where('id', $id)->get()->first();
        return view('admin.help.info-help', ['helps' => $helps]);
    }

    function ticket()
    {
        return view('admin.ticket.ticketList');
    }

    function details_ticket()
    {
        return view('admin.ticket.details_ticket');
    }

    function show_account()
    {
        $user =  User::all();
        // dd($account);
        return view('admin.account.show_account', ['user' => $user]);
    }

    function create_ADMIN_account()
    {
        return view('admin.account.create_ADMIN_account');
    }

    function create_CLIENT_account()
    {
        return view('admin.account.create_CLIENT_account');
    }

    function category()
    {
        $category = Category::get();
        return view('admin.category.category', ['category' => $category]);
    }

    function country()
    {
        $countrys = Country::get();
        return view('admin.country.country', ['countrys' => $countrys]);
    }

    function helpCategory()
    {
        $helpCategory = HelpCategory::get();
        return view('admin.help-category.helpCategory', ['helpCategory' =>  $helpCategory]);
    }

    function priorities()
    {
        $priorities = Priority::get();
        return view('admin.priorities.priorities', ['priorities' =>  $priorities]);
    }

    function role()
    {
        $role = Role::get();
        return view('admin.role.role', ['role' =>  $role]);
    }

    function statuses()
    {
        $statuses = Status::get();
        return view('admin.statuses.statuses', ['statuses' =>  $statuses]);
    }
}
