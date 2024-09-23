<?php

if (isset($_POST['create'])) {
    $data['name_style'] = defending($_POST['name_style']);
    $data['position'] = defending($_POST['position']);
    $result = create_car_style($data);  // เปลี่ยนจาก create_room_style เป็น create_car_style
    if ($result) {
        set_flash_message('success', 'เพิ่มข้อมูลประเภทรถสำเร็จ');  // ปรับข้อความ
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['update'])) {
    $data['id_style'] = defending($_POST['id_style']);
    $data['name_style'] = defending($_POST['name_style']);
    $data['position'] = defending($_POST['position']);
    $result = update_car_style($data);  // เปลี่ยนจาก update_room_style เป็น update_car_style
    if ($result) {
        set_flash_message('success', 'แก้ไขข้อมูลประเภทรถสำเร็จ');  // ปรับข้อความ
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['delete'])) {
    $data['id_style'] = defending($_POST['id_style']);
    $result = delete_car_style($data);  // เปลี่ยนจาก delete_room_style เป็น delete_car_style
    if ($result) {
        set_flash_message('success', 'ลบข้อมูลประเภทรถสำเร็จ');  // ปรับข้อความ
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

$dataheader = [
    "title" => "จัดการประเภทรถ",  // ปรับชื่อหัวเรื่อง
    "icon" => "bx bxs-car",  // ปรับไอคอนให้สอดคล้องกับข้อมูลประเภทรถ
    "list" => [
        [
            "data" => "จัดการประเภทรถ",  // ปรับข้อความ
            "active" => true
        ]
    ]
];
generateHeaderHTML($dataheader, $system, $route);
?>
