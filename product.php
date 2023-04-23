<?php

$pageTitle = "Shop - Product";
$cssFile = "product.css";
include $_SERVER["DOCUMENT_ROOT"] ."/init.php";
include $_SERVER["DOCUMENT_ROOT"] ."/includes/services/product/index.php";
include $_SERVER["DOCUMENT_ROOT"] ."/includes/services/category/index.php";

if(!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: products.php");
}
$product = findOneProduct($conn, $_GET["id"]);
$category = findOneCategory($conn, $product["category"]);

?>

<?php include $_SERVER["DOCUMENT_ROOT"] ."/includes/views/product.php"; ?>

<?php include $_SERVER["DOCUMENT_ROOT"] ."/includes/templates/footer.php"; ?>