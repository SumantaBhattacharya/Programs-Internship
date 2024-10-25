<?php
    // Use include() for non-critical files
    include("EG_PHP43_MAKAUT.php"); // If the file is missing, script will stop.
    // Use require() for essential files
    // require(); // If the file is missing, script will continue.
    // require("selectAll.php");
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
    <title>Student Registration</title>
    <style>
        body {
            font-family: 'Lora', serif;
            background-color: #f8f9fa;
            padding: 50px 0;
        }
        .main {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input, .form-group select {
            border-radius: 5px;
        }
        .btn-register {
            background-color: #007bff;
            color: #ffffff;
            border: none;
        }
        .btn-register:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="main">
        <h2 style="text-decoration: underline;" class="text-center mb-4"><b>Student Registration</b></h2>

        <form action="" method="POST" name="reg-frm">
            <div class="form-group mb-3">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="FirstName" class="form-control" required maxlength="50">
            </div>

            <div class="form-group mb-3">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="LastName" class="form-control" required maxlength="50">
            </div>

            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="email" id="email" name="Email" class="form-control" required maxlength="320">
            </div>

            <div class="form-group mb-3">
                <label for="password">Password:</label>
                <input type="password" id="password" name="Password" class="form-control" required maxlength="255">
            </div>

            <div class="form-group mb-3">
                <label for="gender">Gender:</label>
                <select id="gender" name="Gender" class="form-select">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Language:</label><br>
                    <div class="form-check">
                        <input type="checkbox" id="bengali" name="Language[]" value="Bengali" class="form-check-input">
                        <label for="bengali" class="form-check-label">Bengali</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="english" name="Language[]" value="English" class="form-check-input">
                        <label for="english" class="form-check-label">English</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="hindi" name="Language[]" value="Hindi" class="form-check-input">
                        <label for="hindi" class="form-check-label">Hindi</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="other" name="Language[]" value="Other" class="form-check-input">
                        <label for="other" class="form-check-label">Other</label>
                    </div>
            </div>


            <div class="form-group mb-3">
                <label for="address">Address:</label>
                <input type="text" id="address" name="Address" class="form-control" maxlength="255">
            </div>

            <div class="form-group mb-3">
                <label for="city">City:</label>
                <input type="text" id="city" name="City" class="form-control" maxlength="100">
            </div>

            <input type="submit" name="ok" value="Register" class="btn btn-register btn-block">

        </form>

        <?php
        //  form method post
                if (isset($_POST['ok'])) {
                    // Capture form data
                    $firstName = htmlspecialchars($_POST['FirstName']);
                    $lastName = htmlspecialchars($_POST['LastName']);
                    $email = htmlspecialchars($_POST['Email']);
                    $password = htmlspecialchars($_POST['Password']); // Note: Hash the password in real scenarios
                    $gender = htmlspecialchars($_POST['Gender']);
                    // one or multiple langages : null
                    /*When a checkbox is selected, its value is sent in the $_POST array. If the checkbox is not selected, it doesn't get included in the form submission at all. This is why we use isset($_POST['Language']) to check if the "Language" field has been submitted.*/
                    $languages = isset($_POST['Language']) ? $_POST['Language'] : [];
                    $address = htmlspecialchars($_POST['Address']);
                    $city = htmlspecialchars($_POST['City']);

                    // Hash the password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    // Display the captured data
                    // echo "<br>Your name is: ". $firstName. " ". $lastName;
                    // echo "<br>Your email is: ". $email;
                    // echo "<br>Your password is: ". $password;
                    // echo "<br>Your gender is: ". $gender;
                    // The implode() function in PHP is used to combine the elements of an array into a single string, with a specified separator between each element.
                    // echo "<br>Your selected languages are: ". implode(", ", $languages);
                    // echo "Address: " . $address . "<br>";
                    // echo "City: " . $city . "<br>";

                    // we cannot put the same command as in the sql workbench cause we are taking input from the page itself not putting iut directly so 
                    $query = "INSERT INTO Students (FirstName, LastName, Email, Password, Gender, Language, Address, City)
                               VALUES ('$firstName', '$lastName', '$email', '$hashedPassword', '$gender', '".implode(", ", $languages)."', '$address', '$city')";

                    // Execute the SQL command
                    if(mysqli_query($connection, $query)){
                        echo "<div class='alert alert-success'>Registration successful!</div>";
                    }else{
                        echo "<div class='alert alert-danger'>Registration failed! Please try again later.</div>";
                    }

                    // $res = mysqli_query($connection, $query);

                    // if ($res) {
                    //     echo "Registration successful!".$res;
                    // } else {
                    //     echo "Registration failed! Error: " . mysqli_error($connection);  // Show error if the query fails
                    // }
                   

                    // Close the connection
                    $connection->close();
                }

            ?>


    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>

<!-- 

http://localhost/PHP43/04_SQL/reg.php

the names of the form fields in your HTML form should match the names of the corresponding columns in your database table when you process the form data in PHP (or any server-side language). This ensures that the data is correctly mapped and stored in the database. 
 
<div class="form-group mb-3">
    <label>Gender:</label><br>
    <div class="form-check">
        <input type="radio" id="male" name="Gender" value="Male" class="form-check-input" required>
        <label for="male" class="form-check-label">Male</label>
    </div>
    <div class="form-check">
        <input type="radio" id="female" name="Gender" value="Female" class="form-check-input" required>
        <label for="female" class="form-check-label">Female</label>
    </div>
    <div class="form-check">
        <input type="radio" id="other" name="Gender" value="Other" class="form-check-input" required>
        <label for="other" class="form-check-label">Other</label>
    </div>
</div>

The syntax name="Language[]" is used in HTML forms to indicate that the input field (in this case, checkboxes) can accept multiple values as an array. 

Understanding name="Language[]"
Array Notation:

The square brackets [] appended to the name attribute tell the server-side script (like PHP) that this form field can contain multiple values.
When the form is submitted, all selected checkbox values will be sent to the server as an array.
Multiple Selections:

In the case of checkboxes, users can select more than one option. If you have multiple checkboxes with the same name but different values, using [] ensures that all selected values are grouped together.
For example, if a user selects "Bengali" and "English", the data sent to the server would look like this:

Language[] = Bengali
Language[] = English

When processing the form data in PHP, you can access the submitted values using the $_POST or $_GET superglobal arrays. For example, if you have a checkbox field named "Language" with values "Bengali", "English", and "Hindi", you can access the selected values using the following code in PHP:
    $selectedLanguages = $_POST['Language'];
    echo "Selected Languages: ". implode(", ", $selectedLanguages); // Output: Selected Languages: Bengali, English, Hindi


Both `include()` and `require()` in PHP are used to include files, but they have important differences in how they handle errors:

### Differences Between `include()` and `require()`

1. **`require()`**:
   - **Behavior**: If the specified file is not found, `require()` will cause a **fatal error** and stop the execution of the script.
   - **Use Case**: Use `require()` when the file is essential for the application to work, and the script should not proceed if the file is missing.
   - Example:
     ```php
     require("EG_PHP43_MAKAUT.php"); // If the file is missing, script will stop.
     ```

2. **`include()`**:
   - **Behavior**: If the specified file is not found, `include()` will throw a **warning**, but the script will continue to execute.
   - **Use Case**: Use `include()` when the file is not critical, and the script can continue to run even if the file is missing.
   - Example:
     ```php
     include("EG_PHP43_MAKAUT.php"); // If the file is missing, script will continue.
     ```

     PASSWORD_DEFAULT is a constant provided by PHP that instructs the password_hash() function to use the current best hashing algorithm for password storage. As of now, it uses the bcrypt algorithm, which is widely regarded as a secure method for hashing passwords.

Key Points about PASSWORD_DEFAULT:
Automatic Upgrading: When you use PASSWORD_DEFAULT, PHP will automatically use the best algorithm available at the time of your script's execution. This means that if PHP updates in the future and a stronger algorithm becomes the default, your code will benefit from it without needing changes.

Complexity and Security: The bcrypt algorithm includes a work factor (cost), which can be adjusted to increase the computational cost of hashing. This makes it more resistant to brute-force attacks. The default cost is usually set to a reasonable value, but it can be increased for additional security.

Long-term Compatibility: When you later verify a password using password_verify(), you won't have to worry about the specific algorithm used, as it will check the hash's format and automatically use the appropriate method to verify the password.

-->