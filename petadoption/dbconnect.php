<?php

session_start();

error_reporting( ~E_DEPRECATED & ~E_NOTICE );


define ('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define ('DBNAME', 'cr11_Agnieszka_petadoption');

$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);


if  ( !$conn ) {
 die("Connection failed");
}

/**
 * Return a sanitized input from a given string 
 * prevent sql injections / clear user invalid inputs
 */
function sanitizeInput($str) {
    $str = trim($str);
    $str = strip_tags($str);
    return htmlspecialchars($str);
}
/**
 * If not admin route user to login page
 */
function checkIfAdmin() {
    if (!isset($_SESSION['role'])) {
        header("Location: index.php");
        die;
    }
    
    if ($_SESSION['role'] !="admin") {
        header("Location: index.php");
        die;
    }
    
}

/**
 * If not super admin route user to login page
 */
function checkIfSuperAdmin() {
    if (!isset($_SESSION['role'])) {
        header("Location: index.php");
        die;
    }
    
    if ($_SESSION['role'] !="superadmin") {
        header("Location: index.php");
        die;
    }
    
}

function setErrorMessage($str) {
    $_SESSION["errormessage"] = $str;
}

function printError() {
    echo  $_SESSION["errormessage"];
    $_SESSION["errormessage"] = null;
}
function hasError() {
    return isset($_SESSION["errormessage"]);    
}


// function checkIfAdmin() {
//     if (!isset($_SESSION['role'])) {
//         header("Location: index.php");
//         die;
//     }
    
//     if ($_SESSION['role']!="admin") {
//         header("Location: index.php");
//         die;
//     }
    
// }
// kann dann um superadmin erweitert werden