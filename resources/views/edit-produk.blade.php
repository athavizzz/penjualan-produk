@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')
<div class="mx-auto w-50 my-5 py-5">
    <h1 class="h2">Edit Produk</h1>
    
    <div class="col-lg-8">
        <a href="{{ route('produk.index') }}" class="btn btn-secondary mb-3">Back</a>

        <form action="{{ route('produk.update', $produk->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama produk</label>
                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk"
                    name="nama_produk" required autofocus value="{{ $produk->nama_produk }}" placeholder="Nama produk">
                @error('nama_produk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga_beli" class="form-label">Hatga Beli</label>
                <input type="number" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli"
                    name="harga_beli" required autofocus value="{{ $produk->harga_beli }}" placeholder="Harga beli">
                @error('harga_beli')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">ubah data produk</button>
        </form>
    </div>
</div>
@endsection
