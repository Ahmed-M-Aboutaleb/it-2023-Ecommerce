<?php
$serverName = "localhost";
$username = "root";
$password = "";
$databaseName = "test2";

// Create connection
$conn = new mysqli($serverName, $username, $password, $databaseName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>