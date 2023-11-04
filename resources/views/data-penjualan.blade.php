<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penjualan</title>

    <!-- Tambahkan tautan ke Bootstrap CSS jika belum ada -->

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
</head>

<body>
    <h1 class="m-2">Pembelian</h1>
    <div class="container d-flex justify-content-between gap-5">

        <div class="w-75">
            @csrf
            <!-- Bootstrap select -->
            <div class="form-group py-2">
                <label for="telepon">Produk</label>
                <select class="form-control text-black" aria-label="Default select example" id="nama_produk"
                    name="nama_produk" required>
                    <option disabled selected>Pilih produk</option>
                    @foreach ($namaProduk as $key => $item)
                        <option value="{{ $key }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group py-2">
                <label for="telepon">Harga</label>
                <input type="number" id="harga_beli" name="harga_beli" readonly class="form-control" required>
            </div>
            <div class="form-group py-2">
                <label for="telepon">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" id="telepon" required>
            </div>
            <div class="form-group py-2">
                <label for="telepon">Total</label>
                <input type="number" name="total" class="form-control" id="total" required>
            </div>

            <button type="button" class="btn btn-primary py-2 px-4">Beli</button>
        </div>
        <table class="table" id="table-data">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>

                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <td>Total Semua</td>
                    <td id="totalSemua"></td>
                </tr>
            </tfoot>
        </table>
        <button class="btn btn-success" id="print-button">Cetak </button>
        <form method="post" action="{{ route('penjualan.store') }}">
            @csrf
            <div class="form-group py-2">
                <input class="d-none" type="number" name="total_inputan" class="form-control" id="total-inputan" required>
            </div>
            <button class="btn btn-primary" type="submit">Simpan Database</button>
        </form>

        
    </div>

    <!-- Tambahkan tautan ke Bootstrap JavaScript dan jQuery jika diperlukan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById('print-button').addEventListener('click', function() {
            createPDF();
        });

        function createPDF() {
            var sTable = document.getElementById('table-data').outerHTML;
            var style = "<style>";
            style = style + "table {width: 100%;font: 17px Calibri;}";
            style = style + "table, th, td {border: solid 1px #000; border-collapse: collapse;";
            style = style + "padding: 2px 3px;text-align: center;}";
            style = style + "</style>";

            var win = window.open('', '', 'width=800,height=600');
            win.document.write('<html><head>');
            win.document.write('<title>Tabel Saya</title>');
            win.document.write(style);
            win.document.write('</head>');
            win.document.write('<body>');
            win.document.write(sTable);
            win.document.write('</body></html>');

            win.document.close();
            win.print();
        }




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
                            $('#harga_beli').val(response.harga_beli);
                        } else {
                            $('#harga_beli').val('Produk tidak ditemukan');
                        }
                    },
                    error: function() {
                        $('#harga_beli').val('Terjadi kesalahan saat memuat harga_beli');
                    }
                });
            });

            // Menonaktifkan tombol "Beli" saat halaman dimuat
            $('button[type="button"]').prop('disabled', true);

            $('#nama_produk, #jumlah').on('input', function() {
                // Memeriksa apakah semua input telah diisi
                var isNamaProdukFilled = $('#nama_produk').val() !== '';
                var isJumlahFilled = $('#jumlah').val() !== '';

                // Mengaktifkan tombol "Beli" hanya jika semua input telah diisi
                if (isNamaProdukFilled && isJumlahFilled) {
                    $('button[type="button"]').prop('disabled', false);
                } else {
                    $('button[type="button"]').prop('disabled', true);
                }
            });

            $('#jumlah').on('input', function() {
                updateTotal();
            });

            function updateTotal() {
                var hargaBeli = parseFloat($('#harga_beli').val()) || 0;
                var jumlah = parseFloat($('#jumlah').val()) || 0;
                var total = hargaBeli * jumlah;
                $('#total').val(total.toFixed(0));
                updateTotalSemua(); // Panggil fungsi untuk menghitung total semua kolom total
            }

            function updateTotalSemua() {
                var totalSemua = 0;
                $('#table-data tbody tr').each(function() {
                    var total = parseFloat($(this).find('td:eq(3)').text()) ||
                        0; // Kolom total adalah kolom keempat (indeks 3)
                    totalSemua += total;
                });
                $('#totalSemua').text(totalSemua.toFixed(0));

                $('#total-inputan').val(totalSemua.toFixed(0));
            }

            $('button[type="button"]').click(function() {
                var namaProduk = $('#nama_produk option:selected').text();
                var hargaBeli = parseFloat($('#harga_beli').val()) || 0;
                var jumlah = parseFloat($('#jumlah').val()) || 0;
                var total = parseFloat($('#total').val()) || 0;

                var newRow = $('<tr>').append(
                    $('<td>').text(namaProduk),
                    $('<td>').text(hargaBeli),
                    $('<td>').text(jumlah),
                    $('<td>').text(total)
                );

                $('#table-data tbody').append(newRow);
                updateTotalSemua();

                // Reset nilai-nilai input setelah pembelian
                $('#nama_produk').val('');
                $('#harga_beli').val('');
                $('#jumlah').val('');
                $('#total').val('');

                $('button[type="button"]').prop('disabled', true);
            });

            // Saat elemen #nama_produk berubah, reset nilai input
            $('#nama_produk').change(function() {
                $('#harga_beli, #jumlah, #total').val('');
                updateTotalSemua();
            });
        });
    </script>

</body>

</html>
