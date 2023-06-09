<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login & Register</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <h2>Login & Register</h2>
        <div id="login-form">
            <h3>Login</h3>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="imgcontainer">
                    <img src="{{ asset('images/smartandro.jpeg') }}" alt="Avatar" class="avatar">
                </div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Login</button>
            </form>
            <div class="toggle-form">
                Don't have an account? <a href="#" onclick="toggleForm('register-form')">Register</a>
            </div>
        </div>
        <div id="admin-login-form" style="display:none;">
            <h3>Admin Login</h3>
            <form action="{{ route('admin.login') }}" method="post">
                @csrf
                <div class="imgcontainer">
                    <img src="{{ asset('images/smartandro.jpeg') }}" alt="Avatar" class="avatar">
                </div>
                <label for="admin-email">Email</label>
                <input type="email" id="admin-email" name="email" required>
                <label for="admin-password">Password</label>
                <input type="password" id="admin-password" name="password" required>
                <button type="submit">Admin Login</button>
            </form>
            <div class="toggle-form">
                Go back to <a href="#" onclick="toggleForm('login-form')">User Login</a>
            </div>
        </div>
        <div id="register-form" style="display: none;">
            <h3>Register</h3>
            <form action="{{ route('register.submit') }}" method="post">
                @csrf
                <div class="imgcontainer">
                    <img src="{{ asset('images/smartandro.jpeg') }}" alt="Avatar" class="avatar">
                </div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                <button type="submit">Register</button>
            </form>
            <div class="toggle-form">
                Already have an account? <a href="#" onclick="toggleForm('login-form')">Login</a>
            </div>
        </div>
    </div>

    <script>
        function toggleForm(formId) {
            var loginForm = document.getElementById('login-form');
            var adminLoginForm = document.getElementById('admin-login-form');
            var registerForm = document.getElementById('register-form');

            if (formId === 'login-form') {
                loginForm.style.display = 'block';
                adminLoginForm.style.display = 'none';
                registerForm.style.display = 'none';
            } else if (formId === 'admin-login-form') {
                loginForm.style.display = 'none';
                adminLoginForm.style.display = 'block';
                registerForm.style.display = 'none';
            } else {
                loginForm.style.display = 'none';
                adminLoginForm.style.display = 'none';
                registerForm.style.display = 'block';
            }
        }
    </script>
</body>
</html>
