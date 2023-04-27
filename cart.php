<?php

$pageTitle = 'Cart';

include_once($_SERVER["DOCUMENT_ROOT"] .'/init.php');
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/cart/index.php';
include_once($_SERVER["DOCUMENT_ROOT"] .'/includes/services/product/index.php');

$products = array();
if(isset($_POST["update"])) {
    updateQuantity($_POST["id"], $_POST['quantity']);
}

if(isset($_POST["placeOrder"])) {
    placeOrder($conn);
    unset($_SESSION['cart']);
    header('Location: /');
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

?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/views/cart.php'; ?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php'; ?>