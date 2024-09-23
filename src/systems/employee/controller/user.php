<?php


if (isset($_POST['create'])) {

    $data['user_code'] = defending($_POST['user_code']);
    $data['user_name'] = defending($_POST['user_name']);
    $data['user_pass'] = defending($_POST['user_pass']);
    $data['cc_user_code'] = defending($_POST['cc_user_code']);
    $data['organization_id'] = defending($_POST['organization_id']);
    $data['affiliation_id'] = defending($_POST['affiliation_id']);
    $data['division_id'] = defending($_POST['division_id']);
    $data['position_id'] = defending($_POST['position_id']);
    $data['permission_id'] = defending($_POST['permission_id']);

    if ($data['user_pass'] != $data['cc_user_code']) {
        set_flash_message('danger', 'รหัสผ่านไม่ตรงกัน');
        echo "<script>window.location.href='';</script>";
    }

    $findOne = find_one_user($data);
    if ($findOne) {
        set_flash_message('danger', 'รหัสผู้ใช้งานนี้ถูกใช้งานแล้ว');
        echo "<script>window.location.href='';</script>";
    }

    $result = create_user($data);
    if ($result) {
        set_flash_message('success', 'เพิ่มข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['update'])) {
    $data['user_id'] = defending($_POST['user_id']);
    $data['user_code'] = defending($_POST['user_code']);
    $data['user_name'] = defending($_POST['user_name']);
    $data['organization_id'] = defending($_POST['organization_id']);
    $data['affiliation_id'] = defending($_POST['affiliation_id']);
    $data['division_id'] = defending($_POST['division_id']);
    $data['position_id'] = defending($_POST['position_id']);
    $data['permission_id'] = defending($_POST['permission_id']);

    $result = update_user($data);
    if ($result) {
        set_flash_message('success', 'แก้ไขข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['delete'])) {
    $data['user_id'] = defending($_POST['user_id']);
    $result = delete_user($data);
    if ($result) {
        set_flash_message('success', 'ลบข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

$dataheader = [
    "title" => "จัดการผู้ใช้งาน",
    "icon" => "bx bxs-user-detail",
    "list" => [
        [
            "data" => "จัดการผู้ใช้งาน",
            "active" => true
        ]
    ]
];

generateHeaderHTML($dataheader, $system, $route);


includeIfExists('systems/' . defending($_GET['s']) . '/model/affiliation.php');
includeIfExists('systems/' . defending($_GET['s']) . '/model/division.php');
includeIfExists('systems/' . defending($_GET['s']) . '/model/organization.php');
includeIfExists('systems/' . defending($_GET['s']) . '/model/permission.php');
includeIfExists('systems/' . defending($_GET['s']) . '/model/position.php');
// print_r($dataheader);
// echo "waaa<br>";
