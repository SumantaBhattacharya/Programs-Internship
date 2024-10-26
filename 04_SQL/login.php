<?php
session_start(); // Call session_start() only once at the top
require("EG_PHP43_MAKAUT.php"); // Ensure this only contains the connection logic

// Check if the login form was submitted
if (isset($_POST['ok'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform the query to check for the username
    $query = "SELECT * FROM Students WHERE Email = '$username'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        echo "Error executing query: " . mysqli_error($connection);
    } elseif (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Using password_verify to check the hashed password
        if (password_verify($password, $row['Password'])) { // Correct
            // $_SESSION['username'] = $username;
            $_SESSION['u_info'] = $row;
            header("Location: index.php");
            exit();
        } else {
            echo '<div class="alert alert-danger mt-3 text-center" role="alert">Invalid password. Please try again.</div>';
        }
    } else {
        echo '<div class="alert alert-danger mt-3 text-center" role="alert">Invalid username or password. Please try again.</div>';
    }
    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Login Page"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login</title>
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            font-family: 'Lora', serif;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .login-form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 90%; /* Responsive width */
            max-width: 400px; /* Maximum width */
        }
        .login-form h2 {
            margin-bottom: 20px;
            font-weight: normal; /* Keep the heading style consistent */
        }
        @media (max-width: 576px) {
            .login-form {
                padding: 20px; /* Reduce padding on smaller screens */
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form class="login-form" method="POST" action="login.php">
            <h2 style="text-decoration: underline;" class="text-center"><b>Login</b></h2>
            <div class="mb-3">
                <label for="username" class="form-label"><b>Username</b></label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><b>Password</b></label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember"><b>Remember me</b></label>
            </div>
            <input type="submit" name="ok" value="Login" class="btn btn-primary w-100">
            <div class="text-center mt-3">
                <a href="#">Forgot password?</a>
            </div>
            <div class="text-center mt-2">
                <p>Don't have an account? <a href="reg.php">Register here</a></p>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>
<!-- 

http://localhost/PHP43/04_SQL/login.php
-->