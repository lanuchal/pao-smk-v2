<?php


if (isset($_POST['create'])) {
    $data['name'] = defending($_POST['name']);
    $result = create_type($data);
    if ($result) {
        set_flash_message('success', 'เพิ่มข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['update'])) {
    $data['id'] = defending($_POST['id']);
    $data['name'] = defending($_POST['name']);
    $result = update_type($data);
    if ($result) {
        set_flash_message('success', 'แก้ไขข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['delete'])) {
    $data['id'] = defending($_POST['id']);
    $data['name'] = defending($_POST['name']);
    $result = delete_type($data);
    if ($result) {
        set_flash_message('success', 'ลบข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}


$dataheader = [
    "title" => "จัดการประเภท",
    "icon" => "bx bxs-layer",
    "list" => [
        [
            "data" => "จัดการประเภท",
            "active" => true
        ]
    ]
];
generateHeaderHTML($dataheader, $system, $route);

