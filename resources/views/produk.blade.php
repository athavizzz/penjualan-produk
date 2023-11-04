@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')

    <main id="main" class="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Daftar Produk</h1>
                    <table class="table table-bordered">
                        <thead>
                            <div class="text-end">
                                <a href="{{ route('produk.create') }}" class="btn btn-primary">Add</a>
                            </div>
                            <br>
                            <tr>
                                <th scope="col" class="text-center">NO</th>
                                <th scope="col" class="text-center">Nama produk</th>
                                <th scope="col" class="text-center">Harga beli</th>
                                <th scope="col" class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $key => $product)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $product->nama_produk }}</td>
                                    <td>{{ $product->harga_beli }}</td>
                                    <td>
                                        <div style="text-align: center;">
                                            <a href="{{ route('produk.edit', $product->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <!-- Form to send DELETE request to delete route -->
                                            <form action="{{ route('produk.destroy', $product->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-10 mx-auto col-lg-5" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    </main>
@endsection
