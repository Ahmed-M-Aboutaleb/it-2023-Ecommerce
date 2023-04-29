<?php 

/*

Variables:
    $pageTitle (string) - title of the page
    $error (string) - error message
    $admins (array) - array of admins

*/

$pageTitle = "Category Dashboard";
$error = "";

/*

Includes:
    /init.php - database connection, site url, site name, site description
    /includes/services/category/index.php - findAdmins, updateCategory, insertCategory, findOneCategory, deleteCategory functions
    /includes/services/user/index.php - findAdmins function
    /includes/views/admin/categoryView.php - category view
    /includes/views/admin/categoryAdd.php - category add view
    /includes/templates/footer.php - footer, html end tag

*/

include_once $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/category/index.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/user/index.php';

/*

Code:
    if id is set, display category view
    if update form is submitted, update category
    if add form is submitted, add category
    if delete is set, delete category
    else display category add view

*/

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
    include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/categoryView.php';
} else {
    include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/categoryAdd.php';
}
?>

<?php include_once $_SERVER["DOCUMENT_ROOT"]. '/includes/templates/footer.php' ?>