{{-- <!-- resources/views/admin/tickets/edit.blade.php -->
@extends('layout.masteradmin')

@section('content')
<div class="container">
    <h1>Edit Tiket</h1>

    <form action="{{ route('ticket.update', $ticket->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="menunggu" {{ $ticket->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="disetujui" {{ $ticket->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                <option value="ditolak" {{ $ticket->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    </form>
</div>
@endsection --}}
