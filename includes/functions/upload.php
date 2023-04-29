<?php 

/*

Name: upload function

Description: This function will upload an image to the server and return the image name if the upload is successful.

Version: 1.0

*/

function upload() {
    $imagesDir = $_SERVER["DOCUMENT_ROOT"] .'/public/images/products/';
    $imageFile = $imagesDir . htmlspecialchars(basename($_FILES["image"]["name"]));
    $imageFileType = strtolower(pathinfo($imageFile,PATHINFO_EXTENSION));
    if($_FILES["image"]["tmp_name"] == "" || $_FILES["image"]["tmp_name"] == null || !isset($_FILES["image"]["tmp_name"])) {
        return false;
    }
    if(file_exists($imageFile)) {
        return htmlspecialchars( basename( $_FILES["image"]["name"]));
    }
    if($_FILES["image"]["size"] > 500000) {
        return false;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        return false;
    }
    if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imageFile)) {
        return false;
    }
    return htmlspecialchars( basename( $_FILES["image"]["name"]));
}

?>