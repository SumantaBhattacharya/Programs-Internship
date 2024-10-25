
### 1. **Procedural Style:**
This is your first code snippet:
```php
<?php
// MySQLi connection (procedural)

$servername = "localhost";
$username = "root";
$password = "CJnm@#9501";
$dbname = "PHP43";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

/*
$port = "3306"
$connection = mysqli_connect($servername, $username, $password, $dbname, $port);
*/

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully<br>";
}
?>
```
- **Connection Method**: Uses `mysqli_connect()` to establish the connection.
- **Error Checking**: Checks for connection errors using `if (!$connection)`, which is appropriate for procedural style.

### 2. **Object-Oriented Style:**
This is your second code snippet:
```php
<?php
// MySQLi connection

$servername = "localhost";
$username = "root";
$password = "CJnm@#9501";
$dbname = "PHP43";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}else{
    echo "Connected successfully<br>";
}
?>
```
- **Connection Method**: Uses `new mysqli()` to create a connection object.
- **Error Checking**: The connection check using `if(!$connection)` will **not work correctly** because it does not accurately check for connection errors. The correct way is to use `$connection->connect_error`.

### Summary of Key Differences:
- **Style**: The first snippet uses the procedural style of MySQLi, while the second snippet uses the object-oriented style.
- **Connection Error Check**: The first snippet checks for connection errors correctly for its style. The second snippet needs to use `$connection->connect_error` for proper error handling.

### Conclusion:
- While both snippets aim to connect to the MySQL database, they are **not the same** in implementation.
- The procedural style is simpler for small scripts, while the object-oriented style is more structured and suitable for larger applications.

Since the UID field in your Students table is defined as AUTO_INCREMENT, you don't need to include it in the form. The database will automatically generate a unique UID value whenever a new record is inserted.

 the names of the form fields in your HTML form should match the names of the corresponding columns in your database table when you process the form data in PHP (or any server-side language). This ensures that the data is correctly mapped and stored in the database.
```html
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
```

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

`mysqli_query() is used to execute the SQL query.`

`PASSWORD_DEFAULT` is a constant provided by PHP that instructs the `password_hash()` function to use the current best hashing algorithm for password storage. As of now, it uses the **bcrypt** algorithm, which is widely regarded as a secure method for hashing passwords.

### Key Points about `PASSWORD_DEFAULT`:

1. **Automatic Upgrading**: When you use `PASSWORD_DEFAULT`, PHP will automatically use the best algorithm available at the time of your script's execution. This means that if PHP updates in the future and a stronger algorithm becomes the default, your code will benefit from it without needing changes.

2. **Complexity and Security**: The bcrypt algorithm includes a work factor (cost), which can be adjusted to increase the computational cost of hashing. This makes it more resistant to brute-force attacks. The default cost is usually set to a reasonable value, but it can be increased for additional security.

3. **Long-term Compatibility**: When you later verify a password using `password_verify()`, you won't have to worry about the specific algorithm used, as it will check the hash's format and automatically use the appropriate method to verify the password.

### Steps for Pagination in PHP

1. **Determine the Total Number of Records**:
   - First, you need to query your database to find out how many records you have in total. This will help you calculate how many pages are needed.

2. **Set Up Pagination Variables**:
   - Decide how many records you want to display per page.
   - Calculate the total number of pages based on the total number of records.

3. **Get the Current Page**:
   - Use a query parameter (e.g., `page`) in your URL to determine which page the user is currently viewing.

4. **Calculate the SQL OFFSET**:
   - Use the current page to determine the SQL `LIMIT` and `OFFSET` for your query.

5. **Fetch the Records for the Current Page**:
   - Modify your SQL query to only fetch the records for the current page.

6. **Display the Records**:
   - Render the records in your HTML.

7. **Create Pagination Links**:
   - Generate links for navigating to different pages.

