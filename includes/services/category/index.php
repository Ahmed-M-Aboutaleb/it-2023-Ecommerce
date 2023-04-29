<?php

include_once $_SERVER['DOCUMENT_ROOT'] .'/includes/functions/validateInput.php'; // include validation file

/*

Name: findCategories()
Description: This function will find all categories in the database
Parameters: $conn (object)
version: 1.0

*/

function findCategories($conn) {
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    if($result->num_rows <= 0) {
        return false;
    }
    return $result;
}

/*

Name: findOneCategory()
Description: This function will find one category in the database
Parameters: $conn (object), $id (int)
version: 1.0

*/

function findOneCategory($conn, $id) {
    if(!validateInput($id)) {
        return false;
    }
    $id = validateInput($id);
    $sql = "SELECT * FROM categories WHERE id = {$id} LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows <= 0) {
        return false;
    } 
    $result = $result->fetch_assoc();
    return $result;
}

/*

Name: findThreeCategories()
Description: This function will find three categories in the database
Parameters: $conn (object)
version: 1.0

*/

function findThreeCategories($conn) {
    $sql = "SELECT * FROM categories ORDER BY id DESC LIMIT 3";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

/*

Name: insertCategory()
Description: This function will insert one category in the database
Parameters: $conn (object), $name (string), $date (string), $admin (string)
version: 1.0

*/

function insertCategory($conn, $name, $date, $admin) {
    if(!validateInput($name) || !validateInput($date) || !validateInput($admin)) {
        return false;
    }
    $name = validateInput($name);
    $date = validateInput($date);
    $admin = validateInput($admin);
    $sql = "INSERT INTO categories (name, date, user) VALUES ('{$name}', '{$date}', '{$admin}')";
    $result = $conn->query($sql);
    if(!$result) {
        return false;
    }
    return true;
}

/*

Name: updateCategory()
Description: This function will update one category in the database
Parameters: $conn (object), $id (int), $name (string), $date (string), $admin (string)
version: 1.0

*/

function updateCategory($conn, $id, $name, $date, $admin) {
    if(!validateInput($id) || !validateInput($name) || !validateInput($date) || !validateInput($admin)) {
        return false;
    }
    $id = validateInput($id);
    $name = validateInput($name);
    $date = validateInput($date);
    $admin = validateInput($admin);
    $sql = "UPDATE categories SET name = '{$name}', date = '{$date}', user = '{$admin}' WHERE id = {$id}";
    $result = $conn->query($sql);
    if(!$result) {
        return false;
    }
    return true;
    
}

/*

Name: deleteCategory()
Description: This function will delete one category in the database
Parameters: $conn (object), $id (int)
version: 1.0

*/

function deleteCategory($conn, $id) {
    if(!validateInput($id)) {
        return false;
    }
    $id = validateInput($id);
    $sql = "DELETE FROM categories WHERE id = {$id}";
    $result = $conn->query($sql);
    if(!$result) {
        return false;
    }
    return true;
}

/*

Name: getCategoriesCount()
Description: This function will get the count of categories in the database
Parameters: $conn (object)
version: 1.0

*/

function getCategoriesCount($conn) {
    $sql = "SELECT COUNT(*) AS count FROM categories";
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