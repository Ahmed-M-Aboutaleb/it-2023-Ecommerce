<?php 

/*

Variables:
    $pageTitle (string) - title of the page
    $error (string) - error message

*/

$pageTitle = "Feedback Dashboard";
$error = "";

/*

Includes:
    /init.php - database connection, site url, site name, site description
    /includes/services/feedback/index.php - findFeedbacks, findOneFeedback, insertFeedback, updateFeedback, deleteFeedback functions
    /includes/views/admin/feedbackView.php - feedback view
    /includes/views/admin/feedbackAdd.php - feedback add view
    /includes/templates/footer.php - footer, html end tag

*/

include_once $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/feedback/index.php';

if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    isset($_POST['date']) && $_POST['date'] != '' ? $date = $_POST['date'] : $date = date("Y-m-d");
    if(!updateFeedback($conn, $_GET['id'], $name, $email, $message, $date)){
        $error = "Error Updating";
    } else {
        $error = "Updated Successfully";
    }
}

if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    isset($_POST['date']) && $_POST['date'] != '' ? $date = $_POST['date'] : $date = date("Y-m-d");
    if(!insertFeedback($conn, $name, $email, $message, $date)){
        $error = "Error Adding";
    } else {
        $error = "Added Successfully";
    }
}

if(isset($_GET['delete'])) {
    if(!deleteFeedback($conn, $_GET['delete'])){
        $error = "Error Deleting";
    } else {
        $error = "Deleted Successfully";
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $feedback = findOneFeedback($conn, $id);
    include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/feedbackView.php';
} else {
    include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/feedbackAdd.php';
}
?>

<?php include_once $_SERVER["DOCUMENT_ROOT"]. '/includes/templates/footer.php' ?>