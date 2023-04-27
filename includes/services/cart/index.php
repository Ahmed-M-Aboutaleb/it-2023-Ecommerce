<?php 

include_once($_SERVER["DOCUMENT_ROOT"] .'/includes/services/order/index.php');
include_once($_SERVER["DOCUMENT_ROOT"] .'/includes/services/product/index.php');

function addItemsToCart($product, $quantity = 1) {
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        if (array_key_exists($product, $_SESSION['cart'])) {
            $_SESSION['cart'][$product] += $quantity;
        } else {
            $_SESSION['cart'][$product] = $quantity;
        }
    } else {
        $_SESSION['cart'] = array($product => $quantity);
    }
}

function removeItemsFromCart($product) {
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        if (array_key_exists($product, $_SESSION['cart'])) {
            unset($_SESSION['cart'][$product]);
        }
    }
}

function updateQuantity($product, $quantity) {
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        if (array_key_exists($product, $_SESSION['cart'])) {
            $_SESSION['cart'][$product] = $quantity;
        }
    }
}

function placeOrder($conn) {
    $cart = $_SESSION['cart'];
    $user = $_SESSION['id'];
    $status = 0;
    $date = date("Y-m-d");
    foreach($cart as $productId => $quantity) {
        $product = findOneProduct($conn, $productId);
        insertOrder($conn, $user, $product['price'], $productId, $status, $date);
    }
}

?>