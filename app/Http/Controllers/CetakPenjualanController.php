<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\penjualan;

class CetakPenjualanController extends Controller
{
    public function index(){
        $penjualan = penjualan::all();
        return view('cetak-penjualan', compact('penjualan'));
    }

    public function print(){
        $penjualan = penjualan::all();

        $pdf = PDF::loadView('cetak-pdf-penjualan', compact('penjualan'));


        return $pdf->stream('laporan.pdf');
    }
}
