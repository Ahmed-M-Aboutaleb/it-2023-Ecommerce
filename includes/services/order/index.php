<?php

include_once($_SERVER["DOCUMENT_ROOT"] .'/includes/functions/validateInput.php');

/*

Name: findOrders()
Description: This function will find all orders in the database.
Parameters: $conn - The database connection.
Version: 1.0

*/

function findOrders($conn) {
    $sql = "SELECT * FROM orders";
    $result = $conn->query($sql);
    if($result->num_rows <= 0) {
        return false;
    }
    return $result;
}

/*

Name: findOneOrder()
Description: This function will find one order in the database.
Parameters: $conn - The database connection. $id - The id of the order.
Version: 1.0
    
*/

function findOneOrder($conn, $id) {
    if(!validateInput($id)) {
        header("Location: orders.php");
    }
    $id = validateInput($id);
    $sql = "SELECT * FROM orders WHERE id = $id LIMIT 1";
    $result = $conn->query($sql);
    if($result->num_rows <= 0) {
        return false;
    }
    $result = $result->fetch_assoc();
    return $result;
}

/*

Name: findThreeOrders()
Description: This function will find three orders in the database
Parameters: $conn (object)
version: 1.0

*/

function findThreeOrders($conn) {
    $sql = "SELECT * FROM orders ORDER BY id DESC LIMIT 3";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

/*

Name: insertOrder()
Description: This function will insert an order into the database.
Parameters: $conn - The database connection. $user - The user id. $product - The product id. $status - The status of the order. $date - The date of the order.
Version: 1.0
    
*/

function insertOrder($conn, $user, $totalPrice, $product, $status, $date) {
    if(!validateInput($user) || !validateInput($totalPrice) || !validateInput($product) || !validateInput($date)) {
        return false;
    }
    $user = validateInput($user);
    $totalPrice = validateInput($totalPrice);
    $product = validateInput($product);
    $status = validateInput($status);
    $date = validateInput($date);
    $sql = "INSERT INTO orders (user, totalPrice, productId, status, date) VALUES ('$user', '$totalPrice', '$product', '$status', '$date')";
    if(!$conn->query($sql)) {
        return false;
    }
    return true;
}

/*

Name: updateOrder()
Description: This function will update an order in the database.
Parameters: $conn - The database connection. $id - The id of the order. $user - The user id. $product - The product id. $status - The status of the order. $date - The date of the order.
Version: 1.0
*/

function updateOrder($conn, $id, $user, $totalPrice, $product, $status, $date) {
    if(!validateInput($id) || !validateInput($user) || !validateInput($totalPrice) || !validateInput($product) || !validateInput($date)) {
        return false;
    }
    $id = validateInput($id);
    $user = validateInput($user);
    $totalPrice = validateInput($totalPrice);
    $product = validateInput($product);
    $status = validateInput($status);
    $date = validateInput($date);
    $sql = "UPDATE orders SET user = '$user', totalPrice = '$totalPrice', productId = '$product', status = '$status', date = '$date' WHERE id = $id";
    if(!$conn->query($sql)) {
        return false;
    }
    return true;
}

/*

Name: deleteOrder()
Description: This function will delete an order from the database.
Parameters: $conn - The database connection. $id - The id of the order.
Version: 1.0
    
*/

function deleteOrder($conn, $id) {
    if(!validateInput($id)) {
        return false;
    }
    $id = validateInput($id);
    $sql = "DELETE FROM orders WHERE id = $id";
    if(!$conn->query($sql)) {
        return false;
    }
    return true;
}

/*

Name: getOrdersCount()
Description: This function will get the number of orders in the database.
Parameters: $conn - The database connection.
Version: 1.0

*/

function getOrdersCount($conn) {
    $sql = "SELECT COUNT(*) AS count FROM orders";
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