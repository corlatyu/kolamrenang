<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #008CBA;
            padding-bottom: 10px;
        }
        .header h2 {
            margin: 0;
            color: #008CBA;
        }
        .address {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
            text-align: center;
        }
        .table-container {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        table th {
            background-color: #f8f8f8;
            font-weight: bold;
            color: #333;
        }
        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        .btn {
            background-color: #008CBA;
            color: white;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: block;
            border-radius: 4px;
            margin-top: 20px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #005f6b;
        }
        .separator {
            border: none;
            border-top: 1px dashed #ccc;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Struk Pesanan</h2>
        </div>

        <div class="address">
            Alamat: Jl. Kebraon 3 Mundu No 17
        </div>

        <div class="table-container">
            <table>
                <tr>
                    <th>ID Transaksi</th>
                    <td>{{ $ticket->id }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $ticket->user ? $ticket->user->name : '-' }}</td>
                </tr>
            </table>

            <hr class="separator">

            <table>
                <tr>
                    <th>Harga</th>
                    <td>Rp {{ number_format($ticket->product_price, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Jumlah Tiket</th>
                    <td>{{ $ticket->quantity }}</td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td>Rp {{ number_format($ticket->total, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Metode Pembayaran</th>
                    <td>{{ $ticket->payment_method }}</td>
                </tr>
                <tr>
                    <th>Tanggal Transaksi</th>
                    <td>{{ $ticket->created_at->format('d-m-Y H:i:s') }}</td>
                </tr>
            </table>
        </div>

        <div class="total">
            Total: Rp {{ number_format($ticket->total, 0, ',', '.') }}
        </div>

        <div class="footer">
            <p>Terima kasih atas pembelian Anda!</p>
        </div>

        <a href="#" class="btn" onclick="window.print()">Cetak</a>
    </div>
</body>
</html>