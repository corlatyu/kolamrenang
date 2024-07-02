@extends('layout.masteradmin')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary mb-2 mb-md-0">Kasir</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('cashier.store') }}" method="POST" enctype="multipart/form-data" id="purchaseForm">
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
                    <label for="quantity">Jumlah Tiket:</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1">
                </div>

                <div class="form-group">
                    <label for="payment_method">Metode Pembayaran:</label>
                    <select name="payment_method" id="payment_method" class="form-control">
                        <option value="cash">Tunai</option>
                        <option value="tf">Transfer Bank</option>
                    </select>
                </div>

                <div class="form-group" id="bukti_pembayaran_group" style="display: none;">
                    <label for="bukti_pembayaran">Unggah Bukti Transfer:</label>
                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control">
                </div>

                <div class="form-group">
                    <label for="total">Total Harga:</label>
                    <input type="text" name="total" id="total" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="cash_given">Jumlah Uang Tunai:</label>
                    <input type="number" name="cash_given" id="cash_given" class="form-control" min="0" step="any" {{ old('payment_method') == 'tf' ? 'disabled' : '' }}>
                </div>

                <div class="form-group" id="change_group" style="display: none;">
                    <label for="change">Pengembalian Uang:</label>
                    <input type="text" name="change" id="change" class="form-control" readonly>
                </div>

                <button type="submit" class="btn btn-primary">Selesai</button>
            </form>
        </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var productSelect = document.getElementById('product_id');
        var quantityInput = document.getElementById('quantity');
        var totalInput = document.getElementById('total');
        var paymentMethodSelect = document.getElementById('payment_method');
        var cashGivenInput = document.getElementById('cash_given');
        var changeInput = document.getElementById('change');

        function calculateTotal() {
            var price = parseFloat(productSelect.options[productSelect.selectedIndex].getAttribute('data-price'));
            var quantity = parseInt(quantityInput.value);
            var total = price * quantity;
            totalInput.value = total.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });

            // Hitung pengembalian uang jika metode pembayaran tunai dipilih
            if (paymentMethodSelect.value === 'cash') {
                var cashGiven = parseFloat(cashGivenInput.value);
                var change = cashGiven - total;
                if (change >= 0) {
                    changeInput.value = change.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
                } else {
                    changeInput.value = "Uang yang diberikan kurang";
                }
                document.getElementById('change_group').style.display = 'block';
            } else {
                // Sembunyikan input pengembalian uang jika metode pembayaran bukan tunai
                document.getElementById('change_group').style.display = 'none';
            }

            // Nonaktifkan input Jumlah Uang Tunai jika metode pembayaran adalah 'tf'
            cashGivenInput.disabled = paymentMethodSelect.value === 'tf';
        }

        productSelect.addEventListener('change', calculateTotal);
        quantityInput.addEventListener('input', calculateTotal);
        paymentMethodSelect.addEventListener('change', calculateTotal);
        cashGivenInput.addEventListener('input', calculateTotal);
        calculateTotal(); // Hitung total awal saat halaman dimuat
    });
</script>
@endsection
