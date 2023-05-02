<?php

/*
Variables:
    $pageTitle (string) - title of the page

*/

$pageTitle = 'Cart';

/*

Includes:
    /init.php - database connection, site url, site name, site description
    /includes/services/cart/index.php - addItemsToCart, removeItemsFromCart, updateQuantity, placeOrder functions
    /includes/services/product/index.php - findOneProduct function
    /includes/views/cart.php - cart table
    /includes/templates/footer.php - footer, html end tag

*/

include_once $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/cart/index.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/product/index.php';

/*

Code:
    if update form is submitted call updateQuantity function from /includes/services/cart/index.php
    if place order form is submitted call placeOrder function from /includes/services/cart/index.php
    if remove form is submitted call removeItemsFromCart function from /includes/services/cart/index.php
    if cart session is set set $cart variable to the value of the cart session
    if $cart is not empty loop through $cart and call findOneProduct function from /includes/services/product/index.php
    if id is set and is numeric call addItemsToCart function from /includes/services/cart/index.php

*/

$products = array();
if(isset($_POST["update"])) {
    updateQuantity($_POST["id"], $_POST['quantity']);
}

if(isset($_POST["placeOrder"])) {
    placeOrder($conn);
    unset($_SESSION['cart']);
}

if(isset($_POST["remove"])) {
    removeItemsFromCart($_POST["id"]);
}

if(isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    if(!empty($cart)) {
        foreach($cart as $id => $quantity) {
            $product = findOneProduct($conn, $id);
            $product['quantity'] = $quantity;
            $products[] = $product;
        }
    }
}

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    addItemsToCart($_GET['id']);
    header('Location: /cart.php');
}

include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/cart.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php';

?>