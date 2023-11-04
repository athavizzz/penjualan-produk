<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Product;

class udukseeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     // Contoh data produk
     $products = [
        [
            'Nama_produk' => 'Produk 1',
            'Harga_beli' => 1000,
        ],
        [
            'Nama_produk' => 'Produk 2',
            'Harga_beli' => 1200,
        ],
        // Tambahkan data produk lainnya sesuai kebutuhan
    ];

    // Masukkan data produk ke dalam tabel produk
    foreach ($products as $productData) {
        Product::create($productData);
    }
    }
}
