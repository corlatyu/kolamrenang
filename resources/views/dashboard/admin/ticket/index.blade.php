@extends('layout.masteradmin')

@section('content')

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary mb-2 mb-md-0">Manajemen Tiket</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                <table class="table table-bordered table-striped " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Tanggal Kunjungan</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tickets as $ticket)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ticket->user->name }}</td>
                                        <td>{{ $ticket->tanggal_kunjungan }}</td>
                                        <td>Rp {{ number_format($ticket->product_price, 0, ',', '.') }}</td>
                                        <td>{{ $ticket->quantity }}</td>
                                        <td>Rp {{ number_format($ticket->total, 0, ',', '.') }}</td>
                                        <td>{{ ucfirst($ticket->status) }}</td>
                                        <td>
                                            <a href="{{ route('ticket.show', $ticket->id) }}" class="btn btn-info btn-sm" data-toggle="modal" data-target="#showModal{{ $ticket->id }}">Lihat</a>
                                             <!-- Modal Edit -->
                                             <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $ticket->id }}">
                                                Edit
                                            </button>
                                            <div class="modal fade" id="editModal{{ $ticket->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $ticket->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{ $ticket->id }}">Edit Tiket</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
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

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal Edit -->
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $ticket->id }}">
                                                Hapus
                                            </button>

                                           <!-- Modal Show -->
<div class="modal fade" id="showModal{{ $ticket->id }}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel{{ $ticket->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel{{ $ticket->id }}">Detail Tiket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-4"><strong>ID:</strong></div>
                    <div class="col-md-8">{{ $ticket->id }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Nama Pengguna:</strong></div>
                    <div class="col-md-8">{{ $ticket->user->name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Email Pengguna:</strong></div>
                    <div class="col-md-8">{{ $ticket->user->email }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Tanggal Kunjungan:</strong></div>
                    <div class="col-md-8">{{ $ticket->tanggal_kunjungan }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Status:</strong></div>
                    <div class="col-md-8">{{ ucfirst($ticket->status) }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Bukti Pembayaran:</strong></div>
                    <div class="col-md-8">
                        @if (pathinfo($ticket->bukti_pembayaran, PATHINFO_EXTENSION) == 'pdf')
                        <embed src="{{ asset('uploads/' . $ticket->bukti_pembayaran) }}" type="application/pdf" width="100%" height="600px">
                            @else
                            <img src="{{ asset('uploads/' . $ticket->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Show -->

                                            

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="editModal{{ $ticket->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $ticket->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{ $ticket->id }}">Edit Tiket</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('ticket.edit', $ticket->id) }}" method="GET">
                                                            <div class="modal-body">
                                                                <!-- Your edit form fields here -->
                                                                <!-- Example: -->
                                                                <div class="form-group">
                                                                    <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
                                                                    <input type="text" class="form-control" id="tanggal_kunjungan" name="tanggal_kunjungan" value="{{ $ticket->tanggal_kunjungan }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal Edit -->

                                            <!-- Modal Delete -->
                                            <div class="modal fade" id="deleteModal{{ $ticket->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $ticket->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{ $ticket->id }}">Konfirmasi Hapus Tiket</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus tiket ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <form action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" style="display:inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal Delete -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
