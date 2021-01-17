<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('loginuser.login');
    }

    public function post(Request $request)
    {
        $errors = $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
            // Attempt to log the user in
            // Passwordnya pake bcrypt
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            return redirect()->intended('/dashboard');
        }

        return redirect()->intended('/login');
    }
}
