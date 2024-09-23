<?php

$folder_path = 'utils';
$files = scandir($folder_path);

foreach ($files as $file) {
    $file_path = $folder_path . '/' . $file;
    if (is_file($file_path) && pathinfo($file_path, PATHINFO_EXTENSION) === 'php') {

        require_once $file_path;
    }
}
