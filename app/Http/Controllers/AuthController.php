<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('auth.login');
    }

    // Proses login
    public function process(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required', 'in:admin,kasir'],
        ]);

        if (Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'role' => $credentials['role'],
        ])) {

            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('dashboard');
            }

            if (Auth::user()->role === 'kasir') {
                return redirect()->route('kasir.dashboard');
            }
        }

        return back()
            ->withInput($request->only('email', 'role'))
            ->withErrors([
                'email' => 'Email, password, atau pilihan role tidak sesuai.',
            ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}