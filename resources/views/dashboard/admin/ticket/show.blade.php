{{-- <!-- resources/views/admin/tickets/show.blade.php -->
@extends('layout.masteradmin')

@section('content')
<div class="container">
    <h1>Detail Tiket</h1>
    <p>ID: {{ $ticket->id }}</p>
    <p>Nama Pengguna: {{ $ticket->user->name }}</p>
    <p>Email Pengguna: {{ $ticket->user->email }}</p>
    <p>Tanggal Kunjungan: {{ $ticket->tanggal_kunjungan }}</p>
    <p>Status: {{ ucfirst($ticket->status) }}</p>
    <p>Bukti Pembayaran: 
        @if($ticket->bukti_pembayaran)
            <img src="{{ asset('storage/' . $ticket->bukti_pembayaran) }}" alt="Bukti Pembayaran" width="200">
        @else
            Tidak ada bukti pembayaran
        @endif
    </p>
    <a href="{{ route('ticket.index') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection --}}
