<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function index()
    {
        return view('auth.login-form'); // pastikan blade ada
    }

    /**
     * Proses login (bebas akun)
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:3',
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 3 karakter.',
        ]);

        // Login berhasil, simpan session
        session([
            'user_email' => $request->email,
        ]);

        return redirect()->route('fasilitas.tampilan')->with('success', 'Login berhasil dengan email: ' . $request->email);
    }

    /**
     * Logout
     */
    public function logout()
    {
        session()->flush();
        return redirect()->route('login.form')->with('success', 'Anda berhasil logout.');
    }
}