oth `$result->fetch_assoc()` and `mysqli_fetch_assoc($result)` accomplish the same task: they retrieve the next row from a result set as an associative array. However, they differ in terms of syntax and some underlying behavior due to the different ways you interact with the result set object. Here's a breakdown of both methods:

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
    
```sql
CREATE DATABASE IF NOT EXISTS PHP43;
SHOW DATABASES;

DROP DATABASE IF EXISTS PHP43;

USE PHP43;

-- dont run this command unless u want to chage the password
ALTER USER 'root'@'localhost' IDENTIFIED BY '';

CREATE TABLE IF NOT EXISTS Students (
    UID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Email VARCHAR(320) NOT NULL UNIQUE, 
    Password VARCHAR(255) NOT NULL, 
    Gender ENUM('Male', 'Female', 'Other') DEFAULT 'Other',
    Language VARCHAR(35),
    Address VARCHAR(255),
    City VARCHAR(100)
);

DROP TABLE IF EXISTS Students;

ALTER TABLE Students;

INSERT INTO Students (FirstName, LastName, Email, Password, Gender, Language, Address, City)
VALUES 
('Sumanta', 'Bhattacharya', 'sumanta2004@gmail.com', 'CJnm@#9501', 'Male', 'English, Bengali', 'C/O: Anita Bhattacharya, CCI QUARRY, Dillai, Karbi Anglong, Assam - 782480', 'Bokajan'),
('Sudip', 'Bhattacharya', 'sudbha98@gmail.com', '2023qwer', 'Male', 'Bengali', 'C/O PARESH BISWAS, SIMHAT, 8No WARD, 4No GATE(NEAR BY SANIK BHAWAN) NEAR BSF NADIA WEST BENGAL', 'Kalyani'),
('Anita', 'Bhattacharya', 'anitabhattacharya1978@gmail.com', 'A9501', 'Female', 'Bengali', 'CCI Factory Colony, Type-II, Quarter NO. 42, Bokajan Cement Factory, Cement Corporation of India Ltd, Opposite to CCI Kendriya Vidhyalaya School, East Karbi Anglong District, Assam - 782480', 'Bokajan'),
('Suman', 'Bhattacharya', 'suman2004@gmail.com', 'CJnm@#9501', 'Male', 'English', 'MAIN CAMPUS:- NH 12, SIMHAT, HARINGHATA, NADIA, PIN - 741249, CITY OFFICE: BF - 142, SECTOR 1, SALT LAKE KOLKATA - 700 004', 'Kolkata');

DELETE FROM Students WHERE UID = 1;

show tables;

DELETE FROM Students 
WHERE Email = 'sudbha98@gmail.com';

SELECT COUNT(*) AS total FROM Students;

select * from Students;
```

The difference between `mysqli_fetch_row($result)` and `mysqli_fetch_assoc($result)` lies in how they return the result set from a MySQL query.

### 1. `mysqli_fetch_row($result)`:
- **Returns**: A **numerically indexed array**.
- Each column is accessed using a numeric index, starting from 0 for the first column.
- Example:
  ```php
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_row($result)) {
      echo $row[0]; // Access first column
      echo $row[1]; // Access second column
  }
  ```

### 2. `mysqli_fetch_assoc($result)`:
- **Returns**: An **associative array**.
- Each column is accessed by the column name as the key.
- Example:
  ```php
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
      echo $row['column_name1']; // Access first column by name
      echo $row['column_name2']; // Access second column by name
  }
  ```

### Key Differences:
- **`mysqli_fetch_row`**: You access data using numerical indexes (e.g., `$row[0]`).
- **`mysqli_fetch_assoc`**: You access data using column names (e.g., `$row['column_name']`).

### Use Case:
- If you prefer readability and working with column names, use `mysqli_fetch_assoc`.
- If performance or array indexing is more important, `mysqli_fetch_row` might be slightly faster as it doesn't need to build an associative array.

The message `Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.2.12 Server at localhost Port 80` provides detailed information about the software stack running on your local server. Here's a breakdown of what each part means:

