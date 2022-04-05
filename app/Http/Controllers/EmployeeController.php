<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{

        function index(){
            return view('employee.index');
        }

        function profile(){
            return view('employee.profile');
        }

        function setting(){
            return view('employee.setting');
        }

        function show_ticket(){
            return view('employee.ticket.show_ticket');
        }

        function show_task(){
            return view('employee.task.show_task');
        }

        function comment(){
            return view('employee.comment');
        }

        function reports(){
            return view('employee.reports');
        }

        function help(){
            return view('employee.help');
        }


}
