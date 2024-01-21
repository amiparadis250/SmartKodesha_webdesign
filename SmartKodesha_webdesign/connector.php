<?php
// create my connection mydatabase
$dbname = 'smartkosesha';
$servername = 'localhost';
$username = 'root';
$password = '';

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
} else {
    // echo "Connection successful";
}
?>