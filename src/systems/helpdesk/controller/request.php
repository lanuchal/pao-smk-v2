<?php

includeIfExists('systems/equipment/model/list.php');
includeIfExists('systems/employee/model/affiliation.php');
includeIfExists('systems/' . defending($_GET['s']) . '/model/type.php');

if (isset($_POST['create'])) {
    $data['code'] = defending($_POST['code']);
    $data['request_date'] = defending($_POST['request_date']);
    $data['detail'] = defending($_POST['detail']);
    $data['helpdesk_type_id'] = defending($_POST['helpdesk_type_id']);
    $result = create_request($data);
    if ($result) {
        set_flash_message('success', 'เพิ่มข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['update'])) {
    $data['id'] = defending($_POST['id']);
    $data['code'] = defending($_POST['code']);
    $data['request_date'] = defending($_POST['request_date']);
    $data['detail'] = defending($_POST['detail']);
    $data['helpdesk_type_id'] = defending($_POST['helpdesk_type_id']);
    $result = update_request($data);
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
    $result = delete_request($data);
    if ($result) {
        set_flash_message('success', 'ลบข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}


$dataheader = [
    "title" => "แจ้งงาน",
    "icon" => "bx bxs-inbox",
    "list" => [
        [
            "data" => "แจ้งงาน",
            "active" => true
        ]
    ]
];
generateHeaderHTML($dataheader, $system, $route);


