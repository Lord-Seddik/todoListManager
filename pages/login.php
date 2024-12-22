<?php
include '../db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    
    $stmt = $conn->prepare("SELECT password FROM user WHERE name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        
        if (password_verify($password, $hashed_password)) {        //it auto hash the pass
            // Password is correct, login successful
            echo "Login successful!";
        } else {
            
            echo "Invalid credentials!";
        }
    } else {
        
        echo "User not found!";
    }

    
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/todoListManager/styles/login.css?id=<?php echo time(); ?>">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit" class="btn">Login</button>

            <p class="register-link">Don't have an account? <a href="register.php">Register now</a></p>
        </form>
    </div>
</body>
</html>
