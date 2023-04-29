<?php

/*

Code:
    start session
    destroy session
    redirect to index.php

*/

session_start();
session_destroy();
header("Location: index.php");
?>