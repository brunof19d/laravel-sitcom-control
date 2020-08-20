<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('mylogin.index');
    }

    public function mylogin(Request $request)
    {   
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors('User or password incorrect');
        }

        return redirect()->route('show_series');
    }
}
