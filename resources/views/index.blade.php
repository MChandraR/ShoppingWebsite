<!DOCTYPE html>
<html>
<head>
    <title>Keranjang</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="container">
        <h1>Keranjang</h1>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if($carts->isEmpty())
        <p>Keranjang anda kosong</p>
        @else
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($carts as $cart)
                <tr>
                    <td>{{ $cart->product->name }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td>{{ $cart->product->price }}</td>
                    <td>
                        <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p>Total: ${{ $carts->sum(function($cart) {
            return $cart->product->price * $cart->quantity;
        }) }}</p>

        <a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a>
        @endif
    </div>

    <section class="product">
        <div class="container">
            <h2>Produk Tersedia</h2>
            @foreach($products as $product)
            <div class="product">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <span class="price">Rp.{{ $product->price }}</span>
                <a href="#" class="btn" data-product-id="{{ $product->id }}">Tambahkan ke keranjang</a>
            </div>
            @endforeach
        </div>
    </section>
</body>
</html>