1. **Apache/2.4.58**: 
   - This indicates that the **Apache HTTP server** version **2.4.58** is running. Apache is the web server software that handles HTTP requests and serves web pages.

2. **(Win64)**:
   - This shows that the server is running on a **64-bit version of Windows**. In your case, it's Windows 10 or 11.

3. **OpenSSL/3.1.3**:
   - **OpenSSL** is a software library used to implement **SSL/TLS** protocols, which provide secure communication over networks (HTTPS). Version **3.1.3** is being used on your server for handling encryption.

4. **PHP/8.2.12**:
   - **PHP** is the server-side scripting language that processes dynamic content in web pages. You are using PHP version **8.2.12**.

5. **Server at localhost**:
   - This indicates that the server is running on **localhost**, meaning it is operating on your local machine, not a remote server. You're likely accessing it via `http://localhost/`.

6. **Port 80**:
   - **Port 80** is the default port used by **HTTP** (non-secure web traffic). Your Apache server is listening for requests on this port, which means it's handling web traffic over HTTP.

   The input element you're referring to is part of an HTML form that is sending data via `POST`. The reason it looks like this:

```php
<input type='hidden' name='id' value='". $row["UID"] ."' />
```

is because you're dynamically inserting the value of `UID` (which comes from the database row) into the `value` attribute of the hidden input.

### Why Changing the `value` Part Causes Errors:

1. **Dynamic PHP Insertion**:
   - The `value='". $row["UID"] ."'` part is PHP code that dynamically inserts the value of `UID` from the database into the form. If you make a syntax mistake inside the `value`, like altering the quotes or adding invalid characters, it will break the PHP rendering process.

2. **Correct Syntax**:
   - You need to ensure the proper use of quotes (`'`) and concatenation (`.`) in PHP, as these are required for inserting dynamic data in HTML attributes.
   - If you modify the syntax, such as using mismatched quotes or incorrect concatenation, PHP will not be able to process the code correctly.

### Common Mistakes:
1. **Missing or Misused Quotes**:
   ```php
   <input type='hidden' name='id' value='. $row["UID"].' />  // Missing single quotes
   ```
   This will throw an error because the PHP code will not be properly embedded.

2. **Incorrect Concatenation**:
   ```php
   <input type='hidden' name='id' value='$row["UID"]' />  // Incorrect concatenation without dot
   ```
   This would also throw an error, as it doesn't correctly concatenate the PHP variable with the HTML.

### Solution and Best Practice:
Always ensure that the PHP code is properly encapsulated in the correct syntax:

```php
<input type='hidden' name='id' value='<?php echo $row["UID"]; ?>' />
```

This will properly insert the `UID` value into the form field. If you are using PHP short tags or echo inside an HTML context, the concatenation (`.`) is needed only when the entire statement is inside an `echo` statement like this:

```php
echo "<input type='hidden' name='id' value='" . $row["UID"] . "' />";
```

The first one is generally cleaner and easier to manage.

The Flow in Summary:
The form submission triggers an HTTP POST request to delete.php.
The browser includes the input field data in the request body, where name='id' and value='16'.
When delete.php receives the request, it checks if $_POST['id'] is set.
If it is set, PHP retrieves the value associated with id (in this case, 16) and assigns it to $student_id.
Finally, it displays the message that includes the student ID.

  Login Steps:-
  1.Registration a user/Customer
  2. Design a login form
  3. Use the session for storing the data of user who has been login
  4. Use the session to check whether the user is logged in or not. If not logged in, redirect to login page.
  5. Create a profile page after login
  6. If the user/customer is logged then redirect the user to the profile page
  7. loggout from the system

  ### Differences Between the Two

1. **`mysqli_num_rows($result)`**:
   - This is a procedural style function provided by the `mysqli` extension.
   - It directly checks the number of rows in the result set associated with `$result`.
   - Usage:
     ```php
     if (mysqli_num_rows($result) > 0) {
         // There are rows in the result
     }
     ```

