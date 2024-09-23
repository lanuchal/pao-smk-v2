<?php
$globals_test = @ini_get('register_globals');
if (isset($globals_test) && empty($globals_test)) {
    if (!empty($_GET)) {
        extract($_GET, EXTR_SKIP);
    }
    if (!empty($_POST)) {
        extract($_POST, EXTR_SKIP);
    }
    if (!empty($_COOKIE)) {
        extract($_COOKIE, EXTR_SKIP);
    }
    if (!empty($_SESSION)) {
        extract($_SESSION, EXTR_SKIP);
    }
    if (!empty($_SERVER)) {
        extract($_SERVER, EXTR_SKIP);
    }
}

$_host = "devcm.info";
$_username = "system_e_leave";
$_password = "x4p*J64c7";
$DB_NAME = "system_e_leave";

$GLOBALS['DB_NAME'] = $DB_NAME;
$GLOBALS['CON'] = $connect = mysqli_connect($_host, $_username, $_password) or die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้");
mysqli_query($GLOBALS['CON'], "SET NAMES UTF8");
$db_select = mysqli_select_db($GLOBALS['CON'], $DB_NAME);
// date_default_timezone_set("Asia/Bangkok");

mysqli_set_charset($GLOBALS['CON'], 'utf8'); // Set charset
date_default_timezone_set("Asia/Bangkok");
