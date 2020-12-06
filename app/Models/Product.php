<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'price',
        'brand_id',
        'is_ready',
        'color',
        'os',
        'processor',
        'graphics',
        'display',
        'memory',
        'storage',
        'image',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id'); //tabel product terkait dengan tabel brand
    }

    public function pesanan_details()
    {
        return $this->hasMany(PesananDetail::class, 'product_id','id'); //tabel product memiliki banyak pesanan_detail
    }
}
