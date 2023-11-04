<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produk = Product::all(); // Mengambil semua data produk dari database

        return view('produk', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // Validasi data input
    $rules = [
        'nama_produk' => 'required|string|max:255',
        'harga_beli' => 'required|numeric|min:0',
    ];

    $messages = [
        'required' => 'Kolom :attribute wajib diisi.',
        'string' => 'Kolom :attribute harus berupa teks.',
        'max' => 'Kolom :attribute tidak boleh melebihi :max karakter.',
        'numeric' => 'Kolom :attribute harus berupa angka.',
        'min' => 'Kolom :attribute tidak boleh kurang dari :min.',
    ];

    $request->validate($rules, $messages);

    // Simpan data ke dalam database
    $product = new Product;
    $product->nama_produk = $request->input('nama_produk');
    $product->harga_beli = $request->input('harga_beli');
    $product->save();

    return redirect()->route('produk.index')->with('success', 'Data produk berhasil ditambahkan');
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
    public function edit(Product $produk)
    {
        return view('edit-produk', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validate the request data
    $rules = [
        'nama_produk' => 'required|string|max:255',
        'harga_beli' => 'required|numeric|min:0',
    ];

    $messages = [
        'required' => 'Kolom :attribute wajib diisi.',
        'string' => 'Kolom :attribute harus berupa teks.',
        'max' => 'Kolom :attribute tidak boleh melebihi :max karakter.',
        'numeric' => 'Kolom :attribute harus berupa angka.',
        'min' => 'Kolom :attribute tidak boleh kurang dari :min.',
    ];

    $request->validate($rules, $messages);

    // Find the product by its ID
    $product = Product::find($id);

    if (!$product) {
        // Handle the case where the product is not found
        // For example, you can redirect or show an error message.
    }

    // Update the product with the new data
    $product->nama_produk = $request->input('nama_produk');
    $product->harga_beli = $request->input('harga_beli');
    $product->save();

    return redirect()->route('produk.index')->with('success', 'Data produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            // Handle the case where the product is not found (e.g., show an error message).
            return redirect()->route('produk.index')->with('error', 'Data produk tidak ditemukan');
        }
    
        $product->delete();
        return redirect()->route('produk.index')->with('success', 'Data produk berhasil dihapus');
    }
    
}
