<?php

/**
 * INSERT INTO `system_e_leave`.`executivecalendar_calendar` (`id`, `title`, `start`, `end`, `color`) VALUES (1, 'test', '2024-08-29', '2024-08-29', '#FFFFFF');
 * 
 * UPDATE `system_e_leave`.`executivecalendar_calendar` SET `title` = 'test', `start` = '2024-08-29', `end` = '2024-08-29', `color` = '#FFFFFF' WHERE `id` = 1;
 */
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


function find_events()
{
    $sql = "SELECT * FROM `system_e_leave`.`room_event` ";
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}
function find_all_type()
{

    $sql = "SELECT * FROM `system_e_leave`.`room_event` ";
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

if ($_GET['source'] === 'calendar2') {
    $data = find_events();
     //print_r($data);
    echo json_encode($data);
}
