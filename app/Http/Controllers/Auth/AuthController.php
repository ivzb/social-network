<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Profile;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    protected $redirectPath = '/home';
    protected $loginPath = '/auth/login';
    protected $registerPath = '/auth/register';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->middleware('crsf');

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect($this->loginPath)->withInput()->withErrors($validator);
        }

        if (Auth::attempt([
                'email' => $request->get('email'),
                'password' => $request->get('password')
        ])) {
            return redirect($this->redirectPath);
        }

        return redirect($this->loginPath)->withInput()->withErrors([
            'email' => 'The credentials you entered did not match our records. Try again?'
        ]);
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $this->middleware('crsf');

        $validator = Validator::make($request->all(), [
            'username' => 'required|min:3|max:50|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return redirect($this->registerPath)->withInput()->withErrors($validator);
        }

        if ($this->createUser($request->all())) {
            $this->postLogin($request);
        }

        return redirect($this->redirectPath);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $user_data
     * @return User
     */
    private function createUser(array $user_data)
    {
        $user = User::create([
            'username' => $user_data['username'],
            'email' => $user_data['email'],
            'password' => bcrypt($user_data['password']),
        ]);
        $user->save();

        $profile = Profile::create([
            'user_id' => $user->id
        ]);
        $profile->save();

        return $user;
    }
}