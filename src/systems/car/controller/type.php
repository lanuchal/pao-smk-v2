<?php
// Handle record creation
if (isset($_POST['create'])) {
    $data = [
        'car_id' => defending($_POST['car_id']),
        'z_user' => defending($_POST['z_user']),
        'z_organization' => defending($_POST['z_organization']),
        'start_datetime' => defending($_POST['start_datetime']),
        'end_datetime' => defending($_POST['end_datetime']),
        'status' => defending($_POST['status']),
        'reason' => defending($_POST['reason'])
    ];

    $result = create_record($data);
    if ($result === true) {
        set_flash_message('success', 'เพิ่มข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด: ' . $result); // Display specific error
    }
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page
    exit();
}

// Handle record update
if (isset($_POST['update'])) {
    $data = [
        'id' => defending($_POST['id']),
        'car_id' => defending($_POST['car_id']),
        'z_user' => defending($_POST['z_user']),
        'z_organization' => defending($_POST['z_organization']),
        'start_datetime' => defending($_POST['start_datetime']),
        'end_datetime' => defending($_POST['end_datetime']),
        'status' => defending($_POST['status']),
        'reason' => defending($_POST['reason'])
    ];

    $result = update_record($data);
    if ($result === true) {
        set_flash_message('success', 'แก้ไขข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด: ' . $result); // Display specific error
    }
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page
    exit();
}

// Handle record deletion
if (isset($_POST['delete'])) {
    $data = [
        'id' => defending($_POST['id'])
    ];
    $result = delete_record($data);
    if ($result === true) {
        set_flash_message('success', 'ลบข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด: ' . $result); // Display specific error
    }
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page
    exit();
}

// Prepare data for header
$dataheader = [
    "title" => "จัดการการจองรถ",
    "icon" => "bx bxs-car",
    "list" => [
        [
            "data" => "จัดการการจองรถ",
            "active" => true
        ]
    ]
];
generateHeaderHTML($dataheader, $system, $route);
?>
