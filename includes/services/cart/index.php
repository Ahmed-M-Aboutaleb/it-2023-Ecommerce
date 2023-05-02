<?php 

include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/order/index.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/product/index.php';

/*

Name: addItemsToCart function

Description: This function will add items to the cart.

Version: 1.0

*/

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

/*

Name: removeItemsFromCart function

Description: This function will remove items from the cart.

Version: 1.0

*/

function removeItemsFromCart($product) {
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        if (array_key_exists($product, $_SESSION['cart'])) {
            unset($_SESSION['cart'][$product]);
        }
    }
}

/*

Name: updateQuantity function

Description: This function will update the quantity of items in the cart.

Version: 1.0

*/

function updateQuantity($product, $quantity) {
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        if (array_key_exists($product, $_SESSION['cart'])) {
            $_SESSION['cart'][$product] = $quantity;
        }
    }
}

/*

Name: placeOrder function

Description: This function will place an order.

Version: 1.0

*/

function placeOrder($conn) {
    $cart = $_SESSION['cart'];
    $user = $_SESSION['id'];
    $status = 0;
    $date = date("Y-m-d");
    foreach($cart as $productId => $quantity) {
        $product = findOneProduct($conn, $productId);
        $price = $product['price'];
        $total = $price * $quantity;
        insertOrder($conn, $user, $total, $quantity, $productId, $status, $date);
    }
}

?>