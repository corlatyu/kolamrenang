<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Method untuk menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Method untuk proses registrasi user baru
    public function register(Request $request)
    {
        // Validasi data input, termasuk foto
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto dengan jenis dan ukuran tertentu
        ]);
    
        // Proses penyimpanan foto profil
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public'); // Simpan foto ke storage/public/photos
        }
    
        // Simpan user baru ke database dengan foto jika ada
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => Role::where('role_name', 'user')->first()->id, // Set default role as user
            'photo' => $photoPath, // Simpan path foto ke dalam kolom 'photo'
        ]);
    
        // // Autentikasi dan redirect ke login jika registrasi berhasil
        // Auth::login($user);
    
        // Set session flash message
        session()->flash('success', 'Registration successful!');
    
        return redirect()->route('register');
    }
    
    // Method untuk menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Method untuk proses login
    public function login(Request $request)
    {
        // Validasi data input
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        // Coba melakukan autentikasi
        if (Auth::attempt($credentials, $request->remember)) {
            // Jika autentikasi berhasil, arahkan sesuai dengan peran pengguna
            if (Auth::user()->role->role_name === 'admin') {
                return redirect()->route('dashboard.admin.index');
            } elseif (Auth::user()->role->role_name === 'user') {
                return redirect()->route('dashboard.user.index');
            }
        }
    
        // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
        return redirect()->route('login')->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
    

    // Method untuk logout user
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
