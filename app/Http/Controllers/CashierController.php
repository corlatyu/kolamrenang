<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Ticket;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    // Menampilkan halaman kasir dengan daftar produk
    public function index()
    {
        $products = Product::all(); // Mengambil semua produk dari database
        return view('dashboard.admin.cashier.index', compact('products'));
    }

    // Menyimpan transaksi pembelian tiket
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id', // Validasi product_id harus ada di tabel products
            'quantity' => 'required|integer|min:1', // Validasi quantity harus integer dan minimal 1
            'payment_method' => 'required|in:cash,tf', // Validasi payment_method harus cash atau tf
        ]);

        $product = Product::find($request->product_id); // Mengambil produk berdasarkan product_id dari request
        $total = $product->price * $request->quantity; // Menghitung total harga berdasarkan harga produk dan quantity

        // Data tiket yang akan disimpan
        $ticketData = [
            'user_id' => auth()->user()->id, // Mengambil ID pengguna yang sedang login
            'tanggal_kunjungan' => now(), // Mengambil waktu saat ini sebagai tanggal kunjungan
            'status' => 'disetujui', // Status awal tiket disetujui
            'payment_method' => $request->payment_method, // Metode pembayaran dari request
            'total' => $total, // Total harga tiket
            'quantity' => $request->quantity, // Jumlah tiket yang dibeli
            'product_price' => $product->price, // Harga produk
        ];

        Ticket::create($ticketData); // Menyimpan data tiket ke dalam tabel Ticket

        // Redirect ke halaman transaksi dengan pesan sukses
        return redirect()->route('admin.transactions.index')->with('success', 'Pembelian berhasil. Total: Rp ' . number_format($total, 0, ',', '.'));
    }

    // Mengunggah bukti pembayaran untuk transaksi tiket
    public function uploadBuktiPembayaran(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048', // Validasi file bukti pembayaran
        ]);

        $ticket = Ticket::findOrFail($id); // Mengambil tiket berdasarkan ID

        // Memastikan hanya transaksi dengan metode pembayaran 'tf' yang dapat mengunggah bukti pembayaran
        if ($ticket->payment_method !== 'tf') {
            return redirect()->back()->with('error', 'Hanya transaksi dengan metode pembayaran transfer yang dapat mengunggah bukti pembayaran.');
        }

        $file = $request->file('bukti_pembayaran'); // Mengambil file bukti pembayaran dari request
        $filename = time() . '.' . $file->getClientOriginalExtension(); // Nama file dengan timestamp
        $file->move(public_path('uploads'), $filename); // Menyimpan file ke direktori publik

        $ticket->update(['bukti_pembayaran' => $filename]); // Update kolom bukti_pembayaran di tabel Ticket

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diunggah.');
    }
}
