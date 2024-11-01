<?php 
session_start();
require('header.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            margin-top: 20px;
            color: #333;
        }
        .breadcrumb {
            background-color: transparent;
            margin-bottom: 20px;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .card-header {
            font-weight: bold;
            background-color: #f8f9fa;
        }
        .btn-info {
            background-color: #17a2b8;
            border: none;
        }
        .btn-info:hover {
            background-color: #138496;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        @media (max-width: 768px) {
            h2 {
                font-size: 1.4rem;
            }
            .btn-info {
                width: 100%;
                padding: 10px;
            }
        }
    </style>
    <title>All Category</title>
</head>
<body>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">All Category</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <a href="addCategory.php" class="btn btn-info">Add New Category</a>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Category
                </div>
                <div class="card-body">
                <?php
                // Database connection
                    require('config.php');

                    $query = "SELECT * FROM Category";

                    // Execute the SQL command
                    $result = mysqli_query($connection, $query);

                    if (!$result) {
                        die("Error executing the query: ". mysqli_error($connection));
                    }

                    if (mysqli_num_rows($result) == 0) {
                        echo "<div class='alert alert-success' role='alert'>No category found.</div>";
                    }

                    // Display the result
                    echo "<table class='table table-bordered'>";
                    echo "<tr>";
                    echo "<th>Category ID</th>";
                    echo "<th>Category Name</th>";
                    echo "</tr>";

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>". $row['Category_ID']. "</td>";
                        echo "<td>". $row['Category_Name']. "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                    // Free the result set
                    mysqli_free_result($result);

                // Close the database connection
                    mysqli_close($connection);
                ?>
                </div>
            </div>
        </div>
    </main>
    <?php require('footer.php') ?> 
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>
