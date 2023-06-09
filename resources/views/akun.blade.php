<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/akun.css') }}">
  </head>
  
  <body>
    <div class="container">
      <h1>Selamat datang, {{ $user->name }}!</h1>
      <p>Email: {{ $user->email }}</p>
      <!-- Tampilkan data pengguna lainnya sesuai kebutuhan -->
  
      <div class="profile-section">
        <h2>Informasi Profil</h2>
        <p>Nama: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <!-- Tampilkan informasi profil pengguna lainnya -->
  
        <a href="{{ route('akun.edit') }}" class="btn-edit">Edit Profil</a>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" >Logout</button>
        </form>
        
      </div>
    </div>
  </body>
  