2. **`$result->num_rows`**:
   - This is an object-oriented style property of the `mysqli_result` object.
   - It accesses the `num_rows` property of the `$result` object to determine the number of rows returned.
   - Usage:
     ```php
     if ($result->num_rows > 0) {
         // There are rows in the result
     }
     ```

### Example Usage

You can use either approach, depending on your coding style preference (procedural vs. object-oriented). Here’s how both would look in a complete example:

```php
$result = $connection->query("SELECT * FROM Students WHERE Email = '$username'");

// Using procedural style
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Process the row data
}

// Using object-oriented style
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Process the row data
}
```

 You can store the image in the database by either saving the image file path or storing the entire image file as binary data. Here’s a quick comparison:

1. **Storing the File Path**: 
   - Save only the file path in the database.
   - The file itself remains on the server, and you fetch the path to display the image.
   - This approach saves database space, especially if you have many images.

2. **Storing the Image as Binary (BLOB)**: 
   - Store the image data directly in the database using a BLOB (Binary Large Object) field.
   - You retrieve the binary data and decode it for display.
   - While this method makes backups straightforward, it can quickly increase database size.

   Let’s go through examples of both methods in PHP: storing only the file path and storing the actual image in the database as binary data.

### 1. Example: Storing the File Path in the Database

This method uploads the image to a server folder, saves the file path in the database, and then retrieves the image using the file path.

#### Step 1: Upload Image and Save Path

```php
<?php
include("EG_PHP43_MAKAUT.php"); // Database connection

if (isset($_POST['upload'])) {
    $file = $_FILES['profile_image'];

    // Define upload folder
    $uploadDir = "uploads/";
    $filePath = $uploadDir . basename($file['name']);

    // Move file to the upload directory
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        $username = htmlspecialchars($_POST['username']);
        
        // Save file path in the database
        $query = "INSERT INTO Users (username, profile_image) VALUES ('$username', '$filePath')";
        if (mysqli_query($connection, $query)) {
            echo "Image uploaded and path saved successfully!";
        } else {
            echo "Error saving path: " . mysqli_error($connection);
        }
    } else {
        echo "Error uploading the file.";
    }
}
?>
```

#### HTML Form

```html
<form action="" method="POST" enctype="multipart/form-data">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    
    <label for="profile_image">Upload Profile Image:</label>
    <input type="file" id="profile_image" name="profile_image" required>
    
    <input type="submit" name="upload" value="Upload">
</form>
```

#### Step 2: Retrieve and Display Image

```php
<?php
include("EG_PHP43_MAKAUT.php");

$query = "SELECT username, profile_image FROM Users";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<h3>" . $row['username'] . "</h3>";
    echo "<img src='" . $row['profile_image'] . "' alt='Profile Image' width='100'>";
}
?>
```

---

### 2. Example: Storing the Image as Binary Data in the Database

This example uploads the image, converts it to binary data, and saves it directly in the database as a BLOB.

#### Step 1: Upload Image as Binary Data

```php
<?php
include("EG_PHP43_MAKAUT.php");

if (isset($_POST['upload'])) {
    $file = $_FILES['profile_image'];
    
    // Open the file and read it as binary data
    $imageData = addslashes(file_get_contents($file['tmp_name']));
    $username = htmlspecialchars($_POST['username']);
    
    // Save binary data in the database
    $query = "INSERT INTO Users (username, profile_image) VALUES ('$username', '$imageData')";
    if (mysqli_query($connection, $query)) {
        echo "Image uploaded as binary data!";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>
```

#### HTML Form

The HTML form is the same as above.

#### Step 2: Retrieve and Display Image

```php
<?php
include("EG_PHP43_MAKAUT.php");

$query = "SELECT username, profile_image FROM Users";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<h3>" . $row['username'] . "</h3>";
    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['profile_image']) . '" width="100">';
}
?>
```

