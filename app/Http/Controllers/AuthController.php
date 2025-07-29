<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        // Validasi dan proses pendaftaran
        // ...
        $valdated = $request->validate([
            'username' => 'string|max:150',
            'email' => 'string|email|max:100|unique:users',
            'password' => 'string|confirmed',
            'age' => 'integer|min:18|max:100',
            'origin' => 'string|max:100',
            'background' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:15',
            'terms' => 'accepted',
        ]);

        $user = User::create([
            'username' => $valdated['username'],
            'email' => $valdated['email'],
            'password' => bcrypt($valdated['password']),
            'asal' => $valdated['origin'],
            'umur' => $valdated['age'],
            'latar_belakang' => $valdated['background'],
            'role' => $request->input('role', 'user'), // Default role to 'user
            'phone' => $valdated['phone'],
            'profile_picture' => 'images/defaultProfile.jpg', // Set default profile picture
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }

    public function login(Request $request)
    {
        // Validasi dan proses login
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Anda telah keluar.');
    }
}
