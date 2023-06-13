<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">

    <title>Document</title>
</head>
<body id="body-pd">
    <div>
    <header class="header" id="header" style=" vertical-align: middle;">
        <div class="header_toggle">
            <img id="header-toggle" src="{{asset('images/list-black.png')}}" width="20px" height="20px"> 
        </div>
        <marquee direction="right" style="margin-left:1rem; font-size:20px;"><b>Selamat Datang di Menu Admin</b></marquee>
        <div class="header_img"> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo "><img class="main-logo"  id="main-logo" src="{{asset('images/icon/admin_menu_icon.png')}}"></li> <span class="nav_logo-name">Menu Admin</span> </a>
                <div class="nav_list"> 
                    <a href="#" class="nav_link active" id="dashboard-btn"> 
                        <img src="{{asset('images/icon/dashboard.png')}}" width="20px" height="20px">
                        <span class="nav_name">Dashboard</span> </a>
                    <a href="#" class="nav_link" id="barang-btn"> 
                        <img src="{{asset('images/icon/product_icon_black.png')}}" width="20px" height="20px">
                        <span class="nav_name">Barang</span> </a> 
                    <a href="#" class="nav_link"  id="pembelian-btn"> 
                        <img src="{{asset('images/icon/troller_icon_black.png')}}" width="20px" height="20px">
                        <span class="nav_name">Pembelian</span> </a> 
                    <a href="#" class="nav_link"> 
                        <img src="{{asset('images/icon/send_icon_black.png')}}" width="20px" height="20px">
                        <span class="nav_name">Kirim Pesanan</span> </a> 
                    <a href="#" class="nav_link"> 
                        <img src="{{asset('images/icon/history_icon_black.png')}}" width="20px" height="20px">
                        <span class="nav_name">Riwayat Pesanan</span> </a> 
                </div>
            </div> <a href="{{route('logout')}}" class="nav_link"> 
            <img src="{{asset('images/exit.png')}}" width="20px" height="20px">
            <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bodyId margin-left-20" id="frameArea" >
        <div class="frame" id="frame_area"></div>
        
    </div>
    </div>


    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/admin/dashboard.js')}}"></script>
</body>
</html>
<script>
    console.log("Hallo" +  "{{route('admin.db')}}");
    let canvas = document.getElementById("frame_area");
    let barang_route = "{{route('admin.products')}}";
    let pembelian_route = "{{route('admin.transaksi')}}";

    let loadForm = (url)=>{
        fetch( url)
        .then((response) => response.text())
        .then((html) => {
            // canvas.innerHTML = html;
            $(canvas).html('');
            $(canvas).html(html);
        })
        .catch((error) => {
            console.warn(error);
        });
    };

    loadForm("{{route('admin.mainView')}}");

    let btn_barang = document.getElementById("barang-btn");
    let btn_dashboard = document.getElementById("dashboard-btn");
    let btn_pembelian = document.getElementById("pembelian-btn");

    btn_barang.addEventListener('click',()=>{
        loadForm(barang_route);
    });

    btn_dashboard.addEventListener('click',()=>{
        loadForm("{{route('admin.mainView')}}");
    });

    btn_pembelian.addEventListener('click',()=>{
        loadForm(pembelian_route);
    });


</script>