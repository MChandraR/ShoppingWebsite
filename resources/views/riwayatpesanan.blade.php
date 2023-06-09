<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Pesanan</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  <h1>Riwayat Pesanan</h1>

  @if($riwayatPesanan->isEmpty())
    <p>Tidak ada riwayat pesanan.</p>
  @else
    <table>
      <thead>
        <tr>
          <th>No Pesanan</th>
          <th>Tanggal Pesanan</th>
          <th>Total Harga</th>
        </tr>
      </thead>
      <tbody>
        @foreach($riwayatPesanan as $pesanan)
          <tr>
            <td>{{ $pesanan->no_pesanan }}</td>
            <td>{{ $pesanan->tanggal_pesanan }}</td>
            <td>{{ $pesanan->total_harga }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif

  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
