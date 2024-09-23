<?php

if ($_GET['action'] == "clear_message") {
    unset($_SESSION['flash_message']);
}

function set_flash_message($type, $message)
{
    $_SESSION['flash_message'] = [
        'type' => $type,
        'message' => $message
    ];
}
