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
<div class="main-layout">
<center>
<div class="form-area container teal login-card" >
  <h1 style="color:white;">Login Form</h1><br>
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
