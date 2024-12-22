
<?php
include 'db.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/todoListManager/styles/global.css?id=<?php echo time(); ?>">
    <link rel="stylesheet" href="/todoListManager/styles/home.css?id=<?php echo time(); ?>">

    <title>Form Page</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="/todoListManager/images/game-controller.png" alt="Logo">
            <p class="description">Gaming Task Manager</p>
        </div>  
        <div class="header-buttons">
            <button class="btn" onclick="location.href='/todoListManager/pages/login.php';">Login</button>
            <button class="btn" onclick="location.href='/todoListManager/pages/register.php';">Register</button>
            <button class="btn" onclick="location.href='/todoListManager/pages/index.php';">Home</button>
        </div>
    </header>

    <main>
        <h1 class="welcome">
            welcome to this website .. <br>
            want to know what we do here?
        </h1>

        <div class="cards-container">
            <div class="card">
                <h2>Features</h2>
                <p>non until now.</p>
            </div>
            <div class="card">
                <h2>try it</h2>
                <p>a simple to do list website to save what you want to do!!</p>
            </div>
        </div>
        <br>you must register to save your list <button class="btn" onclick="location.href='/todoListManager/pages/register.php';" >Register now</button>
        <br>already logged in? <a href="/todoListManager/pages/login.php">login</a>
    </main>
    <footer>
        <div class="footer-content">
            <p>&copy; 2024 Gaming Task Manager. All Rights Reserved.</p>
            <nav class="footer-nav">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Contact Us</a>
            </nav>
        </div>
    </footer>
</body>
</html>
