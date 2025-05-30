<?php // This file is the admin login page.
session_start(); // Start the session

// Include the database connection
include 'dbConnect.php';

// Initialize the message variable
$message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT password FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);

    // Check if the username and password are correct
    if ($stmt->fetch() && password_verify($password, $hashedPassword)) {
        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php");
        exit;
    } else {
        // If the username and password are incorrect, show an error message
        $message = "Invalid login credentials.";
    }

    // Close the statement
    $stmt->close();
}
?>

<!-- HTML code for the admin login page -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the page -->
    <title>Admin Login - Business Directory</title>
    <link rel="icon" type="image/x-icon" href="business_directory.png">
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
        }
        .time-bar { 
            background: #f4f4f4; 
            padding: 5px 10px; 
            text-align: center; 
            font-size: 14px; 
        }
        .header { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            background: #333; 
            color: #fff; 
            padding: 10px 20px; 
        }
        .nav-links a { 
            margin: 0 10px; 
            color: #fff; 
            text-decoration: none; 
        }
        .footer { 
            background: #333; 
            color: #fff; 
            text-align: center; 
            padding: 10px; 
            position: fixed; 
            width: 100%; 
            bottom: 0; 
        }
        .logo { 
            height: 40px; 
        }
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #f9f9f9;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: left;
        }
        .login-container h2 {
            text-align: center; 
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%; 
            padding: 8px; 
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }
        .login-container input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="time-bar">
    <?php echo date("l, F j, Y - h:i A"); ?>
    </div>

    <div class="header">
        <div>
            <img src="business_directory.png" alt="Business Logo" class="logo">
        </div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="https://www.miagao.gov.ph/news-and-events/">Announcements</a>
            <a href="https://www.google.com/maps/place/Miagao,+Iloilo/data=!4m2!3m1!1s0x33ae5b8a7fae6ec5:0x4a967dd317139cb1?sa=X&ved=1t:242&ictx=111">Map</a>
        </div>
    </div>
    
    <div class="login-container">
        <h2>Admin Login</h2>
        <form method="POST" action="">
            <label>Username:</label><br>
            <input type="text" name="username" required><br><br>
            <label>Password:</label><br>
            <input type="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>
        <p style="color:red;"><?php echo $message; ?></p>
</div>
    <div class="footer">
    &copy; <?php echo date("Y"); ?> My Business Directory. All rights reserved.
</div>
</body>
</html>
