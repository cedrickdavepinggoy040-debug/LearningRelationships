<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{
    
    public function showLogin()
    {
        return view('auth.login');
    }

    
    public function showRegister()
    {
        return view('auth.register');
    }

    
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')
            ->with('success', 'Account created successfully!');
    }

    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $key = Str::lower($request->email).'|'.$request->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);

            return back()->withErrors([
                'email' => "Too many login attempts. Try again in {$seconds} seconds.",
            ])->onlyInput('email');
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            RateLimiter::hit($key, 60);

            return back()->withErrors([
                'email' => 'Invalid email or password.',
            ])->onlyInput('email');
        }

        RateLimiter::clear($key);
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
