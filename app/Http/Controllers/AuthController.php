<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('username', 'password');

        if(Auth::attempt($credentials)){
            return redirect(url('/admin/profil'));
        } else {
            return redirect()->route('login')
                ->with([
                    'error' => [
                        'title' => 'Error',
                        'text' => 'Username/password salah!',
                    ]
                ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
