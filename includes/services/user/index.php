<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/functions/validateInput.php';

/*

Name: findUsers()
Description: This function will find all users in the database
Parameters: $conn (object)
version: 1.0

*/

function findUsers($conn) {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    if($result->num_rows <= 0) {
        return false;
    }
    return $result;
}

/*

Name: findOneUser()
Description: This function will find one user in the database
Parameters: $conn (object), $id (int)
version: 1.0

*/

function findOneUser($conn, $id) {
    if(!validateInput($id)) {
        header("Location: products.php");
        return false;
    }
    $id = validateInput($id);
    $sql = "SELECT * FROM users WHERE id = {$id} LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows <= 0) {
        header("Location: products.php");
        return false;
    } 
    $result = $result->fetch_assoc();
    return $result;
}

/*

Name: findThreeUsers()
Description: This function will find three users in the database
Parameters: $conn (object)
version: 1.0

*/

function findThreeUsers($conn) {
    $sql = "SELECT * FROM users ORDER BY id DESC LIMIT 3";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

/*

Name: findAdmins()
Description: This function will find all admins in the database
Parameters: $conn (object)
version: 1.0

*/

function findAdmins($conn) {
    $sql = "SELECT * FROM users WHERE isAdmin = '1'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

/*

Name: insertUser()
Description: This function will insert a user in the database
Parameters: $conn (object), $name (string), $email (string), $password (string), $isAdmin (int)
version: 2.1

*/

function insertUser($conn, $name, $email, $password, $isAdmin = 0,$date) {
    if(!validateInput($name) || !validateInput($email) || !validateInput($password) || !validateInput($date)) {
        return 0;
    }
    $name = validateInput($name);
    $email = validateInput($email);
    $password = validateInput($password);
    validateInput($isAdmin) ? $isAdmin = validateInput($isAdmin) : $isAdmin = 0;
    $date = validateInput($date);
    $password = sha1($password);
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        return 0;
    }
    $sql = "INSERT INTO users (name, email, password, isAdmin, date) VALUES ('$name', '$email', '$password', '$isAdmin', '$date')";
    $result = $conn->query($sql);
    if(!$result) {
        return 0;
    }
    return 1;
}

/*

Name: updateUser()
Description: This function will update a user in the database
Parameters: $conn (object), $id (int), $name (string), $email (string), $password (string)
version: 1.5

*/

function updateUser($conn, $id, $name, $email, $password, $admin, $date) {
    $name = validateInput($name);
    $email = validateInput($email);
    $password = validateInput($password);
    validateInput($admin) ? $admin = validateInput($admin) : $admin = 0;
    if(!validateInput($id) || !validateInput($name) || !validateInput($email) ) {
        return false;
    }
    if(!$password) {
        $sql = "UPDATE users SET name = '$name', email = '$email', isAdmin = '$admin', date='$date' WHERE id = $id";
        $result = $conn->query($sql);
        if(!$result) {
            return 0;
        } 
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        return 1;
    }
    if(!validateInput($password)) {
        return 0;
    }
    $password = sha1($password);
    $sql = "UPDATE users SET name = '$name', email = '$email', password = '$password', isAdmin = '$admin', date='$date' WHERE id = $id";
    $result = $conn->query($sql);
    if(!$result) {
        return 0;
    }
    if($id == $_SESSION["id"]) {
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
    }
    return 1;
}

/*

Name: deleteUser()
Description: This function will delete a user in the database
Parameters: $conn (object), $id (int)
version: 1.0

*/

function deleteUser($conn, $id) {
    if(!validateInput($id)) {
        return 0;
    }
    $id = validateInput($id);
    $sql = "DELETE FROM users WHERE id = $id";
    $result = $conn->query($sql);
    if(!$result) {
        return 0;
    }
    if($id == $_SESSION["id"]) {
        header("Location: /logout.php");
    }
    return 1;
}

/*

Name: getUsersCount()
Description: This function will count the number of users in the database
Parameters: $conn (object)
version: 1.0

*/

function getUsersCount($conn) {
    $sql = "SELECT COUNT(*) AS count FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows <= 0) {
        return false;
    } 
    $result = $result->fetch_assoc();
    return $result['count'];
}

?>