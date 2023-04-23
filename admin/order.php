<?php 
$pageTitle = "Order Dashboard";

include $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/order/index.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/user/index.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/product/index.php';

$error = "";
$users = findUsers($conn);
$products = findProducts($conn);

if(isset($_POST['update'])) {
    $user = $_POST['user'];
    $product = $_POST['product'];
    $status;
    isset($_POST['date']) && $_POST['date'] != '' ? $date = $_POST['date'] : $date = date("Y-m-d");
    isset($_POST['status']) && $_POST['status'] == "on" ? $status = 1 : $status = 0;
    if(!updateOrder($conn, $_GET['id'], $user, $product, $status, $date)){
        $error = "Error Updating";
    } else {
        $error = "Updated Successfully";
    }
}

if(isset($_POST['add'])) {
    $user = $_POST['user'];
    $product = $_POST['product'];
    $status;
    isset($_POST['date']) && $_POST['date'] != '' ? $date = $_POST['date'] : $date = date("Y-m-d");
    isset($_POST['status']) && $_POST['status'] == "on" ? $status = 1 : $status = 0;
    if(!insertOrder($conn, $user, $product, $status, $date)){
        $error = "Error Adding";
    } else {
        $error = "Added Successfully";
    }
}

if(isset($_GET['delete'])) {
    if(!deleteOrder($conn, $_GET['delete'])){
        $error = "Error Deleting";
    } else {
        $error = "Deleted Successfully";
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $order = findOneOrder($conn, $id);
    include $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/orderView.php';
} else {
    include $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/orderAdd.php';
}
?>

<?php include $_SERVER["DOCUMENT_ROOT"]. '/includes/templates/footer.php' ?>