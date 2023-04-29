<?php

/*
Name: validateInput
Description: Validate input
Parameters: $value - Input value
Return: 
    false - Invalid input
    $value - Valid input
virsion: 1.0
*/

function validateInput($value) {
    if($value == '' || $value == null || $value == ' ' || !isset($value)) {
        return false;
    }
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    filter_var($value, FILTER_SANITIZE_STRING);
    return $value;
}

?>