<?php 

function authorize($admin = 0) {
    if($admin){
        if(!isset($_SESSION["id"]) || $_SESSION["admin"] != 1) {
            header("Location: /");
            exit();
        }
    } else {
        if(!isset($_SESSION["id"])) {
            header("Location: /login.php");
            exit();
        }
    }
}

?>