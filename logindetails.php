<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
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

        input[type="text"], input[type="password"], input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-size: 14px;
        }

        .success-message {
            color: green;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Register</h2>

    <form method="POST">
        <label for="uname">Username:</label>
        <input type="text" name="uname" required><br>

        <label for="pass">Password:</label>
        <input type="password" name="pass" required><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" required><br>

        <button name="sub">Register</button>
    </form>

    <?php
    include "connection.php";
    if (isset($_POST['sub'])) {
        $n = $_POST['uname'];
        $d = $_POST['pass'];
        $g = $_POST['dob'];


        $s = "INSERT INTO `details`(`username`, `password`, `DOB`) VALUES ('$n', '$d', '$g')";
        $r = $connection->query($s);

        if ($r == true) {
            echo "<div class='success-message'>Registration successful! Redirecting to login...</div>";
            header('Location: login.php');
            exit;
        } else {
            echo "<div class='error-message'>Error while registering. Please try again.</div>";
        }
    }
    ?>
</div>

</body>
</html>
