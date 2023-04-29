<?php 

/*

Variables:
    $pageTitle (string) - page title
    $error (string) - error message
    $seller (array) - seller array
    $categories (array) - categories array

*/

$pageTitle = "Users Dashboard";
$error = "";

/*

Includes:
    /init.php - database connection, site url, site name, site description
    /includes/services/user/index.php - findAdmins function
    /includes/services/category/index.php - findCategories function
    /includes/functions/upload.php - upload function
    /includes/views/admin/productView.php - admin product view
    /includes/views/admin/productAdd.php - admin product add
    /includes/templates/footer.php - footer, html end tag

*/

include_once $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/product/index.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/user/index.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/category/index.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/functions/upload.php';

/*

Code
    if id is set and is numeric call findOneProduct function from /includes/services/product/index.php
    call findAdmins function from /includes/services/user/index.php
    call findCategories function from /includes/services/category/index.php
    if update form is submitted call updateProduct function from /includes/services/product/index.php
    if add form is submitted call addProduct function from /includes/services/product/index.php

*/

$sellers = findAdmins($conn);
$categories = findCategories($conn);

if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['categories'];
    $seller = $_POST['seller'];
    isset($_FILES['image']) && upload() ? $image = upload() : $image = "";
    isset($_POST['date']) && $_POST['date'] != '' ? $date = $_POST['date'] : $date = date("Y-m-d");
    $rating = $_POST['rating'];
    if(!updateProduct($conn, $_GET['id'], $name, $description, $price, $category, $seller, $date, $rating, $image)){
        $error = "Error Updating";
    } else {
        $error = "Updated Successfully";
    }
}

if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['categories'];
    $seller = $_POST['seller'];
    $rating = $_POST['rating'];
    isset($_FILES['image']) && upload() ? $image = upload() : $image = "null.png";
    isset($_POST['date']) && $_POST['date'] != '' ? $date = $_POST['date'] : $date = date("Y-m-d");
    if(!insertProduct($conn, $name, $description, $price, $category, $seller, $rating, $image, $date)){
        $error = "Error Adding";
    } else {
        $error = "Added Successfully";
    }
}

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    if(!deleteProduct($conn, $id)) {
        $error = "Error Deleting";
    } else {
        $error = "Deleted Successfully";
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = findOneProduct($conn, $id);
    include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/productView.php';
} else {
    include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/productAdd.php';
}
?>

<?php include_once $_SERVER["DOCUMENT_ROOT"]. '/includes/templates/footer.php' ?>