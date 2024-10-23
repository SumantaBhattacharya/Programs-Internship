C:\Users\SUDIP BHATTACHARYA>php -v
PHP 8.2.12 (cli) (built: Oct 24 2023 21:15:15) (ZTS Visual C++ 2019 x64)
Copyright (c) The PHP Group
Zend Engine v4.2.12, Copyright (c) Zend Technologies

C:\Users\SUDIP BHATTACHARYA>cd D:\xampp\htdocs\PHP43\01php

C:\Users\SUDIP BHATTACHARYA>D:

D:\xampp\htdocs\PHP43\01php>php index.php

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    Hello World<br />Hello<br />12<br />Hello WORLD<br />Minimum is 23
  </body>
</html>
<!-- http://localhost/PHP43/01php/index.php -->
```

## **_Different Types of Loop_**

### **_do-while loop_**

- **_Loops through a block of code once. repeats the loop as long as specified conditions is true_**

### **_while loop_**

- **_Loops through a block of code while a specified conditions is true_**

### **_foreach loop_**

- **_Loops through a block of code for each element in an array_**

```Markdown
Let's go through a dry run of the given code step-by-step to understand how it works for a specific number, say `1234`.

### Code

while ($number >= 1) {
    $rem = $number % 10;        // Get the last digit (remainder)
    $rev = $rev * 10 + $rem;    // Build the reversed number
    $number = ($number / 10);   // Remove the last digit
}


### Initial Values
- `$number = 1234`
- `$rev = 0`

### Iteration 1:
- **Condition**: `1234 >= 1` → True, so the loop runs.
- **Remainder**: `$rem = 1234 % 10 = 4` (last digit is 4).
- **Build Reversed Number**: `$rev = 0 * 10 + 4 = 4` (reversed number becomes `4`).
- **Update $number**: `$number = 1234 / 10 = 123.4` (PHP converts it to `123` since it's being used in an integer context).

### Iteration 2:
- **Condition**: `123 >= 1` → True, so the loop runs.
- **Remainder**: `$rem = 123 % 10 = 3` (last digit is 3).
- **Build Reversed Number**: `$rev = 4 * 10 + 3 = 43`.
- **Update $number**: `$number = 123 / 10 = 12.3` (converted to `12`).

### Iteration 3:
- **Condition**: `12 >= 1` → True, so the loop runs.
- **Remainder**: `$rem = 12 % 10 = 2` (last digit is 2).
- **Build Reversed Number**: `$rev = 43 * 10 + 2 = 432`.
- **Update $number**: `$number = 12 / 10 = 1.2` (converted to `1`).

### Iteration 4:
- **Condition**: `1 >= 1` → True, so the loop runs.
- **Remainder**: `$rem = 1 % 10 = 1` (last digit is 1).
- **Build Reversed Number**: `$rev = 432 * 10 + 1 = 4321`.
- **Update $number**: `$number = 1 / 10 = 0.1` (converted to `0`).

### Iteration 5:
- **Condition**: `0 >= 1` → False, the loop exits.

### Final Values:
- `$rev = 4321`
- `$number = 0`

### Output:
The final reversed number is `4321`.

### Summary:
1. Start with `$number = 1234`.
2. Extract the last digit and append it to `$rev` in each iteration.
3. Remove the last digit from `$number` after each iteration.
4. Loop continues until `$number` becomes less than `1`.
5. The final reversed number is `4321`.

```

Let's go through a **dry run** of your PHP program step-by-step to understand how the maximum and minimum values are found from the array:

### Code:
```php
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

echo "Maximum Number: " . $max . "<br>";
echo "Minimum Number: " . $min . "<br>";
```
```Markdown
### Initial Values:
- `$numbers = array(1, 4, 7, 2, 9, 5, 6)`
- `$max = 1` (initialized to the first element of the array).
- `$min = 1` (initialized to the first element of the array).

### Iteration 1:
- **Current $number**: 1
- **Check for Max**: `1 > 1` → False, so `$max` remains `1`.
- **Check for Min**: `1 < 1` → False, so `$min` remains `1`.

### Iteration 2:
- **Current $number**: 4
- **Check for Max**: `4 > 1` → True, so `$max` is updated to `4`.
- **Check for Min**: `4 < 1` → False, so `$min` remains `1`.

### Iteration 3:
- **Current $number**: 7
- **Check for Max**: `7 > 4` → True, so `$max` is updated to `7`.
- **Check for Min**: `7 < 1` → False, so `$min` remains `1`.

### Iteration 4:
- **Current $number**: 2
- **Check for Max**: `2 > 7` → False, so `$max` remains `7`.
- **Check for Min**: `2 < 1` → False, so `$min` remains `1`.

### Iteration 5:
- **Current $number**: 9
- **Check for Max**: `9 > 7` → True, so `$max` is updated to `9`.
- **Check for Min**: `9 < 1` → False, so `$min` remains `1`.

### Iteration 6:
- **Current $number**: 5
- **Check for Max**: `5 > 9` → False, so `$max` remains `9`.
- **Check for Min**: `5 < 1` → False, so `$min` remains `1`.

### Iteration 7:
- **Current $number**: 6
- **Check for Max**: `6 > 9` → False, so `$max` remains `9`.
- **Check for Min**: `6 < 1` → False, so `$min` remains `1`.

### Final Values:
- **Maximum**: `$max = 9`
- **Minimum**: `$min = 1`

### Output:

Maximum Number: 9
Minimum Number: 1


### Summary:
- The program starts by assuming the first element is both the maximum and minimum.
- It then loops through the array and compares each element:
  - If an element is greater than the current maximum, the maximum is updated.
  - If an element is smaller than the current minimum, the minimum is updated.
- Finally, the maximum and minimum values are printed.
```

## ***PHP Array***
### ***What is array?***
- *An array is a data structure that contains a group of elements.*
- ***All the elements are stored in  contigious memory location***
- ***It supports heterogeneous data type***

### ***Different Types of Array***
(***PHP Arrays***)----> [*Indexed Arrays*] [*Associative Arrays*] [*Multidimentional Arrays*] 

## ***Associative Arrays***
* *An associative array, each ID or key is associated with a value.*
* *When storing data about specific named values, a numerical array is not always the best way to do it*
* *With associative arrays we can use the values as keys and assign values to them*

## ***Multidimentional Arrays***
* *In a multidimentional array, each element in the main array can also be an array*
* *And each element in the sub-array can be an array, and so on*

## ***HTTP Parameters***
* *Part of the goal of PHP is to make interacting with HTTPO and HTML, as easy as possible*
* *PHP processes the incoming HTTP Request based on the protocol specifications and drops the data into various super global variables*

## ***HTTP Parameters & Array***
``` 
HTTP                -> $_GET
Parameters          -> $_POST
                    -> $_REQUEST
```

