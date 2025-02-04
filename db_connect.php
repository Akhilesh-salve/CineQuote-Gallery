<?php
$host = "localhost";  // Change if your DB is hosted remotely
$username = "root";   // Default for XAMPP, change if needed
$password = "";       // Default is empty for XAMPP
$database = "movie_quotes_db";  

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
