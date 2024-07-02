<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
// Menampilkan dashboard user

public function index()
{
    // Mengambil user yang sedang login
    $user = Auth::user();

    // Mengambil jumlah pesanan yang dimiliki oleh user yang sedang login
    $jumlahPesanan = Ticket::where('user_id', $user->id)->count();

    return view('dashboard.user.index', compact('jumlahPesanan'));
}

    public function showProfile()
    {
        $user = auth()->user(); // Mengambil data pengguna yang sedang login
        return view('dashboard.user.profile.index', compact('user'));
    }

    // Menampilkan form edit profil
    public function editProfile()
    {
        return view('dashboard.user.profile.edit');
    }

    // Memperbarui data profil
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->id(),
            'password' => 'nullable|string|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk foto
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
         // Mengelola foto profil jika ada
    if ($request->hasFile('photo')) {
        // Hapus foto lama jika ada
        if ($user->photo && Storage::exists($user->photo)) {
            Storage::delete($user->photo);
        }

        // Simpan foto baru
        $path = $request->file('photo')->store('public/photos');
        $user->photo = $path;
    }
        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }
    
}