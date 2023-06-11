<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    <title>Document</title>
</head>
<body>
<h2> Dashboard </h2>
<div class="dashboard-card bg-primary" style="width: 22rem; height:10rem;">
  <img src="{{asset('images/icon/product_icon.png')}}" style="float:left;margin-right:2rem;" width="120rem">
  <div class="card-body"  style="float:left;" >
    <h5 class="card-title">Data Barang</h5>
    <p class="card-text">Total Barang : <?=$resData['jumlahBarang']?></p>
    <p class="card-text">Total Transaksi : </p>
    <!-- <a href="#" class="btn btn-primary">Menu Barang</a> -->
  </div>
</div>
<div class="dashboard-card bg-danger" style="width: 22rem; height:10rem;">
  <img src="{{asset('images/icon/troller_icon.png')}}" style="float:left;margin-right:2rem;" width="120rem">
  <div class="card-body" style="float:left;" >
    <h5 class="card-title">Data Pembelian</h5>
    <p class="card-text">Jumlah pembelian : <?=$resData['jumlahPesanan']?></p>
    <p class="card-text">Jumlah pembelian : <?=$resData['jumlahPesanan']?></p>
  </div>
</div>
<div class="dashboard-card bg-warning" style="width: 22rem; height:10rem;">
  <img src="{{asset('images/icon/avatar_icon.png')}}" style="float:left;margin-right:2rem;" width="120rem">
  <div class="card-body" style="float:left;" >
    <h5 class="card-title">Data Akun</h5>
    <p class="card-text">Jumlah User  : <?=$resData['jumlahUser']?> </p>
    <p class="card-text">Jumlah Admin : <?=$resData['jumlahAdmin']?></p>
  </div>
</div>
</body>
</html>