<!DOCTYPE html>
<html>
    <head>
        <title>Keranjang</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
    
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/cart">Cart</a></li>
            </ul>
        </nav>
    </header>

    <div class="content">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
