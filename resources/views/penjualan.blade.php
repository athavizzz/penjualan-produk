@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')

    <main id="main" class="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Penjualan</h1>
                    <table class="table table-bordered">
                        <thead>
                            <div class="text-end">
                                <a href="{{ route('penjualan.create') }}" class="btn btn-primary">Add</a>
                            </div>
                            <br>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">id_transaksi</th>
                                <th scope="col" class="text-center">Total</th>
                                <th scope="col" class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjualan as $key => $penjualan)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $penjualan->id_transaksi }}</td>
                                    <td>{{ $penjualan->total }}</td>
                                    <td>
                                        <div style="text-align: center;">
                                            <a href="{{ route('penjualan.edit', $penjualan->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <!-- Form to send DELETE request to delete route -->
                                            <form action="{{ route('penjualan.destroy', $penjualan->id) }}" method="POST"
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
