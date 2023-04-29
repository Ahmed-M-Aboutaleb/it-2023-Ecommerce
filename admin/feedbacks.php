<?php 

/*

Variables:
    $pageTitle (string) - title of the page
    $feedbacks (array) - array of feedbacks

*/

$pageTitle = "Feedbacks Dashboard";

/*

Includes:
    /init.php - database connection, site url, site name, site description
    /includes/services/feedback/index.php - findFeedbacks function
    /includes/views/admin/feedbacks.php - feedbacks table
    /includes/templates/footer.php - footer, html end tag

*/

include_once $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/feedback/index.php';

/*

Code:
    call findFeedbacks function from /includes/services/feedback/index.php

*/

$feedbacks = findFeedbacks($conn);
?>

<?php include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/feedbacks.php'; ?>

<?php include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php'; ?>