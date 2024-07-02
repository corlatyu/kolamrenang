@extends('layout.masteradmin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Produk</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama Produk</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="price">Harga Produk</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
            </div>
            <div class="form-group">
                <label for="image">Gambar Saat Ini</label>
                <br>
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 200px; max-height: 200px;">
                <br><br>
                <label for="image">Ganti Gambar Produk</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <button type="reset" class="btn btn-warning">Reset</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali ke Daftar Produk</a>
        </form>
    </div>
</div>
@endsection
