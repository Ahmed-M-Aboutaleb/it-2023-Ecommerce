<?php 
$pageTitle = "Orders Dashboard";

include $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/order/index.php';

$orders = findOrders($conn);
?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/orders.php'; ?>

<?php include $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php'; ?>