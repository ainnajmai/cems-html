<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css?v=<?= time(); ?>">
    //?v=<?= time(); ?> is used to force browser to load the latest CSS
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Campus Event Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <!-- Hero Header -->
    <header class="hero">
        <div class="overlay"></div>
        <div class="hero-content">
            <img src="img/logo.jpg" class="logo" alt="CEMS Logo">
            <h1>Campus Event Management System</h1>
            <p>Organize, manage, and participate in campus events seamlessly</p>
        </div>
    </header>

    <!-- Navbar -->
    <?php 
    include("include/topNav.php");?>

    <!-- Main Content -->
    <main>
        <section>
            <h3>Login to Your Account</h3>
          <form class="login-form" action="#" method="POST">
            
            <div>
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" required 
                       placeholder="you@example.edu">
            </div>
            <br>
            <div>
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" 
                       required minlength="6"
                       placeholder="Enter your password">
            </div>
            <br>
            <button type="submit" class="login-btn">Login</button>

        </form>
        <br>
        <div class="login-links">
            <a href="register.php">Don't have an account? Register here</a><br>
            <a href="forgot_password.php">Forgot your password?</a>
        </div>
            
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>© 2025 Campus Event Management System | All Rights Reserved</p>
    </footer>

    <script>
        //js code
    </script>

</body>
</html>
