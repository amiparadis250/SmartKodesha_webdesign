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
        <link rel="stylesheet" href="Register.css">
        
</head>
<body>
<div class="Login-header">
<img src="images/mylogo.png" alt="SmartKodesha-Logo"  width="130px" height="25px">
<a href="index.html">Home</a>
<a href="register.php">Host</a>
<a href="index.html#faq">FAQS</a>
</div>
<div class="login-container">
    <div class="left">
        <div class="login-form">
        <form action="register.php" method="POST">
            <h3>Signup</h3>
            <h5>Login instead <a href="Loginpage.php">login</a></h5>
            <p>Fullnames<br>
                <input  id="cd-" type="text" name="names" required="required" placeholder="INGABIRE Bruno">
              </p>
              <p>
            <p>Email Address<br>
              <input  id="cd-" type="text" name="Username" required="required" placeholder="enter valid Email">
            </p>
            <p>
                <p>Sex:<br>
                    <input type="radio" name="sex" value="male">Male
                    <input type="radio" name="sex" value="female">Female

                </p>
                Password:<br>
                <input  id="cd-" type="password" name="password" required="required" placeholder="Use strong password"><br>
            
            </p>
            <p>Telephone:<br>
                <input id="cd-"  type="number" name="telephone" placeholder="+250791966291">

            </p>
           <p><input id="checkebox-gender" type="checkbox">&nbsp;Landlords
            <input id="checkebox-gender" type="checkbox">&nbsp;Tenants
        
        </p> 
        <p>Address:<br>
            <input type="text" placeholder="Nyarugenge,Rwanda" id="cd-"name="adress" >

        </p>
        <p>Date Of birth:<br>
            <input type="date" id="cd-" placeholder="Enter your date of birth" name="date">

        </p>
            <button style="width: 80px;" type="submit">Signup</button><br>
            <button id="login-withgoogle" style="background-color: blue; color: #ffffff; border: none; padding: 10px 15px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 4px;">
                <img src="gifImage/googlelogin.jpg" width="25px" alt="googlelogin" style="margin-right: 10px;">
                Continue with Google
              </button>
              
    
            </form>
        </div>
    </div>
    <div class="right">
        
    </div>
</div>

  <?php
  // Establish a database connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "smartkosesha";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Check the connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  // Handle form submission
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $fullnames = $_POST["names"];
      $email = $_POST["Username"];
      $sex = $_POST["sex"];
      $pin = $_POST["password"];
      $telephone = $_POST["telephone"];
      $address = $_POST["adress"];
      $date_of_birth = $_POST["date"];
  
      // Prepare and execute the SQL query
      $stmt = $conn->prepare("INSERT INTO guests (fullnames, email, sex, pin, telephone, adress, date) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssiss", $fullnames, $email, $sex, $pin, $telephone, $address, $date_of_birth);
  
      if ($stmt->execute()) {
        echo '<script>alert("Signup successful!");</script>';
    } else {
        echo "Error: " . $stmt->error;
    }
    
  
      $stmt->close();
  }
  
  // Close the database connection
  $conn->close();
  ?>
  
  ?>  
</body>
</html>