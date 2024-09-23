<?php

if (isset($_POST['create'])) {
    $data['name_style'] = defending($_POST['name_style']);
    $data['position'] = defending($_POST['position']);
    $result = create_room_style($data);
    if ($result) {
        set_flash_message('success', 'เพิ่มข้อมูลประเภทห้องสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['update'])) {
    $data['id_style'] = defending($_POST['id_style']);
    $data['name_style'] = defending($_POST['name_style']);
    $data['position'] = defending($_POST['position']);
    $result = update_room_style($data);
    if ($result) {
        set_flash_message('success', 'แก้ไขข้อมูลประเภทห้องสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['delete'])) {
    $data['id_style'] = defending($_POST['id_style']);
    $result = delete_room_style($data);
    if ($result) {
        set_flash_message('success', 'ลบข้อมูลประเภทห้องสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

$dataheader = [
    "title" => "จัดการประเภทห้อง",
    "icon" => "bx bxs-layer",
    "list" => [
        [
            "data" => "จัดการประเภทห้อง",
            "active" => true
        ]
    ]
];
generateHeaderHTML($dataheader, $system, $route);
?>
