<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
         * Determine if the request field is email or username.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return string
         */
        public function field(Request $request)
        {
            $email = $this->username();

            return filter_var($request->get($email), FILTER_VALIDATE_EMAIL) ? $email : 'username';
        }

        /**
         * Validate the user login request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return void
         */



    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
