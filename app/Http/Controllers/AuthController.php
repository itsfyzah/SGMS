<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Paparkan borang login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Ambil kredensial dari request
        $credentials = $request->only('email', 'password');

        // Memeriksa butiran login
        if (Auth::attempt($credentials)) {
            // Jika login berjaya, arahkan pengguna ke dashboard
            return redirect()->route('dashboard');  
        }

        // Jika login gagal, kembali dengan mesej ralat
        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Paparkan borang pendaftaran
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses pendaftaran
public function register(Request $request)
{
    // Validasi input pendaftaran
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Cipta akaun baru
    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    // Login secara automatik selepas pendaftaran berjaya
    Auth::login($user);

    // Flash mesej kejayaan ke session
    session()->flash('success', 'Account successfully created! Please log in.');

    // Redirect ke halaman login
    return redirect()->route('login');
}


    // Proses logout
    public function logout()
    {
        Auth::logout();  // Logout pengguna
        return redirect()->route('login');  // Arahkan ke halaman login
    }

    // Menangani kesilapan validasi dalam register
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new ValidationException($validator);
    }
}
