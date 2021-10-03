<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

	protected $redirectAfterLogin = '/dashboard';

	/*
	* Show login form
	*
	*/
    public function showLogin()
    {
        return view('auth.login');
    }  
      

    /*
	* Login attempt
	*
	*/
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.get');
        }
  
        return redirect()->route("login")->with('status', trans('auth.failed'));
    }


	/*
	* Show Register form
	*
	*/
    public function showRegister()
    {
        return view('auth.register');
    }
      
	/*
	* Validate user data and perform registration
	*
	*/
    public function register(Request $request)
    {  
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
           
        $data = $request->all();
        $user = $this->create($data);
        Auth::login($user);
  
        return redirect()->route('dashboard.get');
    }

	/*
	* Create user
	*
	*/
    public function create(array $data)
    {
      return User::create([
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    /*
	* Sign out user
	*
	*/
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
