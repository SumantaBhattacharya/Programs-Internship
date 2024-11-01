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
            background-color: #fff;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        @media (max-width: 768px) {
            h2 {
                font-size: 1.4rem;
            }
            .btn-primary {
                width: 100%;
            }
        }
    </style>
    <title>Add New Category</title>
</head>
<body>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Add New Category</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="category.php">Category</a></li>
                <li class="breadcrumb-item active">Add New Category</li>
            </ol>
            <div class="card mb-4 border-0">
                <form name="cat-frm" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="cat_name" name="cat_name" type="text" placeholder="Enter name of category" required />
                                <label for="cat_name">Name of Category</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-3">
                        <div class="col-6">
                            <div class="d-grid">
                                <input type="submit" name="ok" value="Add New Category" class="btn btn-primary btn-block">
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                // Database connection
                require('config.php');
                
                // Form method post
                if (isset($_POST['ok'])) {
                    $cat_name = $_POST['cat_name'];
                    // SQL query to insert category into database
                    $query = "INSERT INTO Category (Category_Name) VALUES ('$cat_name')";
                    
                    // Execute the query
                    if (mysqli_query($connection, $query)) {
                        echo "<div class='alert alert-success' role='alert'>Category added successfully!</div>";
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Error: ". mysqli_error($connection)."</div>";
                    }

                    // Close the database connection
                    mysqli_close($connection);
                }
                ?>
            </div>
        </div>
    </main>
    <?php require('footer.php') ?> 
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>
