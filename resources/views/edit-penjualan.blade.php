<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
</head>

<body>
    <h1 class="h2">Edit Data</h1>
    <div class="col-lg-8">
        <a href="{{ route('penjualan.index') }}" class="btn btn-secondary mb-3">Kembali</a>
        <form method="POST" action="{{ route('penjualan.update', $penjualan->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Supplier">Total</label>
                <input type="text" class="form-control" id="total" readonly name="total"
                    value="{{ $penjualan->total }}" required>
            </div>

            <br>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#nama_produk').change(function() {
                var product_id = $(this).val();

                $.ajax({
                    url: '/getHargaBeli',
                    type: 'GET',
                    data: {
                        product_id: product_id
                    },
                    success: function(response) {
                        if (response.harga_beli) {
                            $('#harga').val(response.harga_beli);
                        } else {
                            $('#harga').val('Produk tidak ditemukan');
                        }
                    },
                    error: function() {
                        $('#harga').val('Terjadi kesalahan saat memuat harga');
                    }
                });
            });

            $('#jumlah').on('input', function() {
                updateTotal();
            });

            function updateTotal() {
                var hargaBeli = parseFloat($('#harga').val()) || 0;
                var jumlah = parseFloat($('#jumlah').val()) || 0;

                var total = hargaBeli * jumlah;

                // Bulatkan total dan tampilkan tanpa koma
                $('#total').val(total.toFixed(0));
            }
        });
    </script>

</body>

</html>
