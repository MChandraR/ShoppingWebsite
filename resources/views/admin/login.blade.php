<!DOCTYPE html>
<html>
<title>Page Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
<script src="{{ asset('js/bootstrap.js') }}"></script>

<style>
  body{
    background-image : url({{asset('images/login_admin_bg.jpg')}});
  }
</style>

<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a href="#" class="nav-link button">Link 1</a>
  <a href="#" class="nav-link button">Link 2</a>
  <a href="#" class="nav-link button">Link 3</a>
      </div>
    </div>
  </div>
</nav>
<div class="main-layout">
<center>
<div class="form-area container teal  ">
  <h1>Login Form</h1>
  <form action="{{route('login.submit')}}" method="post">
  @csrf
  <div class="col-auto">
    <label>Username</label>
    <input type="text" id="inputPassword6" name="email" class="form-control input-field" ><br>
    <label>Password</label>
    <input type="password" id="inputPassword6" name="password" class="form-control input-field"><br>
    <span>Belum punya akun ?</span><a href="#"> Register</a><br>
    <button type="submit" class="login-btn btn btn-primary btn-lg">Login</button>
  </div>
  </form>
</div>
</center>
</div>


</div>
      
</body>
</html>
