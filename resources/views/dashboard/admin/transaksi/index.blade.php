@extends('layout.masteradmin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Transaksi</h6>
            <div class="btn-group">
                <a href="{{ route('view.transaksi.pdf') }}" target="_blank" class="btn btn-danger btn-sm">
                    <i class="fas fa-file-pdf fa-sm mr-1"></i> Export PDF
                </a>
                <button class="btn btn-success btn-sm ml-2" type="button" data-toggle="collapse" data-target="#collapseExport" aria-expanded="false" aria-controls="collapseExport">
                    <i class="fas fa-file-excel fa-sm mr-1"></i> Export Excel
                </button>
            </div>
        </div>
    </div>



    <div class="collapse" id="collapseExport">
        <div class="card-body bg-light">
            <form action="{{ route('admin.transactions.export') }}" method="GET">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="period">Periode</label>
                        <select name="period" id="period" class="form-control">
                            <option value="daily">Harian</option>
                            <option value="weekly">Mingguan</option>
                            <option value="monthly">Bulanan</option>
                            <option value="yearly">Tahunan</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="date">Tanggal</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{ now()->format('Y-m-d') }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="all">Semua Status</option>
                            <option value="menunggu">Pending</option>
                            <option value="disetujui">Approved</option>
                            <option value="ditolak">Rejected</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-success btn-block">
                            <i class="fas fa-file-excel mr-2"></i>Export Excel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Harga Ticket</th>
                            <th>Qty</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Metode Pay</th>
                            <th>Tanggal Transaksi</th>
                            <th>Aksi</th>
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
                                <td>
                                    <span class="font-weight-bold
                                        @if($ticket->status == 'ditolak') text-danger
                                        @elseif($ticket->status == 'menunggu') text-warning
                                        @elseif($ticket->status == 'disetujui') text-success
                                        @endif
                                    ">
                                        {{ $ticket->status }}
                                    </span>
                                </td>
                                <td>{{ $ticket->payment_method }}</td>
                                <td>{{ $ticket->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton-{{ $ticket->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $ticket->id }}">
                                            @if($ticket->status == 'disetujui')
                                                <a href="{{ route('admin.transactions.print', $ticket->id) }}" class="dropdown-item" target="_blank">
                                                    <i class="fas fa-print mr-2"></i> Print
                                                </a>
                                            @endif
                                            @if ($ticket->payment_method == 'tf')
                                                @if ($ticket->bukti_pembayaran)
                                                    <button class="dropdown-item" data-toggle="modal" data-target="#previewModal-{{ $ticket->id }}">
                                                        <i class="fas fa-eye mr-2"></i> Preview Bukti TF
                                                    </button>
                                                @else
                                                    <button class="dropdown-item" data-toggle="modal" data-target="#uploadModal-{{ $ticket->id }}">
                                                        <i class="fas fa-upload mr-2"></i> Upload Bukti
                                                    </button>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                
                            </tr>
                            <!-- Modal untuk upload bukti pembayaran -->
                            <div class="modal fade" id="uploadModal-{{ $ticket->id }}" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('cashier.upload', $ticket->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="uploadModalLabel">Upload Bukti Pembayaran</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="bukti_pembayaran">Pilih File Bukti Pembayaran (PDF, JPEG, PNG, maks 2MB)</label>
                                                    <input type="file" class="form-control-file" id="bukti_pembayaran" name="bukti_pembayaran" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal untuk preview bukti pembayaran -->
                            <div class="modal fade" id="previewModal-{{ $ticket->id }}" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="previewModalLabel">Preview Bukti Pembayaran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @if (pathinfo($ticket->bukti_pembayaran, PATHINFO_EXTENSION) == 'pdf')
                                                <embed src="{{ asset('uploads/' . $ticket->bukti_pembayaran) }}" type="application/pdf" width="100%" height="600px">
                                            @else
                                                <img src="{{ asset('uploads/' . $ticket->bukti_pembayaran) }}" class="img-fluid">
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#period').change(function() {
            var period = $(this).val();
            var dateInput = $('#date');
            
            if (period === 'daily') {
                dateInput.attr('type', 'date');
            } else if (period === 'weekly') {
                dateInput.attr('type', 'week');
            } else if (period === 'monthly') {
                dateInput.attr('type', 'month');
            } else if (period === 'yearly') {
                dateInput.attr('type', 'number').attr('min', '2000').attr('max', new Date().getFullYear());
            }
        });

        // Script untuk mengubah tombol setelah upload bukti pembayaran
        $('#dataTable').on('click', '.btn-info', function() {
            var button = $(this);
            var modal = button.closest('.modal');
            var ticketId = modal.attr('id').replace('uploadModal-', '');
            
            // Simpan data ketika bukti pembayaran diunggah
            $('#uploadForm-' + ticketId).on('submit', function(event) {
                event.preventDefault();
                var formData = new FormData($(this)[0]);
                
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Ubah tombol "Upload Bukti" menjadi "Preview Bukti"
                        button.removeClass('btn-info').addClass('btn-success').text('Preview Bukti');
                        button.attr('data-toggle', 'modal').attr('data-target', '#previewModal-' + ticketId);
                        modal.modal('hide');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    });
</script>
@endsection