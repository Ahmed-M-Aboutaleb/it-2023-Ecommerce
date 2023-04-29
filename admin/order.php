<?php 

/*

Variables:
    $pageTitle (string) - title of the page
    $error (string) - error message
    $users (array) - array of users
    $products (array) - array of products
    $order (array) - array of order

*/

$pageTitle = "Order Dashboard";
$error = "";

/*

Includes:
    /init.php - database connection, site url, site name, site description
    /includes/services/order/index.php - findOrders, findOneOrder, insertOrder, updateOrder, deleteOrder functions
    /includes/services/user/index.php - findUsers function
    /includes/services/product/index.php - findProducts function
    /includes/views/admin/orderView.php - order view
    /includes/views/admin/orderAdd.php - order add view
    /includes/templates/footer.php - footer, html end tag

*/

include_once $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/order/index.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/user/index.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/product/index.php';

/*

Code:
    call findUsers, findProducts, findOneOrder, insertOrder, updateOrder, deleteOrder functions from /includes/services/order/index.php, /includes/services/user/index.php, /includes/services/product/index.php
    check if $_POST['update'] is set
        call updateOrder function from /includes/services/order/index.php
        set $error to "Error Updating" if updateOrder function returns false
        set $error to "Updated Successfully" if updateOrder function returns true
    check if $_POST['add'] is set
        call insertOrder function from /includes/services/order/index.php
        set $error to "Error Adding" if insertOrder function returns false
        set $error to "Added Successfully" if insertOrder function returns true
    check if $_GET['delete'] is set
        call deleteOrder function from /includes/services/order/index.php
        set $error to "Error Deleting" if deleteOrder function returns false
        set $error to "Deleted Successfully" if deleteOrder function returns true
    check if $_GET['id'] is set
        call findOneOrder function from /includes/services/order/index.php
        set $order to the returned value
        include /includes/views/admin/orderView.php
    else
        include /includes/views/admin/orderAdd.php

*/

$users = findUsers($conn);
$products = findProducts($conn);

if(isset($_POST['update'])) {
    $user = $_POST['user'];
    $product = $_POST['product'];
    $totalPrice = $_POST['totalPrice'];
    $status;
    isset($_POST['date']) && $_POST['date'] != '' ? $date = $_POST['date'] : $date = date("Y-m-d");
    isset($_POST['status']) && $_POST['status'] == "on" ? $status = 1 : $status = 0;
    if(!updateOrder($conn, $_GET['id'], $user, $totalPrice, $product, $status, $date)){
        $error = "Error Updating";
    } else {
        $error = "Updated Successfully";
    }
}

if(isset($_POST['add'])) {
    $user = $_POST['user'];
    $product = $_POST['product'];
    $totalPrice = $_POST['totalPrice'];
    $status;
    isset($_POST['date']) && $_POST['date'] != '' ? $date = $_POST['date'] : $date = date("Y-m-d");
    isset($_POST['status']) && $_POST['status'] == "on" ? $status = 1 : $status = 0;
    if(!insertOrder($conn, $user, $totalPrice, $product, $status, $date)){
        $error = "Error Adding";
    } else {
        $error = "Added Successfully";
    }
}

if(isset($_GET['delete'])) {
    if(!deleteOrder($conn, $_GET['delete'])){
        $error = "Error Deleting";
    } else {
        $error = "Deleted Successfully";
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $order = findOneOrder($conn, $id);
    include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/orderView.php';
} else {
    include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/orderAdd.php';
}
?>

<?php include_once $_SERVER["DOCUMENT_ROOT"]. '/includes/templates/footer.php' ?>