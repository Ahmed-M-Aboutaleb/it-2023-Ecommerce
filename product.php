<?php

/*

Variables:
    $pageTitle (string) - title of the page
    $cssFile (string) - name of the css file

*/

$pageTitle = "Shop - Product";
$cssFile = "product.css";

/*

Includes:
    /init.php - database connection, site url, site name, site description
    /includes/services/product/index.php - findOneProduct function
    /includes/services/category/index.php - findOneCategory function
    /includes/views/product.php - product view
    /includes/templates/footer.php - footer, html end tag

*/

include_once $_SERVER["DOCUMENT_ROOT"] ."/init.php";
include_once $_SERVER["DOCUMENT_ROOT"] ."/includes/services/product/index.php";
include_once $_SERVER["DOCUMENT_ROOT"] ."/includes/services/category/index.php";

/*

Code:
    if id is not set or is not numeric redirect to products.php
    call findOneProduct function from /includes/services/product/index.php
    call findOneCategory function from /includes/services/category/index.php

*/

if(!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: products.php");
}
$product = findOneProduct($conn, $_GET["id"]);
$category = findOneCategory($conn, $product["category"]);

include_once $_SERVER["DOCUMENT_ROOT"] ."/includes/views/product.php";
include_once $_SERVER["DOCUMENT_ROOT"] ."/includes/templates/footer.php";

?>