<?php

/*

Variables:
    $serverName (string) - server name
    $username (string) - username
    $password (string) - password
    $databaseName (string) - database name
    $conn (object) - connection object

*/

$serverName = "localhost";
$username = "root";
$password = "";
$databaseName = "shopDB";

// Create connection
$conn = new mysqli($serverName, $username, $password, $databaseName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
