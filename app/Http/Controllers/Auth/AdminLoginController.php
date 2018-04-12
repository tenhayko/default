<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:admin', ['except'=>['logout']]);
	}
    public function showLoginForm()
    {
    	return view('auth.admin-login');
    }
     public function login(Request $req)
    {
        // Validate the form data
        $this->validate($req,[
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email'=>$req->email, 'password'=>$req->password], $req->remember)) {
            // if successful, then redirect to their interded location
            return redirect()->intended(route('admin'));
        }
        return redirect()->back()->withInput($req->only('email', 'remember'));
        // if unsuccessful, then redirect back to the login with the form data
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
