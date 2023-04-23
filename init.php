<?php 

include $_SERVER["DOCUMENT_ROOT"] .'/db.php'; // Including database connection file
include $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/header.php'; // include header file
include_once($_SERVER["DOCUMENT_ROOT"] .'/includes/functions/authorize.php'); // include authorization file
$uri = $_SERVER['REQUEST_URI']; // get current uri
if(str_contains($uri, '/admin')) {
    authorize(1);
}
?>