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
    <link rel="stylesheet" href="styles.css"> <!-- External CSS file -->
    <title>Add New Item</title>
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
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .success-message, .error-message {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }
        @media (max-width: 768px) {
            h2 {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
<div id="layoutSidenav_content">
    <main>
        <div>
            <h2>Add New Item</h2>
            <ol>
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="item.php">Item</a></li>
                <li>Add New Item</li>
            </ol>
            <!-- MySQL's default behavior is case-insensitive on Windows but case-sensitive on Unix/Linux. -->
            <div class="form-container">
                <form name="item-frm" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="item_name" class="form-label">Name of Item</label>
                        <input class="form-control" id="item_name" name="item_name" type="text" placeholder="Enter name of Item" required />
                    </div>
                    <div class="mb-3">
                        <label for="Category_ID" class="form-label">Select Category</label>
                        <select class="form-control" name="Category_ID" id="Category_ID" required>
                            <option value="" selected >Select a Category</option>
                            <?php
                               require("config.php"); // Include your database configuration
                               $query1 = "SELECT Category_ID, Category_Name FROM Category";
                               $result1 = mysqli_query($connection, $query1);
                               while ($row = mysqli_fetch_assoc($result1)) {
                                   echo "<option value='". $row['Category_ID']. "'>". htmlspecialchars($row['Category_Name']). "</option>"; // Use htmlspecialchars for security
                               }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="item_description" class="form-label">Item Description</label>
                        <textarea style="resize: none;" class="form-control" id="item_description" name="item_description" placeholder="Enter item description" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="item_image" class="form-label">Upload Item Image</label>
                        <input class="form-control" id="item_image" name="item_image" type="file" accept="image/*" required />
                    </div>
                    <div class="d-grid mt-4 mb-3">
                        <input type="submit" name="ok" value="Add New Item" class="btn btn-primary btn-block">
                    </div>
                </form>

                <?php
                // Database connection
                //require('config.php'); // Uncomment to include your database configuration
                // it already required on the top, so we commented it

                // Form method post
                if (isset($_POST['ok'])) {
                    // Sanitize and validate item name
                    // filter_var() It can be used for validating and sanitizing data. like check correct format, type, and length before accepting it and  removing unwanted characters, HTML tags, or other potentially harmful elements.
                    // FILTER_SANITIZE_STRING is used to strip/remove tags and optionally encode or remove special characters from a string
                    $item_name = filter_var($_POST['item_name'], FILTER_SANITIZE_STRING);
                    //  As of PHP 8.1.0, FILTER_SANITIZE_STRING is deprecated, so it's better to use other filters like FILTER_SANITIZE_FULL_SPECIAL_CHARS or FILTER_SANITIZE_SPECIAL_CHARS if you want to encode special HTML characters.
                    // $item_name = mysqli_real_escape_string($connection, $_POST['item_name']); // For SQL
                    // $item_name = $_POST['item_name'];
                    $item_description = filter_var($_POST['item_description'], FILTER_SANITIZE_STRING);
                    $category_id = (int)$_POST['Category_ID'];// Get the selected category ID
                    $fname = $_FILES['item_image']['name'];

                    // Validate the image file
                    if ($_FILES['item_image']['error'] === UPLOAD_ERR_OK) {
                        // Check/verify if the uploaded file is an valid image
                        // getimagesize() is a built-in Function in PHP retrieves the size of an image such as its dimensions (width and height) and some additional information about it like image type, and MIME type.
                        // It works by reading the header of the image file.
                        // getimagesize() needs the path to the file to read its dimensions and type
                        if (getimagesize($_FILES['item_image']['tmp_name']) !== false) {
                            // Check if the file size is less than 5MB
                            if ($_FILES['item_image']['size'] < 5000000) {
                                // Check if the file extension is valid
                                $allowed_extensions = array('jpg', 'jpeg', 'png');
                                // pathinfo() built-in PHP Function: which basically gives info about the filename or the given path such as: Directory Name(The path leading up to the file.),Base Name(The full filename (including extension)),Extension: (The file extension (e.g., jpg, png, txt)).
                                // echo $pathInfo['dirname']; $pathInfo['basename']; $pathInfo['extension']; $pathInfo['filename'];
                                // it could either take filename or filepath for example 
                                /*$filePath = '/var/www/html/uploads/image.png';
                                $pathInfo = pathinfo($filePath);*/

                                // the pathinfo giveing the file name without extention and PATHINFO_EXTENSION provides the estension for example image.png, the extension is png. 
                                $extension = pathinfo($fname, PATHINFO_EXTENSION);// so by combining the filename(with extension) and the extension gives the whole name
                                // Result: $extension will be "png".
                                // $filename = pathinfo($fname, PATHINFO_FILENAME);// $filename will be "image"
                                // $dirName = pathinfo('/path/to/image.png', PATHINFO_DIRNAME);
                                // $dirName will be '/path/to'
                                //$baseName = pathinfo('/path/to/image.png', PATHINFO_BASENAME);
                                // $baseName will be 'image.png'
                                
                                // Check if the directory exists, if not, create it.
                                // mkdir() function is used to create directories. It returns TRUE on success and FALSE on failure. 
                                // If the directory already exists, mkdir() will not create it again. 
                                // mkdir("D:/xampp/htdocs/PHP43/PHP43_project/item", 0777, true); // Create the item directory if it doesn't exist
                                /*
                                The first parameter is the path where the new directory will be created.
                                (like PHP43_project) do not exist, they will be created as well.
                                0: Indicates that the first digit is not used (usually not required for directory permissions).
                                7: Owner has read, write, and execute permissions.
                                7: Group has read, write, and execute permissions.
                                7: Others have read, write, and execute permissions.
                                0777 means that everyone can read, write, and execute in that directory.
                                The second parameter of mkdir() sets the permissions for the new directory.
                                0755 (owner can read/write/execute; group and others can read/execute) or 0700 (only the owner can read/write/execute).
                                The third parameter is optional. If set to true, the function will create parent directories as needed.
                                */


                                if (in_array($extension, $allowed_extensions)) {
                                    
                                    // Rename the uploaded file to a unique name
                                    //$new_fname = uniqid() . '.' . $extension; // create a unique filename
                                    //$target_path = "D:/xampp/htdocs/PHP43/PHP43_project/item/" . $new_fname;

                                    //                                                                  lowerlimit upperlimit
                                    // $target_path = "D:/xampp/htdocs/PHP43/PHP43_project/item/" .rand(0000000,9999999)."_".$fname;
                                    
                                    // file_exists() function then checks if a file with that exact name (including its extension) already exists in the target directory.
                                    $target_path = "D:/xampp/htdocs/PHP43/PHP43_project/item/" . $fname;
                                    // $target_path = "D:" . DIRECTORY_SEPARATOR . "xampp" . DIRECTORY_SEPARATOR . "htdocs" . DIRECTORY_SEPARATOR . "PHP43" . DIRECTORY_SEPARATOR . "PHP43_project" . DIRECTORY_SEPARATOR . "item" . DIRECTORY_SEPARATOR . $fname;
                                    // $unique_fname = $filename_without_extension . $unique_id . '.' . $extension; // e.g., "sumanta12t387234732dsa6052b2f5f45e5.jpg"
                                    // "\" to "/"
                                    if (file_exists($target_path)) {
                                        # code...
                                        echo "<div class='error-message'>An image with the same name already exists, choose any other name.</div>";
                                    }else{
                                    // Move the uploaded file to the item directory
                                    // $fname—which comes from $_FILES['item_image']['name']—already includes the file extension
                                    if (move_uploaded_file($_FILES['item_image']['tmp_name'], $target_path)) {
                                        // Display the success message
                                        echo "<div class='success-message'>Item added successfully!</div>";
                                        
                                        // Display the uploaded image
                                        //echo "<div class='success-message'><img src='/PHP43/PHP43_project/item/" . htmlspecialchars($new_fname) . "' alt='Uploaded Image' style='max-width: 100%;'></div>";
                                        echo "<div class='success-message'><img src='/PHP43/PHP43_project/item/" . htmlspecialchars($fname) . "' alt='Uploaded Image' style='max-width: 300px; max-height: 300px; width: auto; height: auto;'></div>";

                                        // Prepare SQL query to insert Item into database
                                        // Single Quotes ('): Used for string values. 
                                        // No Quotes: Used for numeric values. Category_ID is likely an INT type
                                        $query = "INSERT INTO Item (Item_Name, Item_Image, Item_Description, Category_ID) VALUES ('$item_name', 'item/$fname', '$item_description', $category_id)";
                                        // $query = "INSERT INTO Item (Item_Name, Item_Image) VALUES ('$item_name', '$fname')";

                                       // Execute the query
                                       if (mysqli_query($connection, $query)) {
                                            echo "<div class='success-message'>Item added successfully to the database!</div>";
                                            // echo "<div class='success-message'><img src='/PHP43/PHP43_project/item/" . htmlspecialchars($fname) . "' alt='Uploaded Image' style='max-width: 300px; max-height: 300px; width: auto; height: auto;'></div>";
                                        } else {
                                            echo "<div class='error-message'>Error: " . mysqli_error($connection) . "</div>";
                                        }

                                    } else {
                                        //echo "<div class='error-message'>Failed to move uploaded file to $target_path</div>";
                                        echo "<div class='error-message'>Failed to move uploaded file</div>";
                                    }
                                    }

                                } else {
                                    echo "<div class='error-message'>Invalid file format. Only JPG, JPEG, and PNG images are allowed.</div>";
                                }

                            } else {
                                echo "<div class='error-message'>File size is too large. Only images under 5MB are allowed.</div>";
                            }

                        } else {
                            echo "<div class='error-message'>The uploaded file is not a valid image.</div>";
                        }

                    } else {
                        echo "<div class='error-message'>Upload failed with error code: " . $_FILES['item_image']['error'] . "</div>";
                    }

                    // Display the item name
                    echo "Item Name: " . htmlspecialchars($item_name) . "<br>";

                    // Display the details of the uploaded file without a loop
                    // echo "File Name: " . htmlspecialchars($fname) . "<br>";
                    // echo "File Type: " . htmlspecialchars($_FILES['item_image']['type']) . "<br>";
                    // echo "File Temp Name: " . htmlspecialchars($_FILES['item_image']['tmp_name']) . "<br>";
                    // echo "File Error: " . htmlspecialchars($_FILES['item_image']['error']) . "<br>";
                    // echo "File Size: " . htmlspecialchars($_FILES['item_image']['size']) . "<br>";
                }
                // Close the database connection at the end of the script
                mysqli_close($connection);
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
