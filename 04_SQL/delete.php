<?php
    // Include your database connection
include("EG_PHP43_MAKAUT.php");

// Check if 'id' is set in the POST request
if (isset($_POST['id'])) {
    // Get the ID from the form submission
    $student_id = $_POST['id'];// name = "id" value="16" thats how id = 16 supposedly from selectAll.php
    // echo "Hello, " . htmlspecialchars($student_id) . "! Your student_id has been submitted successfully.";


        // Prepare the DELETE query to remove the student with the specified ID
        $query = "DELETE FROM Students WHERE UID = $student_id";

        // Execute the DELETE query
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection)) ;

        // Check if the DELETE query was successful
        if ($result) {
            echo "<div class='alert alert-success'>Student with ID $student_id has been deleted successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error deleting student with ID $student_id. Please try again later.</div>";
        }
        // http://localhost/PHP43/04_SQL/selectAll.php?msg=User%20details%20removed%20successfully
        header("Location: selectAll.php?msg=User details removed successfully");
        exit(); // Good practice to call exit after a redirect
    } else {
            // Redirect to the list of students if the 'id' is not set
           
    header("Location: selectAll.php?err=User details not removed successfully");

    exit(); // Good practice to call exit after a redirect

}
?>

<!-- 
The Flow in Summary:
The form submission triggers an HTTP POST request to delete.php.
The browser includes the input field data in the request body, where name='id' and value='16'.
When delete.php receives the request, it checks if $_POST['id'] is set.
If it is set, PHP retrieves the value associated with id (in this case, 16) and assigns it to $student_id.
Finally, it displays the message that includes the student ID.
-->

<!-- Login Steps:
     1. Registration user/customer
     2. Design a login form
     3. use the session for storing the data of user who has been login
     4. Use the session to check whether the user is logged in or not. If not logged in, redirect to login page.
     4. create a profile page after login
     5. if the user/customer is logged then redirect the user to the profile page 
     6. loggout from the system
     
-->