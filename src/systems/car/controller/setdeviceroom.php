<?php

if (isset($_POST['create'])) {
    $data['name_equipment'] = defending($_POST['name_equipment']);
    $data['position'] = defending($_POST['position']);
    $result = create_equipment($data);
    if ($result) {
        set_flash_message('success', 'เพิ่มข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['update'])) {
    $data['id_equipment'] = defending($_POST['id_equipment']);
    $data['name_equipment'] = defending($_POST['name_equipment']);
    $data['position'] = defending($_POST['position']);
    $result = update_equipment($data);
    if ($result) {
        set_flash_message('success', 'แก้ไขข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['delete'])) {
    $data['id_equipment'] = defending($_POST['id_equipment']);
    $result = delete_equipment($data);
    if ($result) {
        set_flash_message('success', 'ลบข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

$dataheader = [
    "title" => "จัดการข้อมูลอุปกรณ์",
    "icon" => "bx bx-wrench",
    "list" => [
        [
            "data" => "จัดการข้อมูลอุปกรณ์",
            "active" => true
        ]
    ]
];
generateHeaderHTML($dataheader, $system, $route);
