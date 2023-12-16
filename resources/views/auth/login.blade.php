<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in comicly</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Add this line for Font Awesome -->
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <div class="container"> 
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2 style="letter-spacing: 0.5px;">Sign In</h2>
            <div style="width: 60px;height:6px; position: relative; top:5px; border-radius:8px; background-color:#27ae60; "></div>
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-with-icon">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-with-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
            </div>
            

            <div class="form-group">
                <button type="submit" style="position: relative; top:-55px;" class="sign">Submit</button>
            </div>
        </form>

        <div class="register-link">
            <p>Belum punya akun ? Silahkan <a href="{{ route("register") }}" style="text-decoration: underline; color:#27ae60;"> buat akun</a></p>
        </div>
    </div>

</body>
</html>
