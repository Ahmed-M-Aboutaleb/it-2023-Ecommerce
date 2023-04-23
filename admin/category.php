<?php 
$pageTitle = "Category Dashboard";

include $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/category/index.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/user/index.php';

$error = "";
$admins = findAdmins($conn);

if(isset($_POST['update'])) {
    $name = $_POST['name'];
    isset($_POST['date']) && $_POST['date'] != '' ? $date = $_POST['date'] : $date = date("Y-m-d");
    $admin = $_POST['admin'];
    if(!updateCategory($conn, $_GET['id'], $name, $date, $admin)){
        $error = "Error Updating";
    } else {
        $error = "Updated Successfully";
    }
}

if(isset($_POST['add'])) {
    $name = $_POST['name'];
    isset($_POST['date']) && $_POST['date'] != '' ? $date = $_POST['date'] : $date = date("Y-m-d");
    $admin = $_POST['admin'];
    if(!insertCategory($conn, $name, $date, $admin)){
        $error = "Error Adding";
    } else {
        $error = "Added Successfully";
    }
}

if(isset($_GET['delete'])) {
    if(!deleteCategory($conn, $_GET['delete'])){
        $error = "Error Deleting";
    } else {
        $error = "Deleted Successfully";
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $category = findOneCategory($conn, $id);
    include $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/categoryView.php';
} else {
    include $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/categoryAdd.php';
}
?>

<?php include $_SERVER["DOCUMENT_ROOT"]. '/includes/templates/footer.php' ?>