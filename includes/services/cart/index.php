<?php 
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

?>