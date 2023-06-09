<?php 

/*

Variables:
    $pageTitle (string) - title of the page
    $cssFile (string) - name of the css file
    $searchProduct (string) - search input value
    $categoryFilter (string) - category input value

*/

$pageTitle = "Shop - Products page";
$cssFile = "products.css";
if(isset($_GET["search"]))
    $searchProduct = $_GET["search"];
if(isset($_GET["category"]))
    $categoryFilter = $_GET["category"];

/*

Includes:
    /init.php - database connection, site url, site name, site description
    /includes/services/product/index.php - findProducts function
    /includes/views/products.php - products table
    /includes/templates/footer.php - footer, html end tag

*/

include_once $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/product/index.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/category/index.php';

/*

Code:
    if search form is submitted set $search variable to the value of the search input
    if category form is submitted set $category variable to the value of the category input
    if search variable is set call search function from /includes/services/product/index.php
    if category variable is set call findProductsByCategory function from /includes/services/product/index.php
    if none of the above are true call findProducts function from /includes/services/product/index.php

*/

$categories = findCategories($conn);

if(isset($searchProduct)) {
    $products = search($conn, $searchProduct);
} else if(isset($categoryFilter)) {
    $products = findProductsByCategory($conn, $categoryFilter);
} else {
    $products = findProducts($conn);
}

include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/products.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php';

?>