<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smartandro</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
  <header>
    <nav>
      <div class="container">
        <a href="#" class="logo">Smartandro</a>
        <div class="search-bar">
          <input type="text" id="searchInput" placeholder="Search" onkeydown="handleKeyDown(event)">
          <button type="submit" class="search-btn" onclick="search()">Cari</button>
        </div>
        <ul class="menu">
          <li><a href="{{ route('akun') }}">Profile</a></li>
          <li><a href="{{ route('riwayat.pesanan') }}">Riwayat pesanan</a></li>
          <li><a href="{{ route('login') }}" class="login-btn">Login/Register</a></li>
        </ul>
        <div class="cart">
          <a href="{{ route('cart.index') }}" class="cart-icon">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count">
              @if(isset($cartCount))
              {{$cartCount}}
              @endif
            </span>
          </a>
        </div>        
      </div>
    </nav>
  </header>
  
  <section class="hero">
    <div class="container">
      <h1>Selamat Datang di Smartandro</h1>
      <p>Jelajahi dan beli smartphone yang Anda inginkan</p>
    </div>
    <div class="imgcontainer">
      <img src="{{ asset('images/smartandro.jpeg') }}" alt="Avatar" class="avatar">
    </div>
  </section>

  <section class="products">
    <div class="container">
      <h2>Smartphone Tersedia</h2>
      @foreach($products as $product)
      <div class="product">
        <img src="{{ asset('images/product/')}}<?="/".$product['id']?>.png" alt="Google Pixel 5">
        <h3>{{$product['nama']}}</h3>
        <p>{{$product['deskripsi']}}</p>
        <span class="price">Rp.{{$product['harga']}}</span>
        <a nama_produk= "{{$product['nama']}}" onclick="setHarga({{$product['harga']}},'<?=$product['nama']?>')" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#" class="btn" data-product-id="3">Tambahkan ke keranjang</a>
      </div>
      @endforeach
    </div>
  </section>

  <footer>
    <div class="container">
      <p>&copy; 2023 Smartandro. All rights reserved.</p>
    </div>
  </footer>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambahkan ke keranjang</h1>
        <button id="close_form" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('transaksi.addcart')}}" method="post">
        @csrf
        <div style="float:left;">
          <input name="product_id" value="24" hidden></input>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" value=0>Jumlah</label>
            <input name="quantity" id="jumlah_barang" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <button type="button" product_id= "{{$product['id']}}" id="beli_barang" class="btn btn-primary">Submit</button>
        </div>
        <div style="float:left; margin-left:20px; vertical-align:middle;">
          <span ><b>Detail pesanan : </b></span><br>
          <span >Barang : </span>
          <span id="nama_barang"></span><br>
          <span >Harga : Rp.</span>
          <span id="total_harga">0</span><br>
          <span >Jumlah Beli : </span>
          <span id="beli_field">0</span>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

  <script>
    // Mendapatkan semua tombol "Tambahkan ke keranjang" ...
    const addToCartButtons = document.querySelectorAll('.btn[data-product-id]');
    let harga = 0;
    let total_harga = document.getElementById("total_harga");
    let beli_field = document.getElementById("beli_field");
    let jumlah_barang = document.getElementById("jumlah_barang");
    let nama_barang = document.getElementById("nama_barang");
    let btn_pesan = document.getElementById("beli_barang");

    let setHarga = (hrg,nama)=>{
      harga = hrg;
      console.log(nama);
      nama_barang.textContent = nama;
      total_harga.textContent = jumlah_barang.value * harga;
      beli_field.textContent = jumlah_barang.value;
    };

    jumlah_barang.addEventListener('change',()=>{
      if(jumlah_barang.value < 0) jumlah_barang.value = 0;
      total_harga.textContent = jumlah_barang.value * harga;
      beli_field.textContent = jumlah_barang.value;
    });

    btn_pesan.addEventListener('click',(e)=>{
      if(jumlah_barang.value <= 0){
          alert("Silahkan masukan jumlah yang ingin dibeli !");
          return;
      }
      console.log("beli");
      var productID = btn_pesan.getAttribute("product_id");
      $.ajaxSetup({
                headers : {
                    'X-CSRF-TOKEN' : $('input[name="_token"]').attr('value')
                }
            });
            $.ajax({
                url:"{{route('transaksi.addcart')}}",
                method :'POST',
                data : {
                    product_id : productID,
                    quantity : jumlah_barang.value
                }
                
            }).done(function( result ) {
               if(result.message == "success"){
                  alert("Berhasil ditambahkan ke keranjang");
                  // Mengupdate jumlah item di ikon keranjang
                  const cartCount = document.querySelector('.cart-count');
                  cartCount.textContent = parseInt(cartCount.textContent) + 1;
               }else{
                  alert("Error : Tidak dapat menambahkan pesanan ! ");
               }
               $("#close_form").click();
            });
    });

    addToCartButtons.forEach(button => {
      button.addEventListener('click', addToCart);
    });

    function addToCart(event) {
      event.preventDefault();
      
      const productId = this.dataset.productId;


    }

    function handleKeyDown(event) {
      if (event.key === "Enter") {
        event.preventDefault();
        search();
      }
    }

    function search() {
      // Mendapatkan nilai input pencarian
      var searchValue = document.getElementById('searchInput').value.toLowerCase();

      // Mendapatkan semua elemen produk
      var products = document.getElementsByClassName('product');

      // Melakukan iterasi pada setiap elemen produk
      for (var i = 0; i < products.length; i++) {
        var product = products[i];
        var productName = product.getElementsByTagName('h3')[0].innerText.toLowerCase();

        // Memeriksa apakah nama produk mengandung nilai pencarian
        if (productName.includes(searchValue)) {
          // Jika ada, tampilkan produk
          product.style.display = 'block';
        } else {
          // Jika tidak ada, sembunyikan produk
          product.style.display = 'none';
        }
      }
    }
  </script>
  

<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>

<script>

</script>
