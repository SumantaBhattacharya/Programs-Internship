<?php 
session_start();
require('header.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<style>
    /* Custom CSS */
    body {
        font-family: 'Lora', serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
    }
    h2 {
        font-size: 1.8rem;
        font-weight: bold;
        text-align: center;
        margin-top: 20px;
        color: #333;
    }
    ol {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin: 20px 0;
    }
    ol li {
        margin-right: 10px;
    }
    ol li a {
        color: #007bff;
        text-decoration: none;
    }
    ol li a:hover {
        text-decoration: underline;
    }
    .content-container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
    }
    .add-item {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 20px;
    }
    .add-item a {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .add-item a:hover {
        background-color: #0056b3;
    }
    .all-item-title {
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #333;
    }
    .all-item-content {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }
    .item-card {
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        width: calc(33.333% - 20px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .item-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .item-card h3 {
        font-size: 1.3rem;
        color: #007bff;
        margin-bottom: 10px;
    }
    .item-card p {
        font-size: 1rem;
        color: #666;
        margin-bottom: 15px;
    }
    .item-card a {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
        margin-right: 15px;
    }
    .item-card a:hover {
        text-decoration: underline;
    }
    @media (max-width: 768px) {
        .item-card {
            width: calc(50% - 20px);
        }
    }
    @media (max-width: 576px) {
        .item-card {
            width: 100%;
        }
    }
</style>
<title>Title</title>
</head>
<body>
<div id="layoutSidenav_content">
    <main>
        <div class="content-container">
            <h2>All Items</h2>
            <ol>
                <li><a href="index.php">Dashboard</a></li>
                <li>Item</li>
            </ol>
            <div class="add-item">
                <a href="addItem.php">Add New Item</a>
            </div>
            <div class="all-item">
                <div class="all-item-title">
                    <span>All Items</span>
                </div>
                <div class="all-item-content">
                    <?php
                    // Database connection
                    require("config.php");

                    $query = "SELECT * FROM Item";
                    $result = mysqli_query($connection, $query);

                    if (!$result) {
                        die("Error executing the query: " . mysqli_error($connection));
                    };

                    // echo "../".$row["image_path"] width="60" height="60"
                    // http://localhost/PHP43/PHP43_project/item/Steve_Jobs_Headshot_2010-CROP_(cropped_2).jpg

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $image_path = htmlspecialchars($row["Item_Image"]);
                            $full_url = "http://localhost/PHP43/PHP43_project/" . $image_path; // Construct the full URL
                            echo "<div class='item-card'>
                                    <h3>" . htmlspecialchars($row["Item_Name"]) . "</h3>
                                    
                                    <img src='" . $full_url . "' alt='" . htmlspecialchars($row["Item_Name"]) . "' style='max-width: 100%; height: auto; border-radius: 10px; ' />
                                    <p>" . htmlspecialchars($row["Item_Description"]) . "</p>
                                    <a href='editItem.php?id=" . $row["Item_ID"] . "'>Edit</a>
                                    <a href='deleteItem.php?id=" . $row["Item_ID"] . "' onclick='return confirm(\"Are you sure you want to delete this item?\")'>Delete</a>
                                  </div>";
                        }
                        
                        
                    } else {
                        echo "<p>No items found.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php require('footer.php') ?>
