<?php


if (isset($_POST['create'])) {
    $data['name'] = defending($_POST['name']);
    $result = create_affiliation($data);
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
    $result = update_affiliation($data);
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
    $result = delete_affiliation($data);
    if ($result) {
        set_flash_message('success', 'ลบข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}


$dataheader = [
    "title" => "จัดการสังกัด",
    "icon" => "bx bxs-share-alt",
    "list" => [
        [
            "data" => "จัดการสังกัด",
            "active" => true
        ]
    ]
];
generateHeaderHTML($dataheader, $system, $route);

// get all data 

// $affiliations = find_all_affiliation();


// print_r($affiliations);
// echo "waaa<br>";
