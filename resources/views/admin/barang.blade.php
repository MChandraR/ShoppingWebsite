<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/barang.css') }}">
    <title>Document</title>
</head>
<body >
<div class="main">
    <h2>Admin Barang </h2> <br><br>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+ Add barang</button>
    <br><br>
    <table class="table table-striped" style="width:95%;">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Harga</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
       @if(isset($productData))
       @foreach($productData as $datas)
       <tr>
            <td>{{$datas['id']}}</td>
            <td>{{$datas['nama']}}</td>
            <td>{{$datas['deskripsi']}}</td>
            <td>{{$datas['harga']}}</td>
            <td><button class="btn bg-primary">Update</button></td>
       </tr>
       @endforeach
       @endif
    </tbody>
    </table>
</div>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal" style="width:100%;" id="staticBackdrop"  data-bs-backdrop="static" data-bs-keyboard="true" aria-labelledby="staticBackdropLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambahkan Barang</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action="{{route('admin.addproduct')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Deskripsi Produk</label>
                <input type="text" name="deskripsi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Harga Produk</label>
                <input type="number" name="harga" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Foto Produk</label>
                <input type="file" name="product_image" class="form-control" required>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>     
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
<script src="{{asset('js/admin/barang.js')}}"></script>
</body>
</html>