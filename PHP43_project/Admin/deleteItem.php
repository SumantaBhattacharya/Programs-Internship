<?php
 session_start();
 require("config.php"); // Include the database connection

 if (isset($_GET['id'])) {
     $item_id = $_GET['id'];
     $query = "DELETE FROM Item WHERE Item_ID = $item_id";
     if (mysqli_query($connection, $query)) {
         header("Location: item.php"); // Redirect to the home page
         exit(); // Good practice to call exit after a redirect
     } else {
         echo "Error deleting item: ". mysqli_error($connection);
         
     }
 }else {
    // Set an error message if no valid ID is provided
    $_SESSION['error'] = "Invalid item ID.";
}

// Redirect back to the main item list page
header("Location: index.php");
exit;
?>

<!-- a problem is that once i delte the removing from db all the details but the image remail in the local repo even though it got delted from the db -->