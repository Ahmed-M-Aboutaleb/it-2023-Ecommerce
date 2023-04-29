<?php 

/*

Variables:
    $pageTitle - page title
    $categories - categories array

*/

$pageTitle = "Categories Dashboard";

/*

Includes:
    /init.php - database connection, site url, site name, site description
    /includes/services/category/index.php - findCategories function
    /includes/views/admin/categories.php - categories view
    /includes/templates/footer.php - footer, html end tag

*/

include_once $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/category/index.php';

/*

Code:
    find categories and display categories view

*/

$categories = findCategories($conn);
?>

<?php include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/categories.php'; ?>

<?php include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php'; ?>