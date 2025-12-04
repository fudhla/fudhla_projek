<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function index()
    {
        return view('guest/auth.login-form'); // Pastikan file Blade ini ada
    }

    /**
     * Proses login dengan verifikasi password hash
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

        // Cek apakah email ada di database
        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.'])->withInput();
        }

        // Verifikasi password dengan Hash::check()
        if (! Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password salah.'])->withInput();
        }

        Auth::login($user);
        // Login berhasil, simpan data user ke session
        // Login berhasil, simpan data user ke session
        session([
            'user_id'    => $user->id,
            'user_name'  => $user->name,
            'user_email' => $user->email,
            'user_role'  => $user->role, // <----- TAMBAHKAN INI
        ]);

        return redirect()->route('fasilitas.index')->with('success', 'Login berhasil! Selamat datang, ' . $user->name);
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
