<?php

namespace App\Exports;

use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Carbon\Carbon;

class ExportTransaksialltiket implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithEvents
{
    protected $startDate;
    protected $endDate;
    protected $status;

    public function __construct($startDate, $endDate, $status)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->status = $status;
    }

    public function collection()
    {
        $query = Ticket::whereBetween('created_at', [$this->startDate, $this->endDate]);
        
        if ($this->status !== 'all') {
            $query->where('status', $this->status);
        }

        $tickets = $query->get();
        
        $data = $tickets->map(function ($ticket) {
            $total = 0;

            if ($ticket->status === 'disetujui') {
                $total = $ticket->total;
            }

            return [
                'ID' => $ticket->id,
                'Nama' => $ticket->user ? $ticket->user->name : '-',
                'Harga Ticket' => $ticket->product_price,
                'Jumlah Tiket' => $ticket->quantity,
                'Total Harga' => $total,
                'Status' => $ticket->status,
                'Metode Pay' => $ticket->payment_method,
                'Tanggal Transaksi' => $ticket->created_at->format('d-m-Y H:i:s'),
            ];
        });

        $totalPendapatan = $tickets->where('status', 'disetujui')->sum('total');
        $data->push([
            'ID' => '',
            'Nama' => 'Total Pendapatan',
            'Harga Ticket' => '',
            'Jumlah Tiket' => '',
            'Total Harga' => $totalPendapatan,
            'Status' => '',
            'Metode Pay' => '',
            'Tanggal Transaksi' => '',
        ]);

        return $data;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Harga Ticket',
            'Jumlah Tiket',
            'Total Harga',
            'Status',
            'Metode Pay',
            'Tanggal Transaksi',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet;
                $lastRow = $sheet->getHighestRow();
                $lastColumn = $sheet->getHighestColumn();

                // Style for headers
                $sheet->getStyle('A1:' . $lastColumn . '1')->applyFromArray([
                    'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '4472C4']],
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);

                // Style for data rows
                $sheet->getStyle('A2:' . $lastColumn . ($lastRow - 1))->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
                    'alignment' => ['vertical' => Alignment::VERTICAL_CENTER],
                ]);

                // Zebra striping for data rows
                for ($row = 2; $row <= $lastRow - 1; $row++) {
                    if ($row % 2 == 0) {
                        $sheet->getStyle('A' . $row . ':' . $lastColumn . $row)->applyFromArray([
                            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'E9EFF7']],
                        ]);
                    }
                }

                // Style for total row
                $sheet->getStyle('A' . $lastRow . ':' . $lastColumn . $lastRow)->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'FFD966']],
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
                ]);

                // Auto-fit column widths
                foreach (range('A', $lastColumn) as $column) {
                    $sheet->getColumnDimension($column)->setAutoSize(true);
                }
            },
        ];
    }
}
