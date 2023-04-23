<?php

/*
Name: getPageTitle function

Description: This function will check if the page has a title or not, if it has a 
title it will echo it, if not it will echo the default title.

Version: 1.0
*/

function getPageTitle() {
    global $pageTitle;
    if(isset($pageTitle)) {
        echo $pageTitle;
    } else {
        echo "Shop - Welcome to our online web store";
    }
}
?>