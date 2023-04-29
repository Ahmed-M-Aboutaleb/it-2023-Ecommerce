<?php

/*

Variables:
    $pageTitle (string) - title of the page
    $cssFile (string) - name of the css file

*/

$pageTitle = "Admin Dashboard";
$cssFile = "index.admin.css";

/*

Includes:
    /init.php - database connection, site url, site name, site description
    /includes/services/product/index.php - getProductsCount function
    /includes/services/user/index.php - getUsersCount function
    /includes/services/category/index.php - getCategoriesCount function
    /includes/services/order/index.php - getOrdersCount function
    /includes/views/admin/home.php - home view
    /includes/templates/footer.php - footer, html end tag

*/


    include_once $_SERVER["DOCUMENT_ROOT"] .'/init.php';
    include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/product/index.php';
    include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/user/index.php';
    include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/category/index.php';
    include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/order/index.php';

/*

Code:
    display home view

*/

?>

<?php include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/home.php'; ?>

<?php
    include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php';
?>