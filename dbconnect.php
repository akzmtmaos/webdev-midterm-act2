<?php
$servername = "localhost";
$username = "akzmtmaos"; 
$password = "akzm12345"; 
$dbname = "school";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>