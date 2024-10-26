<?php

include("EG_PHP43_MAKAUT.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
<title>Title</title>
</head>
<style>
    * {
        padding: 0.1vw;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        height: 100%;
        width: 100%;
        font-family: 'Lora', serif;
        background-color: #f8f9fa;
        padding: 50px 0.2vw;
    }

    .main {
        max-width: 2000px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .main {
            padding: 20px; /* Reduce padding on smaller screens */
        }

        table {
            font-size: 14px; /* Smaller font size for better fit */
        }

        h2 {
            font-size: 1.5rem; /* Adjust heading size */
        }
    }

    @media (max-width: 650px) {
        .main {
        max-width: 200vw;

        }
    }


    @media (max-width: 576px) {

        .main {
            width: 500vw;

        }

        table {
            font-size: 12px; /* Even smaller font size */
        }

        .main {
            padding: 15px; /* Further reduce padding */
        }

        h2 {
            font-size: 1.25rem; /* Further adjust heading size */
        }

        th, td {
            padding: 5px; /* Adjust padding for table cells */
        }
    }

    @media (max-width: 285px) {
        .main {
            width: 800vw;

        }
    }


</style>

<body>
    <div class="main">
        <?php
        // Query to select all records from the Students table
$query2 = "SELECT * FROM Students";

// Execute the SQL command
$result = mysqli_query($connection, $query2);
// $result = $conn->query($query);


if (!$result) {
    // mysqli_error() is more typical in procedural programming.
    //echo "Error executing query: " . mysqli_error($connection);
    echo "<p class='text-center'>Error executing query: " . $connection->error . "</p>";
}                    

// Check if the result is not empty
if(mysqli_num_rows($result) > 0){// No. of record in the record set
    echo "<h2 style='text-decoration: underline;' class='text-center mb-4'><b>All Students</b></h2>";

    echo "<div class='col-6'>";
    if (isset($_GET['msg'])) {
        // Execute code if condition is true
        // selectAll.php?msg=User%20details%20removed%20successfully

        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                " . $_GET['msg'] . "
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
    }elseif(isset($_GET['err'])){
        // selectAll.php?err=User%20details%20not%20found
        echo "<div class='alert alert-danger'>". $_GET['err']. "
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
    }
    echo "</div>";


    // Fetch and display all records
    echo "<table class='table table-striped'>";

    // it can be any see "Name"
    echo "<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Language</th>
    <th>Address</th>
    <th>City</th>
    <th colspan='2'>Action</th>
    </tr>";
    // procedural style 
    // mysqli_fetch_row($result)
    // mysqli_fetch_array($result)
    // echo "<pre>";
    //           assoc -> associative array
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            // print_r($row);
            echo "<tr>";
                echo "<td>" . $row["UID"] . "</td>";
                echo "<td>" . $row["FirstName"] . " " . $row["LastName"] . "</td>";
                echo "<td>" . $row["Email"] . "</td>";
                echo "<td>" . $row["Gender"] . "</td>";
                echo "<td>" . $row["Language"] . "</td>";
                echo "<td>" . $row["Address"] . "</td>";
                echo "<td>" . $row["City"] . "</td>";
                echo
                    "<td>
                        <a href='edit.php?id=" . $row["UID"] ."' class='btn btn-warning btn-sm'>Edit</a>
                    </td>
                    <td>
                        <form name='del-frm-$i' method='POST' action='delete.php'>
                             <input type='hidden' name='id' value='". $row["UID"]."' />
                             <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                        </form>
                        
                    </td>";
            echo "</tr>";
            $i++;
        }
    echo "</table>";                        

} else {
    echo "<p class='text-center'>No students found.</p>";
}

        ?>
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>


<!-- 

http://localhost/PHP43/04_SQL/selectAll.php
D:\xampp\htdocs\PHP43\04_SQL\selectAll.php

                        <form name = 'del-frm-<?php echo $i; ?>' method='POST'>  
                        </form>
                        <a href='delete.php?id=" . $row["UID"] ."' class='btn btn-danger btn-sm'>Delete</a>

both `$result->fetch_assoc()` and `mysqli_fetch_assoc($result)` accomplish the same task: they retrieve the next row from a result set as an associative array. However, they differ in terms of syntax and some underlying behavior due to the different ways you interact with the result set object. Here's a breakdown of both methods:

### 1. `$result->fetch_assoc()`

- **Syntax**: This uses the object-oriented style of MySQLi.
- **Usage**: You need to have a result set object, which is created by a previous `mysqli_query` call.
- **Example**:
    ```php
    $result = mysqli_query($connection, $query);
    while ($row = $result->fetch_assoc()) {
        echo $row["FirstName"];
    }
    ```

### 2. `mysqli_fetch_assoc($result)`

- **Syntax**: This uses the procedural style of MySQLi.
- **Usage**: You pass the result set as an argument to the `mysqli_fetch_assoc()` function.
- **Example**:
    ```php
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row["FirstName"];
    }
    ```
Why Changing the value Part Causes Errors:
Dynamic PHP Insertion:

The value='". $row["UID"] ."' part is PHP code that dynamically inserts the value of UID from the database into the form. If you make a syntax mistake inside the value, like altering the quotes or adding invalid characters, it will break the PHP rendering process.
Correct Syntax:

You need to ensure the proper use of quotes (') and concatenation (.) in PHP, as these are required for inserting dynamic data in HTML attributes.
If you modify the syntax, such as using mismatched quotes or incorrect concatenation, PHP will not be able to process the code correctly.
Common Mistakes:
Missing or Misused Quotes:

<input type='hidden' name='id' value='. $row["UID"].' />  // Missing single quotes
This will throw an error because the PHP code will not be properly embedded.

Incorrect Concatenation:

<input type='hidden' name='id' value='$row["UID"]' />  // Incorrect concatenation without dot
This would also throw an error, as it doesn't correctly concatenate the PHP variable with the HTML.

Solution and Best Practice:
Always ensure that the PHP code is properly encapsulated in the correct syntax:

<input type='hidden' name='id' value='<?php echo $row["UID"]; ?>' />
This will properly insert the UID value into the form field. If you are using PHP short tags or echo inside an HTML context, the concatenation (.) is needed only when the entire statement is inside an echo statement like this:

echo "<input type='hidden' name='id' value='" . $row["UID"] . "' />";
The first one is generally cleaner and easier to manage.

-->
    <!-- so much time ❌
         so many time ✔
    -->