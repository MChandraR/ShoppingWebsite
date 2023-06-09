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
<div class="dashboard-card bg-primary">
  <img src="{{asset('images/icon/product_icon.png')}}" style="float:left;margin-right:2rem;" width="120rem">
  <div class="card-body"  style="float:left;" >
    <h5 class="card-title"><b>Data Barang</b></h5><br>
    <span class="card-text">Total Barang : <?=$resData['jumlahBarang']?></span>
    <p class="card-text">Barang Dipesan : <?=$resData['totalDipesan']?> </p>
    <!-- <a href="#" class="btn btn-primary">Menu Barang</a> -->
  </div>
</div>
<div class="dashboard-card bg-danger">
  <img src="{{asset('images/icon/troller_icon.png')}}" style="float:left;margin-right:2rem;" width="120rem">
  <div class="card-body" style="float:left;" >
  <h5 class="card-title"><b>Data Pembelian</b></h5><br>
    <span class="card-text">Pesanan Diterima : <?=$resData['totalAcc']?></span>
    <p class="card-text">Pesanan Pending : <?=$resData['totalPending']?></p>
  </div>
</div>
<div class="dashboard-card bg-warning">
  <img src="{{asset('images/icon/avatar_icon.png')}}" style="float:left;margin-right:2rem;" width="120rem">
  <div class="card-body" style="float:left;" >
    <h5 class="card-title"><b>Data Akun</b></h5><br>
    <span class="card-text">Jumlah User  : <?=$resData['jumlahUser']?></span>
    <p class="card-text">Jumlah Admin : <?=$resData['jumlahAdmin']?></p>
  </div>
</div>
<div class="dashboard-card bg-success">
  <img src="{{asset('images/icon/send_icon.png')}}" style="float:left;margin-right:2rem;" width="120rem">
  <div class="card-body" style="float:left;" >
    <h5 class="card-title"><b>Data Pengiriman</b></h5><br>
    <span class="card-text">Menunggu Dikirim  : <?=$resData['totalMenunggu']?></span><br>
    <span class="card-text">Pesanan Dikirim  : <?=$resData['totalDikirim']?></span>
    <p class="card-text">Pesanan Sampai  : <?=$resData['totalTerkirim']?></p>
  </div>
</div>
</body>
</html>