<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan Tiket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 21cm;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            padding: 10px 0; /* Menambahkan jarak dalam header */
            border-bottom: 1px solid #000;
        }

        .header img {
            max-width: 80px; /* Mengatur ukuran maksimum gambar */
            margin-bottom: 10px;
        }

        .header p {
            margin: 2px 0;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            color: #0056b3;
            font-size: 18px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .content {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 10px;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://raw.githubusercontent.com/corlatyu/gambarurl/main/Desain%20tanpa%20judul%20(11).png" alt="Logo">
            <p>Alamat Jl. Kebraon 3, Kota Surabaya, Negara Indonesia</p>
            <p>Nomor Telepon: 0822-9333-1156 | Email: info@ptsantoso.com</p>
        </div>

        <h2>Laporan Penjualan Tiket</h2>

        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Harga Ticket</th>
                        <th>Qty</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Metode Pembayaran</th>
                        <th>Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ticket->user ? $ticket->user->name : '-' }}</td>
                            <td>Rp {{ number_format($ticket->product_price, 0, ',', '.') }}</td>
                            <td>{{ $ticket->quantity }}</td>
                            <td>Rp {{ number_format($ticket->total, 0, ',', '.') }}</td>
                            <td>{{ $ticket->status }}</td>
                            <td>{{ $ticket->payment_method }}</td>
                            <td>{{ $ticket->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Menambahkan total pendapatan -->
            <div style="margin-top: 20px; text-align: right;">
                <strong>Total Pendapatan:</strong> Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
            </div>
        </div>

        <div class="footer">
            <p>© 2024 SpWk Indonesia. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
