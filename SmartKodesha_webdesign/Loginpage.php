<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/SmartKodesha</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="shortcut icon" href="images/logoQuality.jpeg" type="x/icons">
        <link rel="stylesheet" href="Loginpage.css">
</head>
<body>
<div class="Login-header">
<img src="images/mylogo.png" alt="SmartKodesha-Logo" width="130px" height="25px">
<a href="index.php">Home</a>
<a href="Loginpage.php">Host</a>
<a href="index.html">FAQS</a>
</div>
<div class="login-container">
    <div class="left">
        <div class="login-form">
        <form action="register.php">
            <h3>Login</h3>
            <h5>Doesn't have account yet? <a href="Register.php">Signup</a></h5>
            <p>Email Address/Username:<br>
              <input  id="cd-" type="text" name="Username" required="required">
            </p>
            <p>
                Password:<br>
                <input  id="cd-" type="password" name="password" required="required"><br>
                <span style="color:blue;">Forget password</span>
            </p>
           <p><input id="checkebox-remember" type="checkbox">&nbsp;Remember me</p> 
            <button style="width: 80px;" onclick="alert('Fill the Form correctly')">Login</button><br>
            <button id="login-withgoogle" style="background-color: blue; color: #ffffff; border: none; padding: 10px 15px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 4px;">
                <img src="gifImage/googlelogin.jpg" width="25px" alt="googlelogin" style="margin-right: 10px;">
                Login with Google
              </button>
              
    
            </form>
        </div>
    </div>
    <div class="right">
        
    </div>
</div>
<?php

// Start session
session_start();

// Connect to the database (replace these values with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smartkosesha";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredUsername = $_POST["Username"];
    $enteredPassword = $_POST["password"];

    // Fetch user data from the database
    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $enteredUsername);
    $stmt->execute();
    $stmt->bind_result($username, $hashedPassword);
    $stmt->fetch();
    $stmt->close();

    // Validate credentials
    if ($username && password_verify($enteredPassword, $hashedPassword)) {
        // Successful login
        $_SESSION["username"] = $enteredUsername;
        header("Location: landlord.html"); // Redirect to the landlord.html page
        exit();
    } else {
        // Invalid login
        echo "Invalid username or password";
    }
}

// Close the database connection
$conn->close();
?>

?>
    
</body>
</html>