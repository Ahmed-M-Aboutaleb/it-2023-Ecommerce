<?php 
$pageTitle = "Users Dashboard";

include $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/product/index.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/user/index.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/category/index.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/functions/upload.php';

$error = "";
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
    include $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/productView.php';
} else {
    include $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/productAdd.php';
}
?>

<?php include $_SERVER["DOCUMENT_ROOT"]. '/includes/templates/footer.php' ?>