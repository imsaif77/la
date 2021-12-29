<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Http\Response;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['registered','logout']);
    }


    public function registered()

    {

        Auth::logout();

        $data = ['text' => __('Thank you!'), 'subtext' => __('Your sign-up process is almost done.'), 'msg' => ['type' => 'success', 'text' => __('Please check your email and verify your account.')]];

        $last_url = str_replace(url('/'), '', url()->previous());

        if ($last_url == '/register') {

            return view('auth.message')->with($data);

        }

        return redirect('/login');

    }


   


}
