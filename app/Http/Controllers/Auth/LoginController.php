<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo()
    {
        if (Auth()->user()->role == 1) {
            return route('admin.dashboard');
        } else if (Auth()->user()->role == 2) {
            return route('user.dashboard');
        } else if (Auth()->user()->role == 3) {
            return route('client.dashboard');
        } else if (Auth()->user()->role == 4) {
            return route('resource.dashboard');
        } else if (Auth()->user()->role == 5) {
            return route('employee.dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Either Email or Password is wrong');
            // return redirect()->back()->with('error','Either Email or Password is wrong');

        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // dd($this);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {

            if (Auth()->user()->role == 1) {
                return redirect()->route('admin.dashboard');
            } else if (Auth()->user()->role == 2) {
                return redirect()->route('user.dashboard');
            } else if (Auth()->user()->role == 3) {
                return redirect()->route('client.dashboard');
            } else if (Auth()->user()->role == 4) {
                return redirect()->route('resource.dashboard');
            } else if (Auth()->user()->role == 5) {
                return redirect()->route('employee.dashboard');
            } else {
                return redirect()->route('login')->with('error', 'Either Email or Password is wrong');
                // return redirect()->back()->with('error','Either Email or Password is wrong');

            }
        }
        return redirect()->route('login')->with('error', 'Either Email or Password is wrong');
    }
}
