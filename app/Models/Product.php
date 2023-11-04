<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'produk';
    use HasFactory;
    protected $fillable = [
    'Nama_produk',
    'Harga_beli',
    ];
}
