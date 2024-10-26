<?php
session_start(); // Start the session at the top of your script
include("EG_PHP43_MAKAUT.php");
require('checkSession.php');

// Retrieve user information from session
$userInfo = isset($_SESSION['u_info']) ? $_SESSION['u_info'] : null; // Check if the session variable exists

// Debugging line
// echo '<pre>';
// print_r($userInfo); // Check what is stored in the session variable
// echo '</pre>';


// Create Full Name
$fullName = isset($userInfo['FirstName']) && isset($userInfo['LastName']) 
    ? htmlspecialchars($userInfo['FirstName'] . ' ' . $userInfo['LastName']) 
    : 'N/A';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="User Profile Page"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Profile</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Lora', serif; /* Apply Lora font */
        }
        .profile-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            font-family: 'Lora', serif; /* Lora for headers */
        }
        .profile-header img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .profile-info {
            margin-top: 20px;
            font-family: 'Lora', serif; /* Lora for profile info */
        }
        .profile-info h5 {
            color: #007bff;
            font-family: 'Lora', serif;
        }
        .btn-logout {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="profile-header">
            <h2><?php echo $fullName; ?></h2> <!-- Display Full Name -->
            <p style="text-decoration: underline;"><?php echo htmlspecialchars($userInfo['Email'] ?? 'N/A'); ?></p> <!-- Dynamic email -->
        </div>
        <div class="profile-info mt-4">
            <h5>Profile Information</h5>
            <ul class="list-group">
                <li class="list-group-item"><strong>User ID:</strong> <?php echo htmlspecialchars($userInfo['UID'] ?? 'N/A'); ?></li>
                <li class="list-group-item"><strong>Full Name:</strong> <?php echo $fullName; ?></li>
                <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($userInfo['Email'] ?? 'N/A'); ?></li>
                <li class="list-group-item"><strong>Gender:</strong> <?php echo htmlspecialchars($userInfo['Gender'] ?? 'N/A'); ?></li>
                <li class="list-group-item"><strong>Languages:</strong> <?php echo htmlspecialchars($userInfo['Language'] ?? 'N/A'); ?></li>
                <li class="list-group-item"><strong>Address:</strong> <?php echo htmlspecialchars($userInfo['Address'] ?? 'N/A'); ?></li>
                <li class="list-group-item"><strong>City:</strong> <?php echo htmlspecialchars($userInfo['City'] ?? 'N/A'); ?></li>
            </ul>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <a href="edit-profile.php" class="btn btn-primary">Edit Profile</a>
            <a href="logout.php" class="btn btn-logout">Logout</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>
<!-- 

http://localhost/PHP43/04_SQL/index.php
-->