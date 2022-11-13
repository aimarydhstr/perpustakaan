<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        try {
            $title = "Login Page";

            return view('auth.index', compact('title'));
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }

    public function login(Request $request)
    {
        try {
            $data = [
                'username' => $request->username,
                'password' => $request->password,
                'isActive' => 1
            ];

            if(!Auth::attempt($data)) return redirect()->back()->withErrors(['name' => 'Username atau password salah!']);
            
            return redirect()->route('dashboard')->with('message', 'Login berhasil!');
        }

        catch(Throwable $e) {
            report($e);
            
            return false;
        }
    }
}
