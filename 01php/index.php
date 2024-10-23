<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // PHP Code...
    

    echo "Hello World";
    echo "<br>";
    $a = "Hello";
    echo $a;
    echo "<br>";
    $b = 12;
    echo $b;
    echo "<br>";
    echo $a ." "."WORLD";
    echo "<br>";
    // "." is used for concatination
    if ($b > 23) {
        echo "Maximum is " . $b;  // code...
    } else {
        echo "Minimum is 23";  // code...
    }

    $name = "sumanta";
    $count = 1;
    while ($count <= 10) {
        # code...
        echo $name . " " . $count . "<br>"; // Print both name and count on the same line with a line break
        $count++; // Increment the count
    }

    for ($i=1; $i <= 12 ; $i++) { 
        # code...
        echo $i . "<br>";
    }

    for ($i=10; $i >=1 ; $i--) { 
        # code...
        echo $i . "<br>";
    }

    // write a php program for reverseing of a number ----------------
    // Reverse a number using string manipulation
    $number = 1234;
    $reversedNumber = strrev((string)$number); // Convert the number to a string and reverse it
    $reversedNumber = (int)$reversedNumber;   // Convert the reversed string back to an integer
    echo "Reversed Number: " . $reversedNumber;

    echo "<br>";

    $originalNumber = $number; // Store the original number to display later
    $rem = 0;
    $rev = 0;

    while ($number >= 1) {
        $rem = $number % 10;        // Get the last digit (remainder)
        $rev = $rev * 10 + $rem;    // Build the reversed number
        $number = ($number / 10);   // Remove the last digit
    }

    echo "Reversed Number of $originalNumber is : " . $rev;
    // 1234 % 10 = 4
    // 4 * 10 + 4 = 44
    // 1234 / 10 = 123

    $myArray = array("apple", "banana", "cherry");
    foreach ($myArray as $fruit) {
        echo $fruit . "<br>";
    }

    // Write a PHP program to find the maximum and minimum of an array
    $numbers = array(1, 4, 7, 2, 9, 5, 6);
    $max = $numbers[0];
    $min = $numbers[0];
    
    foreach ($numbers as $number) {
        if ($number > $max) {
            $max = $number;
        }
        if ($number < $min) {
            $min = $number;
        }
    }
    
    echo "Maximum Number: ". $max. "<br>";
    echo "Minimum Number: ". $min. "<br>";

    for ($i = 0; $i < count($numbers); $i++) {
        echo $numbers[$i] . "<br>";  // Output each element of the array
    }

    // associative array
    $marks = array("Suman"=>90,"Anita"=>50, "Sudip"=>34);

    echo "Suman's Marks: ". $marks["Suman"]. "<br>";
    echo "Anita's Marks: ". $marks["Anita"]. "<br>";

    foreach($marks as $mark=>$mrk){
        echo $mrk . "<br>";
    }

    // nested associative array
    $marks_nums = array(
        "Rohit Singhla" => array("Math"=> 34, "Phy"=> 77, "Eng"=> 67),
        "Manish Singh" => array("Math"=> 54, "Phy"=> 67, "Eng"=> 87)
    );
    
    //                       key               value
    foreach($marks_nums as $student_name => $marks_num){
        // marks_num store the names
        echo "Student: " . $student_name . "<br>";
        //                      key        value
        foreach($marks_num as $subject => $marks){
            echo $subject. " - ". $marks. "<br>";
        }
        echo "<br>";
    }

    // using an integer index, which isn't valid for associative arrays.
    echo $marks_nums["Rohit Singhla"]["Math"];

    // multidimensional array
    $students = array(
        array("name"=>"Suman", "age"=>22, "marks"=>90),
        array("name"=>"Anita", "age"=>21, "marks"=>50),
        array("name"=>"Sudip", "age"=>20, "marks"=>34)
    );

    // Display all student details
    foreach ($students as $student => $stu) {
        echo "Name: ". $stu["name"]. ", Age: ". $stu["age"]. ", Marks: ". $stu["marks"]. "<br>";
    }

    echo "Second Student's Details: Name: " . $students[1]["name"] . ", Age: " . $students[1]["age"] . ", Marks: " . $students[1]["marks"];

    /*$arr[0] = 12;
    $arr[1] = 45;
    $arr[2] = 33;
    $arr[3] = 78;
    $arr[4] = 22;
    $arr[5] = 99;
    echo arr[1]
    */

    // user input
    // If you're running this script in a command-line interface (CLI) | Terminal, then readline() will work fine.
    $name = readline("Enter your name: ");
    echo "Hello, ". $name. "!<br>";
    
    ?>
</body>
</html>
<!-- http://localhost/PHP43/01php/index.php -->