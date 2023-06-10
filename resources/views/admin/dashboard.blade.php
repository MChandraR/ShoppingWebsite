<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/admin/dashboard.js')}}"></script>
    <title>Document</title>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"><img id="header-toggle" src="{{asset('images/list-black.png')}}" width="20px" height="20px"> </div>
        <div class="header_img"> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"><img src="{{asset('images/dashboard.png')}}" width="20px" height="20px"></li> <span class="nav_logo-name">Dashboard</span> </a>
                <div class="nav_list"> 
                    <a href="#" class="nav_link active"> 
                        <img src="{{asset('images/dashboard.png')}}" width="20px" height="20px">
                        <span class="nav_name">Dashboard</span> </a>
                    <a href="#" class="nav_link"> 
                        <img src="{{asset('images/profile.png')}}" width="20px" height="20px">
                        <span class="nav_name">Users</span> </a> 
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-message-square-detail nav_icon'></i> 
                        <span class="nav_name">Messages</span> </a> 
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-bookmark nav_icon'></i> 
                        <span class="nav_name">Bookmark</span> </a> 
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-folder nav_icon'></i> 
                        <span class="nav_name">Files</span> </a> 
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                        <span class="nav_name">Stats</span> </a> 
                </div>
            </div> <a href="#" class="nav_link"> 
            <img src="{{asset('images/exit.png')}}" width="20px" height="20px">
            <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bodyId margin-left-20" id="frameArea" >
        <div class="frame" id="frame_area"></div>
    </div>
</body>
</html>
<script>
    console.log("Hallo" +  "{{route('admin.db')}}");
    let canvas = document.getElementById("frame_area");
    fetch( "{{route('admin.mainView')}}")
    .then((response) => response.text())
    .then((html) => {
        canvas.innerHTML = html;
    })
    .catch((error) => {
        console.warn(error);
    });

</script>