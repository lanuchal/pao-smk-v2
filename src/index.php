<?php
session_start();

include "config/dbConnect.php";
include "config/autoImport.php";
include "config/setData.php";
include "config/checkRoute.php";

$_SESSION['username'] = "10";

// if (!isset($_SESSION['username']) || $_SESSION['username'] == '') {
//     include 'layout/bank.php';
// } else {
//     if (($system == "menu" &&  $route == "menu") || ($system == "login" &&  $route == "login")) {
//         include 'layout/bank.php';
//     } else {
//         include 'layout/dashboard.php';
//     }
// }

if (($system == "menu" &&  $route == "menu") || ($system == "login" &&  $route == "login")) {
    include 'layout/bank.php';
} else {
    include 'layout/dashboard.php';
}
