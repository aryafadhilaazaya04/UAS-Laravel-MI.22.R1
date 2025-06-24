<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'login'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:30',
            'username' => 'required|min:3|max:30|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:30'
        ]);
        
    }
}
