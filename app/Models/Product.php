<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Mendefinisikan kolom yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'name',   // Nama produk
        'price',  // Harga produk
        'image',  // Nama file gambar produk
    ];

    // Mendefinisikan relasi antara Product dengan Ticket: satu produk memiliki banyak tiket
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
