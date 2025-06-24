<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $validatedData = $request->validate([
            'name' => 'required|max:30',
            'username' => 'required|min:3|max:30|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:30'
        ]);
        User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password'])
        ]);
        return redirect('/login')->with('success', 'Registration successful! Please login');
    }
}
