<?php

/*
Name: getCSSFile function

Description: This function will check if the page has a css file or not, 
if it has a css file it will echo it.

Version: 1.0
*/

function getCSSFile() {
    global $cssFile;
    if(isset($cssFile)) {
        echo '<link rel="stylesheet" href="/public/css/' . $cssFile . '">';
    }
}

?>