@extends('layouts.app')

@section('title', 'Add')

@section('content')
    <form method="post" action="{{ route('produk.store') }}" class="mx-auto w-50 my-5 py-5">
        @csrf
        <div class="form-group">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" id="nama_produk" required>
        </div>
        <div class="form-group">
            <label for="harga_beli">Harga Beli</label>
            <input type="number" name="harga_beli" class="form-control" id="harga_beli" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
