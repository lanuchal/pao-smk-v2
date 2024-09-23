<?php

if (isset($_POST['create'])) {
    try {
        // Handle file upload
        $uploadedFileName = uploadFile($_FILES['image_rooms']);
    } catch (Exception $e) {
        set_flash_message('danger', 'เกิดข้อผิดพลาดในการอัพโหลดไฟล์: ' . $e->getMessage());
          echo "<script>window.location.href='';</script>";
        exit();
    }

    $data = [
        'name_rooms' => trim(defending($_POST['name_rooms'])),
        'people_rooms' => intval(defending($_POST['people_rooms'])),
        'color_rooms' => defending($_POST['color_rooms']),
        'image_rooms' => $uploadedFileName, // Save the uploaded file name
        'detail_rooms' => defending($_POST['detail_rooms']),
        'status' => defending($_POST['status']),
    ];

    $result = create_record($data);
    if ($result) {
        set_flash_message('success', 'เพิ่มข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
      echo "<script>window.location.href='';</script>";
    exit();
}

if (isset($_POST['update'])) {
    try {
        // Handle file upload if a new file is provided
        $uploadedFileName = isset($_FILES['image_rooms']) && $_FILES['image_rooms']['error'] == 0 
            ? uploadFile($_FILES['image_rooms']) 
            : defending($_POST['existing_image_rooms']); // Use existing file name if no new file is uploaded
    } catch (Exception $e) {
        set_flash_message('danger', 'เกิดข้อผิดพลาดในการอัพโหลดไฟล์: ' . $e->getMessage());
           echo "<script>window.location.href='';</script>";
        exit();
    }

    $data = [
        'id_rooms' => intval(defending($_POST['id_rooms'])),
        'name_rooms' => trim(defending($_POST['name_rooms'])),
        'people_rooms' => intval(defending($_POST['people_rooms'])),
        'color_rooms' => defending($_POST['color_rooms']),
        'image_rooms' => $uploadedFileName, // Save the uploaded file name or the existing one
        'detail_rooms' => defending($_POST['detail_rooms']),
        'status' => defending($_POST['status']),
    ];

    $result = update_record($data);

    if ($result) {
        set_flash_message('success', 'แก้ไขข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }

      echo "<script>window.location.href='';</script>";
    exit();
}

if (isset($_POST['delete'])) {
    $data = [
        'id_rooms' => intval(defending($_POST['id_rooms'])), // Ensure the key matches the database column
    ];

    $result = delete_record($data);

    if ($result) {
        set_flash_message('success', 'ลบข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }

      echo "<script>window.location.href='';</script>"; 
    exit();
}

$dataheader = [
    "title" => "ตั้งค่าห้องประชุม",
    "icon" => "bx bxs-layer",
    "list" => [
        [
            "data" => "จัดการห้องประชุม",
            "active" => true
        ]
    ]
];
generateHeaderHTML($dataheader, $system, $route);

?>
