<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smartandro</title>
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
            <span class="cart-count">0</span>
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
        <a href="#" class="btn" data-product-id="3">Tambahkan ke keranjang</a>
      </div>
      @endforeach
    </div>
  </section>

  <footer>
    <div class="container">
      <p>&copy; 2023 Smartandro. All rights reserved.</p>
    </div>
  </footer>

  <script>
    // Mendapatkan semua tombol "Tambahkan ke keranjang" ...
    const addToCartButtons = document.querySelectorAll('.btn[data-product-id]');

    addToCartButtons.forEach(button => {
      button.addEventListener('click', addToCart);
    });

    function addToCart(event) {
      event.preventDefault();
      
      const productId = this.dataset.productId;

      // Simulasi penambahan produk ke keranjang
      console.log('Menambahkan produk dengan ID:', productId);

      // Mengupdate jumlah item di ikon keranjang
      const cartCount = document.querySelector('.cart-count');
      cartCount.textContent = parseInt(cartCount.textContent) + 1;
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
  
</body>

</html>
