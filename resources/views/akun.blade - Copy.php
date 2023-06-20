<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/akun.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  </head>
  
  <body>
    <div>
      <h1 class="header">Selamat datang, {{ $user->name }}!</h1>
      <form class="logout" action="{{ route('logout') }}" method="get">
            @csrf
            <button class="btn btn-secondary" style="background-color:rgb(196, 79, 79);" type="submit" >Logout</button>
      </form>
    </div>

    <div class="container">
      <!-- Tampilkan data pengguna lainnya sesuai kebutuhan -->
  
      <h2>Informasi Profil</h2><br>
      <form action="{{route('akun.edit')}}" method="post">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nama</label>
          <input name = "name" type="text" class="form-control" id="exampleInputEmail1" value="{{ $user->name }}" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input name= "email" type="email" class="form-control" id="exampleInputEmail1" value="{{ $user->email }}" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
      </div>
  </body>
  