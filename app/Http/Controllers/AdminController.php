<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
            return view('admin.help');
        }

        function info_Help()
        {
            return view('admin.info-help');
        }

        function ticket()
        {
            return view('admin.ticket');
        }

        function details_ticket(){
            return view('admin.details_ticket');
        }

        function show_account()
        {
            $user =  User::all();
            // dd($account);
            return view('admin.show_account',['user'=>$user]);
        }

        function create_ADMIN_account()
        {
            return view('admin.create_ADMIN_account');
        }

        function create_CLIENT_account()
        {
            return view('admin.create_CLIENT_account');
        }
}
