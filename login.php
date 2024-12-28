<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 320px;
            text-align: center;
        }

        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        label {
            font-size: 14px;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Login</h2>

    <form method="POST">
        <label for="uname">Username:</label>
        <input type="text" name="uname" required><br>

        <label for="pass">Password:</label>
        <input type="password" name="pass" required><br>

        <button name="sub">Login</button>
    </form>

    <?php
    include "connection.php";  

    if (isset($_POST['sub'])) {
        $n = $_POST['uname'];   
        $d = $_POST['pass'];  

        // Secure the query to prevent SQL injection
        $sql = "SELECT * FROM `details` WHERE `username` = '$n' AND `password` = '$d'";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            // Redirect to the dashboard on successful login
            header('Location: dashboard.php');
            exit;
        } else {
            // Display error message if login fails
            echo '<div class="error-message">Invalid credentials</div>';
        }
    }
    ?>
</div>

</body>
</html>
