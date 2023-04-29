<?php 

/*

Variables:
    $pageTitle (string) - title of the page
    $cssFile (string) - name of the css file

*/

$pageTitle = "Products Dashboard";
$cssFile = "products.admin.css";

/*

Includes:
    /init.php - database connection, site url, site name, site description
    /includes/services/product/index.php - findProducts function
    /includes/views/admin/products.php - products table
    /includes/templates/footer.php - footer, html end tag

*/

include_once $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/product/index.php';

/*

Code:
    call findProducts function from /includes/services/product/index.php

*/

$products = findProducts($conn);
?>

<?php include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/products.php'; ?>

<?php include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php'; ?>