@extends('layout.masteruser')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pemesanan Tiket</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->tanggal_kunjungan }}</td>
                            <td>{{ ucfirst($ticket->status) }}</td>
                            <td>Rp {{ number_format($ticket->total, 0, ',', '.') }}</td>
                            <td>
                                @if($ticket->status == 'ditolak' || $ticket->status == 'cancel')
                                    @if($ticket->status == 'ditolak')
                                        Pembayaran Tidak Valid
                                    @elseif($ticket->status == 'cancel')
                                        Tiket Dibatalkan
                                    @endif
                                @elseif($ticket->status == 'menunggu')
                                    <form action="{{ route('user.tickets.destroy', $ticket->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin membatalkan tiket ini?')">Batalkan</button>
                                    </form>
                                @else
                                    <a href="{{ route('user.tickets.qr', $ticket->id) }}" class="btn btn-info btn-sm">Lihat QR Code</a>
                                @endif
                            </td>                            
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
@endsection