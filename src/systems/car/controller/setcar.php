<?php

// Handle create operation
if (isset($_POST['create'])) {
    try {
        // Handle file upload
        $uploadedFileName = uploadFile($_FILES['image']);
    } catch (Exception $e) {
        set_flash_message('danger', 'เกิดข้อผิดพลาดในการอัพโหลดไฟล์: ' . $e->getMessage());
        echo "<script>window.location.href='';</script>";
    }

    $data = [
        'car_name' => trim(defending($_POST['car_name'])),
        'car_type' => defending($_POST['car_type']),
        'plate_number' => defending($_POST['plate_number']),
        'status' => defending($_POST['status']),
        'color' => defending($_POST['color']),
        'capacity' => intval(defending($_POST['capacity'])),
        'image' => $uploadedFileName, // Save the uploaded file name
    ];

    $result = create_record($data);
    if ($result) {
        set_flash_message('success', 'เพิ่มข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }

    echo "<script>window.location.href='';</script>";
}

// Handle update operation
if (isset($_POST['update'])) {
    $data['id'] = defending($_POST['id']);
    $data['car_name'] = defending($_POST['car_name']);
    $data['car_type'] = defending($_POST['car_type']);
    $data['plate_number'] = defending($_POST['plate_number']);
    $data['status'] = defending($_POST['status']);
    $data['color'] = defending($_POST['color']);
    $data['capacity'] = intval(defending($_POST['capacity']));

    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $newFileName = $data['id'].".".$extension;
    $data['image'] = $newFileName;
    $target_dir = "./uploads/cars/";
    $target_file = $target_dir . $newFileName;
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    $result = update_record($data);
    if ($result) {
        set_flash_message('success', 'แก้ไขข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }

    echo "<script>window.location.href='';</script>";
}

// Handle delete operation
if (isset($_POST['delete'])) {
    $data = [
        'id' => intval(defending($_POST['id'])),
    ];

    $result = delete_record($data);
    if ($result) {
        set_flash_message('success', 'ลบข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }

    echo "<script>window.location.href='';</script>";
}

// Generate header
$dataheader = [
    "title" => "จัดการรถยนต์",
    "icon" => "bx bxs-car",
    "list" => [
        [
            "data" => "จัดการรถยนต์",
            "active" => true
        ]
    ]
];
generateHeaderHTML($dataheader, $system, $route);

?>
