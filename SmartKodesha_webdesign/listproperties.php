<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logoQuality.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Dashboard.css">
    <title>Landlord</title>
</head>
<style>
     a >p{
            text-decoration: none;
            color: white;
        }
        a{
            text-decoration: none;
        }
    .right {
        padding: 20px;
        text-align: center;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        background-color: #f5f5f5;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form p {
        margin-bottom: 1px;
    }

    input[type="text"],
    input[type="file"] {
        width: calc(100% - 20px);
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 4px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 95%;
    }

    button:hover {
        background-color: #45a049;
    }
</style>



<body>
    <div class="container">
        <div class="left">
            <div class="search">
                <input type="search" size="20px">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>

            <div class="contents">
                <i class="fa-solid fa-user"></i>
               <a href="landlord.html"><p>Profile</p></a> 
            </div>
            <div class="contents">
                <i class="fa-regular fa-pen-to-square"></i>
                <a href="manage.html"><p>Manage properties</p></a>
            </div>
            <div class="contents">
                <i class="fa-solid fa-upload"></i>
                <a href="listproperties.html"><p>List Properties</p></a>
            </div>
            <div class="contents">
                <i class="fa-solid fa-envelope"></i>
                <a href="notifications.html"><p>Notifications</p></a>
            </div>
            <div class="contents">
                <i class="fa-solid fa-right-from-bracket"></i>
                <p>Logout</p>
            </div>
        </div>
        <div class="right">
            <h2>Welcome here to upload your new image</h2>
            <h4>This only chance to get people kmow what you do</h4>
            <form  action =""method="post">
             <p>
                House Name:
                <input type="text">
             </p>
             House type:
             <input type="text">
          </p>
          ratings:
          <input type="text">
       </p>
       House price:
       <input type="text">
    </p>
    House Location
    <input type="text">
 </p>
</p>
House Image:
<input type="file">
<input type="file">

</p>
<button>UPLOAD</button>
            </form>

        </div>
        </div>
        <?php
include "connector.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape and sanitize input values
    $houseName = mysqli_real_escape_string($conn, $_POST["house_name"]);
    $houseType = mysqli_real_escape_string($conn, $_POST["house_type"]);
    $ratings = mysqli_real_escape_string($conn, $_POST["ratings"]);
    $housePrice = mysqli_real_escape_string($conn, $_POST["house_price"]);
    $houseLocation = mysqli_real_escape_string($conn, $_POST["house_location"]);

    // Insert into the HOUSE table
    $insertSql = "INSERT INTO houses (House_Name, `House type`, ratings, Price, Location) 
                  VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("sssss", $houseName, $houseType, $ratings, $housePrice, $houseLocation);

    if ($stmt->execute()) {
        $lastInsertedId = $conn->insert_id;

        // Handle image uploads
        if (!empty($_FILES["house_image"]["name"])) {
            $imageDirectory = "uploads/"; // Change this to your desired directory
            if (!is_dir($imageDirectory)) {
                mkdir($imageDirectory, 0777, true);
            }

            $imageTmp = file_get_contents($_FILES["house_image"]["tmp_name"]);

            // Insert image details into the database
            $imageSql = "INSERT INTO house_images (house_id, Image1) 
                         VALUES (?, ?)";
            $imageStmt = $conn->prepare($imageSql);
            $imageStmt->bind_param("is", $lastInsertedId, $imageTmp);
            $imageStmt->execute();
        }

        echo "House details uploaded successfully.";
    } else {
        echo "Error uploading house details: " . $stmt->error;
    }

    // Close the statements
    $stmt->close();
    $imageStmt->close();

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request";
}
?>

</body>
</html>      
