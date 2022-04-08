<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        {
            $this->middleware('guest')->except('logout');
        }

        // if (Auth::check() && Auth::user()->role == 1) {
        //     $this->redirectTo = route('admin.dashboard');
        // } elseif (Auth::check() && Auth::user()->role == 2) {
        //     $this->redirectTo = route('user.dashboard');
        // } else if (Auth()->user()->role == 3) {
        //     return redirect()->route('client.dashboard');
        // } else if (Auth()->user()->role == 4) {
        //     return redirect()->route('resource.dashboard');
        // } else if (Auth()->user()->role == 5) {
        //     return redirect()->route('employee.dashboard');
        // }

        // $this->middleware('guest')->except('logout');
    }
}
