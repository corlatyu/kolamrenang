<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Exports\ExportTransaksialltiket;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('dashboard.admin.transaksi.index', compact('tickets'));
    }

    public function print($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('dashboard.admin.transaksi.print', compact('ticket'));
    }

    public function view_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
    
        // Menghitung total pendapatan hanya dari tiket yang disetujui
        $tickets = Ticket::where('status', 'disetujui')->get();
        $totalPendapatan = $tickets->sum('total');
    
        // Menyiapkan data untuk view PDF
        $data = [
            'tickets' => $tickets,
            'totalPendapatan' => $totalPendapatan,
        ];
    
        // Render view PDF dengan MPDF
        $html = view('dashboard.admin.transaksi.pdf', $data)->render();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    
    
    public function export(Request $request)
    {
        $period = $request->input('period', 'daily');
        $date = $request->input('date', now()->format('Y-m-d'));
        $status = $request->input('status', 'all');

        switch ($period) {
            case 'daily':
                $startDate = Carbon::parse($date)->startOfDay();
                $endDate = Carbon::parse($date)->endOfDay();
                break;
            case 'weekly':
                $startDate = Carbon::parse($date)->startOfWeek();
                $endDate = Carbon::parse($date)->endOfWeek();
                break;
            case 'monthly':
                $startDate = Carbon::parse($date)->startOfMonth();
                $endDate = Carbon::parse($date)->endOfMonth();
                break;
            case 'yearly':
                $startDate = Carbon::parse($date)->startOfYear();
                $endDate = Carbon::parse($date)->endOfYear();
                break;
            default:
                $startDate = Carbon::parse($date)->startOfDay();
                $endDate = Carbon::parse($date)->endOfDay();
        }

        $fileName = 'transaksi_' . $period . '_' . $status . '.xlsx';
        return Excel::download(new ExportTransaksialltiket($startDate, $endDate, $status), $fileName);
    }
}
