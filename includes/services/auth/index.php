<?php

include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/functions/validateInput.php';

/*

Name: login
Description: Login function
Parameters: $conn - Database connection, $email - User email, $password - User password
Return:
    0 - Invalid input
    1 - No user with that email
    2 - Wrong password
    3 - Success
virsion: 1.0

*/

function login($conn, $email, $password) {
    if(!validateInput($email) || !validateInput($password)) {
        return 0;
    }

    $email = validateInput($email);
    $password = validateInput($password);
    $hashedPassword = sha1($password);
    $sql = "SELECT id, name, email, password, isAdmin from users WHERE email = '" . $email . "'";
    $result = $conn->query($sql);

    if($result->num_rows <= 0) {
        return 1;
    }

    $user = $result->fetch_assoc();
    if($hashedPassword != $user["password"]) {
        return 2;
    }

    $_SESSION["id"] = $user["id"];
    $_SESSION["name"] = $user["name"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["admin"] = $user["isAdmin"];
    header("Location: profile.php");
}

/*

Name: signup
Description: Signup function
Parameters: $conn - Database connection, $name - User name, $email - User email, $password - User password
Return:
    0 - Invalid input
    1 - Error
virsion: 1.0

*/



function signup($conn, $name, $email, $password) {
    if(!validateInput($name) || !validateInput($email) || !validateInput($password)) {
        return 0;
    }
    $name = validateInput($name);
    $email = validateInput($email);
    $password = validateInput($password);
    $hashedPassword = sha1($password);
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        return 1;
    }
    $sql = "INSERT INTO users (name, email, password) VALUES ('" . $name . "', '" . $email . "', '" . $hashedPassword ."')";
    if(!$conn->query($sql)) {
        return 2;
    }
    $_SESSION["id"] = $conn->insert_id;
    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    $_SESSION["admin"] = 0;
    header("Location: profile.php");
}
?>