<?php
$servername = "localhost";
$username = "saignaneswarj";
$password = "Gnaneswar@2002";
$dbname = "Project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    // echo "connected";
}
?>
