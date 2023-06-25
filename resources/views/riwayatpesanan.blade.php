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
  
  <div style="margin: 3%;">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" id="tab-pesanan" data-bs-toggle="tab" href="#detail-pesanan">On Proses ({{count($pesanans)}})</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tab-produk" data-bs-toggle="tab" href="#spesifikasi">Riwayat Transaksi ({{count($riwayatPesanan)}})</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="detail-pesanan">
                  @if($pesanans->isEmpty())
                    <br><p>Tidak ada riwayat pesanan.</p>
                  @else
                  <center>
                    <table class="table riwayat-table">
                      <thead >
                        <tr style="  background: orange;">
                          <th>No Pesanan</th>
                          <th>Produk</th>
                          <th style="text-align:center;">Jumlah</th>
                          <th>Total Harga</th>
                          <th style="text-align:center;">Status Pesanan</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($pesanans as $pesanan)
                          <tr>
                            <td>{{ $pesanan->id }}</td>
                            <td>{{ $pesanan->nama }}</td>
                            <td style="text-align:center;" >{{ $pesanan->jumlah }}</td>
                            <td>Rp.{{ $pesanan->jumlah * $pesanan->harga }}</td>
                            <td style="text-align:center;">{{ $pesanan->status }}</td>
                            <td>
                              <form action="{{route('pesanan.cancel')}}" method="post">
                                @csrf
                                <input name="pesananID" value= "{{$pesanan->id}}" hidden></input>
                                <button type="submit"class="btn bg-danger">X Cancel</button></td>
                              </form>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </center>
                @endif
              </div>
              <div class="tab-pane fade" id="spesifikasi">
              @if($riwayatPesanan->isEmpty())
                <br><p>Tidak ada riwayat pesanan.</p>
              @else
                <center>
                  <table class="table riwayat-table">
                    <thead >
                      <tr style="  background: orange;">
                        <th>No Pesanan</th>
                        <th>Tanggal Pesanan</th>
                        <th>Produk</th>
                        <th style="text-align:center;">Jumlah</th>
                        <th>Total Harga</th>
                        <th style="text-align:center;">Status Pesanan</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($riwayatPesanan as $pesanan)
                        <tr>
                          <td>{{ $pesanan->id }}</td>
                          <td>{{ $pesanan->tanggal_pesanan }}</td>
                          <td>{{ $pesanan->nama }}</td>
                          <td style="text-align:center;">{{ $pesanan->jumlah }}</td>
                          <td>Rp.{{ $pesanan->jumlah * $pesanan->harga }}</td>
                          <td style="text-align:center;">{{ $pesanan->status }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
              </center>
              @endif
              </div>
            </div>
          </div>

  

  <script src="{{ asset('js/script.js') }}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>
