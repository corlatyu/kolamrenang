@extends('layout.masteruser')

@section('content')
    <!-- Box Informasi Rekening -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Rekening PT Santoso</h6>
            <button class="btn btn-link btn-sm" type="button" data-toggle="collapse" data-target="#rekeningInfo" aria-expanded="true" aria-controls="rekeningInfo">
                <i class="fas fa-minus"></i>
            </button>
        </div>
        <div id="rekeningInfo" class="collapse show">
            <div class="card-body">
                Bank: BCA <br>
                Nomor Rekening: 1234567890 <br>
                Atas Nama: PT Santoso
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulir Pemesanan Tiket</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('user.tickets.store') }}" method="POST" enctype="multipart/form-data" id="ticketForm">
                @csrf

                <div class="form-group">
                    <label for="product_id">Pilih Produk:</label>
                    <select name="product_id" id="product_id" class="form-control">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }} - Rp {{ number_format($product->price, 0, ',', '.') }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggal_kunjungan">Tanggal Kunjungan:</label>
                    <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="quantity">Jumlah Tiket:</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1">
                </div>

                <div class="form-group">
                    <label for="total">Total Harga:</label>
                    <input type="text" name="total" id="total" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="bukti_pembayaran">Unggah Bukti Transfer (JPEG/PNG/JPG, maks 2MB):</label>
                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control-file">
                </div>

                <button type="submit" class="btn btn-primary" id="submitButton">Pesan Tiket</button>
            </form>
        </div>
    </div>



<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Peringatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Silakan unggah bukti transfer sebelum melanjutkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var productSelect = document.getElementById('product_id');
        var quantityInput = document.getElementById('quantity');
        var totalInput = document.getElementById('total');
        var buktiPembayaranInput = document.getElementById('bukti_pembayaran');
        var submitButton = document.getElementById('submitButton');

        function calculateTotal() {
            var price = parseFloat(productSelect.options[productSelect.selectedIndex].getAttribute('data-price'));
            var quantity = parseInt(quantityInput.value);
            var total = price * quantity;
            totalInput.value = formatRupiah(total.toString(), 'Rp ');
        }

        function validateForm(event) {
            if (buktiPembayaranInput.files.length === 0) {
                event.preventDefault();
                $('#uploadModal').modal('show');
            }
        }

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix === undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
        }

        productSelect.addEventListener('change', calculateTotal);
        quantityInput.addEventListener('input', calculateTotal);
        buktiPembayaranInput.addEventListener('change', calculateTotal);
        submitButton.addEventListener('click', validateForm);
        calculateTotal();
    });
</script>
@endsection
