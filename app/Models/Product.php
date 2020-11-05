<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id'); //tabel product terkait dengan tabel brand
    }

    public function pesanan_details()
    {
        return $this->hasMany(PesananDetail::class, 'product_id','id'); //tabel product memiliki banyak pesanan_detail
    }
}
