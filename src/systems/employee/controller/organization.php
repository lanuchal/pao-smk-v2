<?php


if (isset($_POST['create'])) {
    $data['name'] = defending($_POST['name']);
    $result = create_organization($data);
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
    $result = update_organization($data);
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
    $result = delete_organization($data);
    if ($result) {
        set_flash_message('success', 'ลบข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

$dataheader = [
    "title" => "จัดการหน่วยงาน",
    "icon" => "bx bxs-business",
    "list" => [
        [
            "data" => "จัดการหน่วยงาน",
            "active" => true
        ]
    ]
];
generateHeaderHTML($dataheader, $system, $route);

// print_r($dataheader);
// echo "waaa<br>";
