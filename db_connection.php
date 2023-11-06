<?php
// Define the database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rms";

// Create a new database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>