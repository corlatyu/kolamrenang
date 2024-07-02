<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Charts\TransaksiChart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Menampilkan dashboard admin
    public function index(TransaksiChart $transaksiChart)
    {
        $jumlahorder = Ticket::where('status', 'disetujui')->count();
        $jumlahPenjualanOnlineDisetujui = Ticket::whereHas('user', function ($query) {
            $query->where('role_id', 2); // Ganti dengan role_id yang sesuai untuk user
        })
        ->where('status', 'disetujui')
        ->count();
        
        $adminOrdersCount = Ticket::whereHas('user', function ($query) {
            $query->where('role_id', 1);
        })
        ->count();

        $jumlahorderkonfirmasi = Ticket::where('status', 'menunggu')->count(); // Sesuaikan dengan kondisi yang tepat

        // Build chart
        $chart = $transaksiChart->build();

        return view('dashboard.admin.index', compact('jumlahorder', 'jumlahPenjualanOnlineDisetujui', 'adminOrdersCount', 'jumlahorderkonfirmasi', 'chart'));
    }


    // public function view_pdfuser()
    // {
    //     $mpdf = new \Mpdf\Mpdf();
    //     $users = User::all();
    //     $mpdf->WriteHTML(view('dashboard.admin.kelolauser.pdfuser', compact('users')));
    //     $mpdf->Output();
    // }

    public function showProfile()
    {
        $user = auth()->user(); // Mengambil data pengguna yang sedang login
        return view('dashboard.admin.profile.index', compact('user'));
    }

    // Menampilkan form edit profil pengguna
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.admin.kelolauser.edit', compact('user'));
    }

    // Menampilkan daftar pengguna
    public function manageUsers()
    {
        $users = User::all();
        return view('dashboard.admin.kelolauser.index', compact('users'));
    }

    // Menampilkan form tambah pengguna
    public function createUser()
    {
        $roles = Role::all();
        return view('dashboard.admin.kelolauser.tambah', compact('roles'));
    }

    // Menyimpan pengguna baru
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk foto
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;

        // Mengelola foto profil jika ada
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('gambar/profile', 'public');
            $user->photo = $path;
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }

    // Menyimpan perubahan profil pengguna
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk foto
        ]);

        // Update data utama
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // Mengelola foto profil jika ada
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }

            // Simpan foto baru
            $path = $request->file('photo')->store('gambar/profile', 'public');
            $user->photo = $path;
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }

    // Menghapus pengguna
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        // Hapus foto profil jika ada
        if ($user->photo && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }
}
