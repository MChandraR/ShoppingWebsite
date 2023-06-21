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
      <center>
      <img src="{{asset('images/users/')}}/<?=$user->id?>.png" width="20%" >
</center><br><br>
      <h2>Informasi Profil</h2><br>
      <form action="{{route('akun.edit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nama</label>
          <input name = "name" type="text" class="form-control" id="exampleInputEmail1" value="{{ $user->name }}" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Alamat Email</label>
          <input name= "email" type="email" class="form-control" id="exampleInputEmail1" value="{{ $user->email }}" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Alamat</label>
          <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" value="{{ $user->alamat }}" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Foto Profile</label>
          <input id="update-file" type="file" name="profile_image" class="form-control">
      </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
      </div>
  </body>
  