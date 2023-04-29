<?php 

session_start();

include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/functions/getPageTitle.php'; 
include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/functions/getCSSFile.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php getPageTitle() ?></title>
    <?php getCSSFile() ?>
    <link href="/public/css/bootstrap.min.css" rel="stylesheet" >
    <link href="/public/css/docs.css" rel="stylesheet">
    <link href="/public/css/icons.min.css" rel="stylesheet">
    <script src="/public/js/jquery-3.6.4.min.js"></script>
    <script src="/public/js/bootstrap.bundle.min.js"></script>
    <style>
        .btn-outline-main {
            --bs-btn-color: rgb(76 112 255) !important;
            --bs-btn-border-color: rgb(76 112 255) !important;
            --bs-btn-hover-color: #fff !important;
            --bs-btn-hover-bg: rgb(76 112 255) !important;
            --bs-btn-hover-border-color: rgb(76 112 255) !important;
            --bs-btn-focus-shadow-rgb: 25,135,84 !important;
            --bs-btn-active-color: #fff !important;
            --bs-btn-active-bg: rgb(51, 88, 238) !important;
            --bs-btn-active-border-color: rgb(40, 84, 255) !important;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125) !important;
            --bs-btn-disabled-color: rgb(44, 77, 208) !important;
            --bs-btn-disabled-bg: transparent;
            --bs-btn-disabled-border-color: rgb(44, 77, 208) !important;
            --bs-gradient: none;
        }
    </style>
</head>
<body>
<?php 
    if(isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
        include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/templates/admin-nav.php';
    } 
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="margin-bottom: 1rem;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 list-unstyled">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cart.php">Cart</a>
                </li>
                <?php if(isset($_SESSION["id"])) {
                    echo '
                    <li class="nav-item">
                        <a class="nav-link" href="/profile.php">Profile</a>
                    </li>
                    ';
                } else {
                    echo '
                    <li class="nav-item">
                        <a class="nav-link" href="/login.php">Login</a>
                    </li>
                    ';
                }
                ?>
            </ul>
            <form class="d-flex" action="/products.php" method="GET" role="search">
                <input class="form-control me-2" minlength="3" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-main" type="submit"><i class="fa-light fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
</nav>