<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'jumlah_pesanan',
        'total_harga',
        'product_id',
        'pesanan_id'
    ];

    public function pesanans()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id'); //tabel pesanan_detail terkait dengan pesanan
    }
    
    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id'); //tabel pesanan_detail terkait dengan product
    }
}
