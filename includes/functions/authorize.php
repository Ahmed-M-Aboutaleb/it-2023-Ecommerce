<?php 

/*

Name: authorize function

Description: This function will check if the user is logged in or not and if he is an admin or not,
if the user is not logged in it will redirect him to the login page.

Version: 1.0

*/

function authorize($admin = 0) {
    if($admin){
        if(!isset($_SESSION["id"]) || $_SESSION["admin"] != 1) {
            header("Location: /");
        }
    } else {
        if(!isset($_SESSION["id"])) {
            header("Location: /login.php");
        }
    }
}

?>