<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    //
    
    function index(){
        return view('resource.index');
    }

    function profile(){
        return view('resource.profile');
    }

    function setting(){
        return view('resource.setting');
    }

    function show_ticket(){
        return view('resource.ticket.show_ticket');
    }

    function show_task(){
        return view('resource.task.show_task');
    }

    function comment(){
        return view('resource.comment');
    }

    function reports(){
        return view('resource.reports');
    }

    function help(){
        return view('resource.help');
    }
}
