<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function login()
    {
        return view('login');
    }

    public function customLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email_or_mobile' => 'required|string',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return redirect('/login')->withError($error);
        }
        $credentials = [
            'password' => $request->input('password'),
        ];
        $email_or_mobile = $request->input('email_or_mobile');

        if (filter_var($email_or_mobile, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $email_or_mobile;
        } else if (is_numeric($email_or_mobile)) {
            $credentials['mobile'] = $email_or_mobile;
        } else {
            return redirect()->back()->withError("Invalid email or mobile");
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->status != 'active') {
                Auth::logout();
                return redirect('/login')->withError('Your account has been deactivated');
            }
            if (!in_array($user->role, ['admin', 'superadmin'])) {
                Auth::logout();
                return redirect('/login')->withError('You have no access to this account');
            }
            return redirect('/dashboard');
        }
        return redirect('/login')->withError('Invalid login details!');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login')->with('success', 'Logout successfully');
    }
}
