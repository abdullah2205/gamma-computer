<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id'); //tabel pesanan terkait dengan tabel user
    }

    public function pesanan_details()
    {
        return $this->hasMany(PesananDetail::class, 'pesanan_id','id'); //tabel pesanan memiliki banyak pesanan_detail
    }
}
