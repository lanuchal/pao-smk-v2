<?php

$folder_system = 'systems';
$folders = scandir($folder_system); // Changed variable name from $files to $folders
$check_system = false;
foreach ($folders as $folder) {
    $folder_path = $folder_system . '/' . $folder . "/controller";
    if (is_dir($folder_path) && $folder !== '.' && $folder !== '..') {
        if ($folder == $system) {
            $files = scandir($folder_path);
            foreach ($files as $file) {
                $file_path = $folder_path . '/' . $file;
                if (is_file($file_path) && pathinfo($file_path, PATHINFO_EXTENSION) === 'php') {
                    $file_name = explode(".php",$file);
                    if ($route == $file_name[0]) {
                        $check_system = true;
                    }
                }
            }
        }
    }
}



if (!$check_system) {
    $system = "login";
    $route = "login";
}
