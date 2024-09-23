<?php
// Handle record creation
if (isset($_POST['create'])) {
    $data = [
        'id_member' => defending($_POST['id_member']),
        'status' => defending($_POST['status']),
        'rooms' => defending($_POST['rooms']),
        'title' => defending($_POST['title']),
        'start' => defending($_POST['start']),
        'end' => defending($_POST['end']),
        'color' => defending($_POST['color']),
        'division' => defending($_POST['division']),
        'people' => defending($_POST['people']),
        'style' => defending($_POST['style']),
        'equipment' => defending($_POST['equipment']),
        'member' => defending($_POST['member']),
        'etc' => defending($_POST['etc'])
    ];
    $result = create_record($data);
    if ($result) {
        set_flash_message('success', 'เพิ่มข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>"; // Redirect as needed
}

// Handle record update
if (isset($_POST['update'])) {
    $data = [
        'id' => defending($_POST['id']),
        'id_member' => defending($_POST['id_member']),
        'status' => defending($_POST['status']),
        'rooms' => defending($_POST['rooms']),
        'title' => defending($_POST['title']),
        'start' => defending($_POST['start']),
        'end' => defending($_POST['end']),
        'color' => defending($_POST['color']),
        'division' => defending($_POST['division']),
        'people' => defending($_POST['people']),
        'style' => defending($_POST['style']),
        'equipment' => defending($_POST['equipment']),
        'member' => defending($_POST['member']),
        'etc' => defending($_POST['etc'])
    ];
    $result = update_record($data);
    if ($result) {
        set_flash_message('success', 'แก้ไขข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>"; // Redirect as needed
}

// Handle record deletion
if (isset($_POST['delete'])) {
    $data = [
        'id' => defending($_POST['id'])
    ];
    $result = delete_record($data);
    if ($result) {
        set_flash_message('success', 'ลบข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>"; // Redirect as needed
}

// Prepare data for header
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