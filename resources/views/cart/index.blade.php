<!DOCTYPE html>
<html>
<head>
    <title>Keranjang</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
</head>
<body>
    <h1 class="header">Keranjang</h1>
    <div class="container">
        <?php $total_harga = 0; $total_barang = 0;?>
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
                <?php $total_harga += ($cart->harga*$cart->quantity); $total_barang+=1;?>
                <tr style="vertical-align:middle;">
                    <td>{{ $cart->nama }}</td>
                    <td >{{ $cart->quantity }}</td>
                    <td>{{ $cart->harga * $cart->quantity }}</td>
                    <td style="width:2rem;">
                        <form action="{{ route('cart.delete', $cart->id) }}" method="POST">
                            @csrf
                            @method('post')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p>Total: Rp.{{ $total_harga}}</p>

        <a  data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary">Checkout</a>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Pesanan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <b>Detail pesanan</b>
            <table border="0">
                <tr>
                <td>Total barang </td><td> : {{$total_barang}} </td><br>
                </tr>
                <tr>
                <td>Total harga  </td><td> : {{$total_harga}} </td>
                </tr>
            </table>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button onclick="orderPesanan()"type="button" class="btn btn-primary">Konfirmasi</button>
        </div>
        </div>
    </div>
    </div>


    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

<script>

let orderPesanan = ()=>{
    $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('input[name="_token"]').attr('value')
        }
    });
    $.ajax({
        url:"{{route('cart.getcart')}}",
        method :'POST',
        data : []
        
    }).done(function( result ) {
        if(result.message == "success"){
            console.log(result.data);
            document.location = "{{route('cart.index')}}" ;
        }else{
            alert("Error : Tidak dapat memuat data cart ! ");
        }
        $("#close_form").click();
    });
}

   
</script>

</html>
