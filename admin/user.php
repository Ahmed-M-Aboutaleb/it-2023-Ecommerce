<?php 
$pageTitle = "User Dashboard";

include $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include $_SERVER["DOCUMENT_ROOT"] .'/includes/services/user/index.php';

$error = "";

if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $admin;
    isset($_POST['date']) && $_POST['date'] != '' ? $date = $_POST['date'] : $date = date("Y-m-d");
    isset($_POST['admin']) && $_POST['admin'] == "on" ? $admin = 1 : $admin = 0;
    if(!updateUser($conn, $_GET['id'], $name, $email, $password, $admin, $date)){
        $error = "Error Updating";
    } else {
        $error = "Updated Successfully";
    }
}

if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $admin;
    isset($_POST['date']) && $_POST['date'] != '' ? $date = $_POST['date'] : $date = date("Y-m-d");
    isset($_POST['admin']) && $_POST['admin'] == "on" ? $admin = 1 : $admin = 0;
    if(!insertUser($conn, $name, $email, $password, $admin,$date)){
        $error = "Error Adding";
    } else {
        $error = "Added Successfully";
    }
}

if(isset($_GET['delete'])) {
    if(!deleteUser($conn, $_GET['delete'])){
        $error = "Error Deleting";
    } else {
        $error = "Deleted Successfully";
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = findOneUser($conn, $id);
    include $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/userView.php';
} else {
    include $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/userAdd.php';
}
?>

<?php include $_SERVER["DOCUMENT_ROOT"]. '/includes/templates/footer.php' ?>