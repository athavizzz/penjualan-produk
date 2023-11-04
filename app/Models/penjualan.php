<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    protected $table = 'penjualan';
    use HasFactory;
    protected $fillable = [
    'id_transaksi',
    'total',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transaksi) {
            // Ambil ID transaksi terakhir dari database
            $lastTransaksi = static::orderBy('id_transaksi', 'desc')->first();

            // Tentukan angka awal untuk ID transaksi
            $nextTransaksiNumber = $lastTransaksi ? $lastTransaksi->id_transaksi + 1 : 1;

            // Format angka ID transaksi menjadi string dengan panjang tetap, contoh: "0001"
            $formattedTransaksiNumber = str_pad($nextTransaksiNumber, 4, '0', STR_PAD_LEFT);

            // Setel ID transaksi pada model
            $transaksi->id_transaksi = $formattedTransaksiNumber;
        });
    }

}
