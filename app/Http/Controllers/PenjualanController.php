<?php

namespace App\Http\Controllers;

use App\Models\penjualan;
use App\Models\Product;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = penjualan::all(); // Mengambil semua data penjualan$penjualan dari database
        return view('penjualan', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $namaProduk = Product::get()->pluck('nama_produk', 'id');
        return view('data-penjualan', compact('namaProduk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // dd($request->all());
        $rules = [
            'total_inputan' => 'required|max:255',
        ];
    
        $request->validate($rules);
    
        // Simpan data ke dalam database
        $penjualan = new penjualan();
        $penjualan->total = $request->total_inputan;
        $penjualan->save();
    
        return redirect()->route('penjualan.index')->with('success', 'Data produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penjualan = penjualan::find($id);
        return view('edit-penjualan', compact('penjualan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
             // Validate the request data

            //  dd($request->all());
        $rules = [
            'total' => 'required',
        ];
    
        $request->validate($rules);
        // Find the product by its ID
        $penjualan = penjualan::find($id);
    
        $penjualan->total = $request->total;
        $penjualan->save();
    
        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penjualan = penjualan::find($id);
    
        if (!$penjualan) {
            // Handle the case where the pe$penjualan is not found (e.g., show an error message).
            return redirect()->route('penjualan.index')->with('error', 'Data pembelian tidak ditemukan');
        }
    
        $penjualan->delete();
        return redirect()->route('penjualan.index')->with('success', 'Data pembelian berhasil dihapus');
    }

    public function getHargaBeli(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Product::find($product_id);
    
        if ($product) {
            return response()->json(['harga_beli' => $product->harga_beli]);
        } else {
            return response()->json(['error' => 'Produk tidak ditemukan']);
        }
    }
    

}
