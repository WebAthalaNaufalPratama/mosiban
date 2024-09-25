<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        if (Auth::attempt(['email' => $req, 'password' => $req->password])) {
            return redirect()->route('admin');
        } else {
            return "oke";
        }
    }

    public function logout() 
    {
        Auth::logout();
        return response()->json(['success' => 1]);
    }
}
