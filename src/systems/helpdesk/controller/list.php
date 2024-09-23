<?php

includeIfExists('systems/' . defending($_GET['s']) . '/model/request.php');
includeIfExists('systems/' . defending($_GET['s']) . '/model/status.php');


if (isset($_POST['update'])) {
    $data['id'] = defending($_POST['id']);
    $data['helpdesk_status_id'] = defending($_POST['helpdesk_status_id']);
    $result = update_status_job($data);
    if ($result) {
        set_flash_message('success', 'แก้ไขข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['remark'])) {
    $data['id'] = defending($_POST['id']);
    $data['detail_active'] = defending($_POST['detail_active']);
    $result = update_detail_active($data);
    if ($result) {
        set_flash_message('success', 'แก้ไขข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}


$dataheader = [
    "title" => "รายการแจ้งงาน",
    "icon" => "bx bx-list-ol",
    "list" => [
        [
            "data" => "รายการแจ้งงาน",
            "active" => true
        ]
    ]
];
generateHeaderHTML($dataheader, $system, $route);
