<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,400&display=swap" rel="stylesheet">

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        html, body {
            font-family: 'Lora', serif;
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
        }

        .contain {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            padding: 10px;
            margin-bottom: 20px;
            border: 2px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 5px #ccc;
            font-style: italic;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            font-size: 18px;
            margin-bottom: 5px;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease;
            font-family: 'Lora', serif;
        }

        input[type="text"]:focus {
            border-color: #337ab7;
            outline: none;
        }

        .btn {
            background-color: #337ab7;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 5px;
            outline: none;
            transition: background-color 0.3s ease;
            font-weight: bold;
            font-size: 16px;
            font-family: 'Lora', serif;
        }

        .btn:hover {
            background-color: #286090;
        }

        .output {
            margin-top: 20px;
            font-size: 18px;
            text-align: center;
            color: #333;
        }

        @media (max-width: 768px) {
            .contain {
                padding: 15px;
                width: 100%;
            }

            h1 {
                font-size: 22px;
            }

            input[type="text"] {
                font-size: 14px;
            }

            .btn {
                font-size: 14px;
                padding: 8px 16px;
            }

            .output {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="contain">
        <h1><i>Taking input from the user</i></h1>

        <form name="form" method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <input class="btn" name="ok" type="submit" value="Submit">
        </form>

        <!-- Display PHP Output -->
        <div class="output">
            <?php
                if (isset($_POST['ok'])) {
                    $name = $_POST['name'];
                    echo "Hello, " . htmlspecialchars($name) . "! Your name has been submitted successfully.";
                }
            ?>
        </div>
    </div>
</body>
</html>
<!-- 
Key Characters Converted by htmlspecialchars():
& becomes &amp;
" becomes &quot;
' becomes &#039;
< becomes &lt;
> becomes &gt;
-->