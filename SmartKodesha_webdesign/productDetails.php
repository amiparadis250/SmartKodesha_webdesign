<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartKodesha/Product details</title>
    <link rel="shortcut icon" href="images/logoQuality.jpeg" type="x/icons">
    <link rel="stylesheet" href="productDetails.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<?php
    
    // Include your database connection file
    include "connector.php";
    
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $fullnames = $_POST['FirstName'];
        $email = $_POST['Client-email'];
        $telephone = $_POST['Telephone'];
        $arrivalDate = $_POST['checkin-date'];
        $departureDate = $_POST['checkout-date'];
        $message = $_POST['comments'];
    
        // You may want to perform additional validation and sanitation here
    
        // Insert data into the database
        $sql = "INSERT INTO messages (Fullnames, Email, Telephone, Arrival, Departure, Comments) VALUES (?, ?, ?, ?, ?, ?)";
        // Assuming you have a database connection object named $conn
        $stmt = $conn->prepare($sql);
    
        // Bind parameters
        $stmt->bind_param("ssssss", $fullnames, $email, $telephone, $arrivalDate, $departureDate, $message);
    
        // Execute the statement
        $stmt->execute();
    
        // Close the statement
        $stmt->close();
    }
    
    // Redirect back to the previous page (you may want to redirect to a thank-you page)
   //  header("Location: ".$_SERVER['HTTP_REFERER']);
   //  exit();
    ?>

    <div class="header-product">
        <img src="images/mylogo.png" alt="logo" >
        <a href="index.html">Home</a>
        <a href="#">Login</a>
        <a href="index.html#ruri-comments">Reviews</a>
        <a href="index.html">Find other house</a>
        <div class="searchproduct">
            <div class="topdetails">
                <input type="search" placeholder="Search another Type of house here.....">
                <i class="fa-solid fa-magnifying-glass fa-beat"></i>
            </div>
        </div>
    </div>
<!-- trying to add product details -->
    <div class="productdetails">
        <div class="right">
            <div class="photo">
                <img src="Classic image/digital-marketing-agency-ntwrk-g39p1kDjvSY-unsplash.jpg" width="500px" alt="House For rent">
            </div>
            <div class="productInfo">
                <div class="information">
                <p><strong>Type of House</strong>:Single-Family House</p>
                <p><strong>Location</strong>:Rebero,Kigali,Rwanda</p>
                <p><strong>Price</strong>:900,000Rwf/Month</p>
                <p><strong>Host</strong>:Abdlahh ISHIMWE</p>
                <p><strong>Telephone</strong>:0791966291</p>
                <p><strong>Email</strong>:Abdlahh23@gmail.com</p>
                <p><strong>Number of Rooms</strong>:5</p>
                <p>Ratings:
                    <i class="fa-solid fa-star checked"></i>
                    <i class="fa-solid fa-star checked"></i>
                    <i class="fa-solid fa-star checked"></i>
                    <i class="fa-solid fa-star checked"></i>
                </p>

            </div>
            <div class="landlordtips">
                
            </div>
        </div>
            <div class="descrption">
              <p style="color:blue;font-size: 24px;">Tips for house</p>
              
                <p><i class="fa-solid fa-dog"></i>&nbsp;No Dogs allowed</p>
                <p><i class="fa-solid fa-torii-gate"></i>&nbsp;Located inside gate</p>
                <p><i class="fa-solid fa-person-swimming"></i>&nbsp;Swimming pool</p>
                <p><i class="fa-solid fa-bed"></i>&nbsp;Matelas and Bed included</p>
            
            </div>

        </div>
        <div class="left-contactLandlord">
            <form action="" method="post">
                <legend>Contact <span>Landlord</span></legend>
                <label for="Client-names">Fullnames:</label>
                <input type="text" name="FirstName" placeholder="Enter your Fullnames" required="required"><br>
                <label for="Client-email">Email:</label>
                <input type="email" name="Client-email" placeholder="Enter your Email" required="required"><br>
                <label for="Client-Telephone">Telephone:</label>
                <input type="number" name="Telephone" placeholder="ex:+25075752"><br>
                <label for="Checkin">Arrival date</label>
                <input type="date" name="checkin-date" placeholder="4/5/2005"><br>
                <label for="Checkout">Departure date(Skip this if you don't know exact time )</label>
                <input type="date" name="checkout-date" placeholder="4/5/2005"><br>
                <label for="message">Leave message</label>
                <textarea id="comments" name="comments" placeholder="Leave message here..">
                    
                    </textarea>
                
             <button onclick="alert('Thank you for contacting Landlord, check your email, and We as SmartKodesha, to find Your perfect home is Our Aims ')">Submit</button>
                 
            </form>
        </div>
     
    

</body>

</html>