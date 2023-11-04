<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Favicons -->
 
</head>
<body>
    <h1 style="text-align: center">Cetak Penjualan</h1>

    <table border="1" cellspacing="0" cellpadding="10" style="width: 100%">
        <thead>
          
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Nomor_PO</th>
                <th scope="col" class="text-center">Tanggal_PO</th>
                <th scope="col" class="text-center">Suplier</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($penjualan as $key => $penjualan)
            <tr>
              <th scope="row">{{ $key + 1 }}</th>
              <td>{{ $penjualan->Nomor_PO }}</td>
              <td>{{ $penjualan->Tanggal_PO }}</td>
              <td>{{ $penjualan->Suplier }}</td>
            </tr>
           @endforeach
        </tbody>
    </table>
</body>
</html>