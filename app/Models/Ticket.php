<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tanggal_kunjungan',
        'status',
        'payment_method',
        'bukti_pembayaran',
        'total',
        'quantity',
        'product_price', // Menambahkan product_price ke dalam fillable
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
