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
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#" class="btn" data-product-id="{{ $product->id }}">Tambahkan ke keranjang</a>
            </div>
            @endforeach
        </div>
    </section>


     <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" >
    Launch static backdrop modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
        </div>
        </div>
    </div>
    </div>

</body>
</html>
