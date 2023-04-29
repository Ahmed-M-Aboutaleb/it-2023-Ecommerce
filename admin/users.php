<?php 

/*

Variables:
    $pageTitle (string) - title of the page

*/

$pageTitle = "Users Dashboard";

/*

Includes:
    /init.php - database connection, site url, site name, site description
    /includes/services/user/index.php - findUsers function
    /includes/views/admin/users.php - users view
    /includes/templates/footer.php - footer, html end tag

*/

include_once $_SERVER["DOCUMENT_ROOT"] .'/init.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/services/user/index.php';

/*

Code:
    if user is not logged in redirect to login.php
    call findUsers function from /includes/services/user/index.php

*/

$users = findUsers($conn);
?>

<?php include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/views/admin/users.php'; ?>

<?php include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/footer.php'; ?>