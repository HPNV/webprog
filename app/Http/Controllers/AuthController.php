<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // Jika sudah login, redirect ke halaman profile
        if (Auth::check()) {
            return redirect()->route('profile');
        }

        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi login
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('profile');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    // Tampilkan form register
    public function showRegisterForm()
    {
        // Jika sudah login, redirect ke halaman profile
        if (Auth::check()) {
            return redirect()->route('profile');
        }

        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('register')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Menyimpan user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login user setelah register
        Auth::attempt($request->only('email', 'password'));

        return redirect()->route('profile');
    }

    // Tampilkan halaman profile
    public function showProfile()
    {
        // Jika belum login, arahkan ke halaman login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('profile');
    }

    // Logout user
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
