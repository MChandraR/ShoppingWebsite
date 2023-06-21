<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Pesanan</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/riwayat.css') }}">
</head>

<body>
  <h1 class="header">Riwayat Pesanan</h1>
  <span>Total pesanan : {{count($riwayatPesanan)}} </span>
  @if($riwayatPesanan->isEmpty())
    <p>Tidak ada riwayat pesanan.</p>
  @else
  <center>
    <table class="table riwayat-table">
      <thead >
        <tr style="  background: orange;">
          <th>No Pesanan</th>
          <th>Tanggal Pesanan</th>
          <th>Total Harga</th>
          <th style="text-align:center;">Status Pesanan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($riwayatPesanan as $pesanan)
          <tr>
            <td>{{ $pesanan->id }}</td>
            <td>{{ $pesanan->tanggal_pesanan }}</td>
            <td>Rp.{{ $pesanan->jumlah * $pesanan->harga }}</td>
            <td style="text-align:center;">{{ $pesanan->status }}</td>
            <td><button class="btn bg-primary">...</button></td>
          </tr>
        @endforeach
      </tbody>
    </table>
</center>
  @endif


<span>Total pesanan : </span>
  @if($riwayatPesanan->isEmpty())
    <p>Tidak ada riwayat pesanan.</p>
  @else
  <center>
    <table class="table riwayat-table">
      <thead >
        <tr style="  background: orange;">
          <th>No Pesanan</th>
          <th>Tanggal Pesanan</th>
          <th>Total Harga</th>
          <th style="text-align:center;">Status Pesanan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pesanans as $pesanan)
          <tr>
            <td>{{ $pesanan->id }}</td>
            <td>{{ $pesanan->tanggal_pesanan }}</td>
            <td>Rp.{{ $pesanan->jumlah * $pesanan->harga }}</td>
            <td style="text-align:center;">{{ $pesanan->status }}</td>
            <td><button class="btn bg-primary">...</button></td>
          </tr>
        @endforeach
      </tbody>
    </table>
</center>
  @endif

  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
