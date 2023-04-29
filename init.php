<?php 

/*

Includes:
    /db.php - database connection
    /includes/templates/header.php - doctype, html, head, body, navbar
    /includes/functions/authorize.php - authorize function

*/

include_once $_SERVER["DOCUMENT_ROOT"] .'/db.php'; // Including database connection file
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/header.php'; // include header file
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/functions/authorize.php'; // include authorization file

/*

Code:
    if uri contains /admin call authorize function from /includes/functions/authorize.php

*/

$uri = $_SERVER['REQUEST_URI']; // get current uri
if(str_contains($uri, '/admin')) {
    authorize(1);
}
?>