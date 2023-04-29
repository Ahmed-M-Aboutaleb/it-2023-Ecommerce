<?php 

/*

Variables:
    $pageTitle (string) - title of the page
    $error (string) - error message

*/

$pageTitle = "User Dashboard";
$error = "";

/*

Includes:
    /init.php - database connection, site url, site name, site description
    /includes/services/user/index.php - findUsers function
    /includes/views/admin/userAdd.php - user add form
    /includes/views/admin/userView.php - user view form
    /includes/templates/footer.php - footer, html end tag

*/

include_once $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/user/index.php';

/*

Code:
    if user is not logged in redirect to login.php
    if update form is submitted call updateUser function from /includes/services/user/index.php
    if add form is submitted call insertUser function from /includes/services/user/index.php
    if delete button is clicked call deleteUser function from /includes/services/user/index.php
    if updateUser or insertUser or deleteUser function returns false set error message to "Error Updating" or "Error Adding" or "Error Deleting"
    if updateUser or insertUser or deleteUser function returns true set error message to "Updated Successfully" or "Added Successfully" or "Deleted Successfully"
    if id is set get user by id from database and set it to user variable

*/

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
    include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/userView.php';
} else {
    include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/userAdd.php';
}
?>

<?php include_once $_SERVER["DOCUMENT_ROOT"]. '/includes/templates/footer.php' ?>