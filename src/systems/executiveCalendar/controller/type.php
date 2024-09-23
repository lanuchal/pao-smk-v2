<?php


if (isset($_POST['create'])) {
    $data['title'] = defending($_POST['title']);
    $data['start'] = defending($_POST['start']);
    $data['end'] = defending($_POST['end']);
    $data['color'] = defending($_POST['color']);
    $result = create_record($data);
    if ($result) {
        set_flash_message('success', 'เพิ่มข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['update'])) {
    $data['id'] = defending($_POST['id']);
    $data['title'] = defending($_POST['title']);
    $data['start'] = defending($_POST['start']);
    $data['end'] = defending($_POST['end']);
    $data['color'] = defending($_POST['color']);
    $result = update_record($data);
    if ($result) {
        set_flash_message('success', 'แก้ไขข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['delete'])) {
    $data['id'] = defending($_POST['id']);
    $result = delete_record($data);
    if ($result) {
        set_flash_message('success', 'ลบข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}



$dataheader = [
    "title" => "จัดการตารางนัด",
    "icon" => "bx bxs-layer",
    "list" => [
        [
            "data" => "จัดการตารางนัด",
            "active" => true
        ]
    ]
];
generateHeaderHTML($dataheader, $system, $route);

