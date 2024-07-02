@extends('layout.masteradmin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Produk</h6>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="name">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="price">Harga Produk</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" readonly>
        </div>
        <div class="form-group">
            <label for="image">Gambar Produk</label>
            <br>
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 200px; max-height: 200px;">
        </div>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
