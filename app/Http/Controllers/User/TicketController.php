<?php

namespace App\Http\Controllers\User;

use App\Models\Ticket;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Milon\Barcode\Facades\DNS2DFacade;
use Illuminate\Support\Facades\DB;



class TicketController extends Controller
{

    public function index()
    {
        // Query SQL untuk mengambil tiket berdasarkan user_id dari pengguna yang sedang terautentikasi
        $userId = Auth::user()->id;
        $tickets = DB::select('SELECT * FROM tickets WHERE user_id = ?', [$userId]);
    
        // Mengirim data tiket ke view 'dashboard.user.ticket.index'
        return view('dashboard.user.ticket.index', ['tickets' => $tickets]);
    }
    

    public function create()
    {
        // Query SQL untuk mengambil semua produk
        $products = DB::select('SELECT * FROM products');
    
        // Mengirim data produk ke view 'dashboard.user.ticket.create'
        return view('dashboard.user.ticket.create', ['products' => $products]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'tanggal_kunjungan' => 'required|date',
            'bukti_pembayaran' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id);
        $total = $product->price * $request->quantity;

        $ticketData = [
            'user_id' => Auth::user()->id,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'status' => 'menunggu', // Set status menunggu persetujuan
            'payment_method' => 'tf',
            'total' => $total,
            'quantity' => $request->quantity,
            'product_price' => $product->price,
        ];

        // Unggah bukti pembayaran
        $file = $request->file('bukti_pembayaran');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $ticketData['bukti_pembayaran'] = $filename;

        Ticket::create($ticketData);

        return redirect()->route('user.tickets.index')->with('success', 'Tiket berhasil dipesan. Total: Rp ' . number_format($total, 0, ',', '.'));
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
    
        // Hanya izinkan pembatalan jika status adalah 'menunggu'
        if ($ticket->status == 'menunggu') {
            $ticket->status = 'cancel'; // Ubah status menjadi 'batal'
            $ticket->save();
            return redirect()->route('user.tickets.index')->with('success', 'Tiket berhasil dibatalkan.');
        }
    
        // Jika status bukan 'menunggu', beri pesan kesalahan
        return redirect()->route('user.tickets.index')->with('error', 'Tiket tidak dapat dibatalkan karena sudah disetujui atau ditolak.');
    }
    

public function generateQRCode($id)
{
    $ticket = Ticket::find($id);
    if (!$ticket) {
        abort(404);
    }

    // Periksa status tiket sebelum menampilkan QR Code
    if ($ticket->status != 'disetujui') {
        return redirect()->route('user.tickets.index')->with('error', 'Tiket tidak tersedia untuk QR Code.');
    }

    // Generate QR Code dengan URL yang mengarah ke halaman struk
    $data = route('user.tickets.receipt', $ticket->id);
    $qrcode = DNS2DFacade::getBarcodeHTML($data, 'QRCODE');

    return view('dashboard.user.ticket.qr', compact('qrcode'));
}

    

    public function showReceipt($id)
    {
        $ticket = Ticket::with('user')->findOrFail($id);
        return view('dashboard.user.ticket.receipt', compact('ticket'));
    }
}