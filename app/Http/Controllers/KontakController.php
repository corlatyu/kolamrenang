<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class KontakController extends Controller
{

    public function index()
    {
        $messages = Review::all(); // Ambil semua pesan dari database

        return view('dashboard.admin.kontakpesan.index', compact('messages'));
    }
    public function simpanPesan(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'pesan' => 'required|string',
        ]);

        // Simpan pesan ke dalam database
        $pesan = new Review();
        $pesan->nama = $request->nama;
        $pesan->email = $request->email;
        $pesan->pesan = $request->pesan;
        $pesan->save();

        // Redirect atau kirim pesan sukses ke halaman kontak
        return redirect()->back()->with('success', 'Pesan Anda telah berhasil dikirim!');
    }
}
