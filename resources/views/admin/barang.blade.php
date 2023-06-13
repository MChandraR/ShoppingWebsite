<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/barang.css') }}">
    <title>Document</title>
</head>
<body>

<div class="main" >
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
       <tr  class="tb-row" style=" vertical-align: middle;" >
            <td>{{$datas['id']}}</td>
            <td>{{$datas['nama']}}</td>
            <td>{{$datas['deskripsi']}}</td>
            <td>{{$datas['harga']}}</td>
            <td style="width:15rem;">
                <form action="{{route('admin.deleteproduct')}}" method="post">
                    @csrf
                    <input type="text" name="id" value="{{$datas['id']}}" hidden></input>
                    <a onclick="deleteProduct({{$datas['id']}})" class="btn bg-danger">Delete</a>
                    <a onclick="setIdProduct({{$datas['id']}})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Update</a>
                </form>
                
            </td>
       </tr>
       @endforeach
       @endif
    </tbody>
    </table>
</div>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" style="width:100%;" id="staticBackdrop"  data-bs-backdrop="static" data-bs-keyboard="true" aria-labelledby="staticBackdropLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style=" background-color: blue; color:white; font-weight:bold;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><b>Tambahkan Barang</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action="{{route('admin.addproduct')}}" id="addBarang-Form" method="post" enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                <input type="text" name="nama" id="nama_inp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Deskripsi Produk</label>
                <input type="text" name="deskripsi" id="desc_inp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Harga Produk</label>
                <input type="number" name="harga" id="harga_inp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Foto Produk</label>
                <input type="file" name="product_image" id="img_inp" class="form-control" required>
            </div>

            <div class="modal-footer">
                <button type="button" id="close-add-btn"class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="submit-button" class="btn btn-primary">Submit</button>     
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- Modal Update -->
<div class="modal fade"  style="width:100%;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style=" background-color: blue; color:white; font-weight:bold;">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><b>Update Barang</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('admin.updateproduct')}}" id="updateBarang-Form" method="post" enctype="multipart/form-data">
        @csrf
            <center>
            <img id="update-img" style="margin:2rem;" src="{{asset('images/product/22.png')}}" width=250rem">
            </center>
            <input name="id" id="update-id" hidden></input>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                <input id="update-nama" type="text" name="nama" id="nama_inp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Deskripsi Produk</label>
                <input id="update-desc" type="text" name="deskripsi" id="desc_inp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Harga Produk</label>
                <input id="update-harga" type="number" name="harga" id="harga_inp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Foto Produk</label>
                <input id="update-file" type="file" name="product_image" id="img_inp" class="form-control" >
            </div>

            <div class="modal-footer">
                <button type="button" id="close-add-btn-u"class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="submit-button" class="btn btn-primary">Submit</button>     
            </div>
        </form>
    </div>
  </div>
</div>


<script src="{{asset('js/admin/barang.js')}}"></script>
</body>
</html>
<script>
var id_product = "";
var route = "{{route('admin.deleteproduct')}}";
var add_route = "{{route('admin.addproduct')}}";
var update_route = "{{route('admin.updateproduct')}}";
var detail_route = "{{route('admin.getproductdata')}}";
var add_btn = document.getElementById("submit-button");
var add_modal = document.getElementById("staticBackdrop");
var image_area = document.getElementById("update-img");

//form update ui
var update_id = document.getElementById("update-id");
var update_name = document.getElementById("update-nama");
var update_desc = document.getElementById("update-desc");
var update_harga = document.getElementById("update-harga");

var setIdProduct = (id)=>{
    image_area.src = "{{asset('images/product')}}"+"/" + id + ".png?t=" + new Date().getTime();
    id_product = id;
    update_id.value = id;
    console.log("Current id : " + id);
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('input[name="_token"]').attr('value')
        }
    });
    $.ajax({
        url:detail_route,
        method :'POST',
        data : {
            id : id
        }
        
    }).done(function( result ) {
        if(detail_route != null || detail_route != ""){
            update_name.value = result.data[0].nama;
            update_desc.value = result.data[0].deskripsi;
            update_harga.value = result.data[0].harga;
        }
    });
};

var deleteProduct = (ids)=>{
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('input[name="_token"]').attr('value')
        }
    });
    console.log(route);
    $.ajax({
        url:route,
        method :'POST',
        data : {
            id : ids
        }
        
    }).done(function( result ) {
        alert( "Data berhasil dihapus : " + result.message );
        if(barang_route != null || barang_route != ""){
            loadForm(barang_route);
        }
    });
};

$('#addBarang-Form').submit( function(e) {
    e.preventDefault();
    var data = new FormData(this);
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('input[name="_token"]').attr('value')
        }
    });
    console.log(route);
    $.ajax({
        url: add_route,
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST'
        
    }).done(function( result ) {
        $("#close-add-btn").click();
        alert( "Data berhasil di tambahkan : " + result.message );
        if(barang_route != null || barang_route != ""){
            loadForm(barang_route);
        }
    });

    add_modal.classlist.toggle("show");
});

$('#updateBarang-Form').submit( function(e) {
    e.preventDefault();
    var data = new FormData(this);
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('input[name="_token"]').attr('value')
        }
    });
    console.log(update_route);
    $.ajax({
        url: update_route,
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST'
        
    }).done(function( result ) {
        $("#close-add-btn-u").click();
        alert( "Data berhasil di Update : " + result.message );
        console.log(result);
        if(barang_route != null || barang_route != ""){
            loadForm(barang_route);
        }
    });
});


</script>