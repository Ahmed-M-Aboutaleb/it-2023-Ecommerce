<?php 

/*

Variables:
    $pageTitle (string) - title of the page
    $orders (array) - array of orders

*/

$pageTitle = "Orders Dashboard";

/*

Includes:
    /init.php - database connection, site url, site name, site description
    /includes/services/order/index.php - findOrders function
    /includes/views/admin/orders.php - orders table
    /includes/templates/footer.php - footer, html end tag

*/

include_once $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/order/index.php';

/*

Code:
    call findOrders function from /includes/services/order/index.php

*/

$orders = findOrders($conn);
?>

<?php include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/orders.php'; ?>

<?php include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php'; ?>