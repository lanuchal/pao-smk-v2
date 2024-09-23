<?php
includeIfExists('systems/' . defending($_GET['s']) . '/model/type.php');

if (isset($_POST['create'])) {
    $data = [
        'title' => defending($_POST['title']) ?? '',
        'date_create' => defending($_POST['date_create']) ?? '',
        'detail' => defending($_POST['detail']) ?? '',
        'type_id' => defending($_POST['type_id']) ?? '',

    ];

    if (!empty($_FILES['img']['name'])) {
        $upload_dir = "./uploads/lms/";
        $file_extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        $new_file_name = uniqid() . '.' . $file_extension;
        $target_file = $upload_dir . $new_file_name;
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
            $data['img'] = $new_file_name;
        } else {
            $data['img'] = '';
        }
    }
    $result = create_lms($data);
    if ($result) {
        set_flash_message('success', 'เพิ่มข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['img'])) {
    $data = [
        'id' => defending($_POST['id']) ?? null,
    ];

    if (!empty($_FILES['img']['name'])) {
        $upload_dir = "./uploads/lms/";
        $file_extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        $new_file_name = uniqid() . '.' . $file_extension;
        $target_file = $upload_dir . $new_file_name;
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
            $data['img'] = $new_file_name;
        } else {
            $data['img'] = '';
        }
    }

    $result = update_lms_img($data);
    if ($result) {
        set_flash_message('success', 'แก้ไขข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['update'])) {
    $data = [
        'id' => defending($_POST['id']) ?? null,
        'title' => defending($_POST['title']) ?? '',
        'date_create' => defending($_POST['date_create']) ?? '',
        'detail' => defending($_POST['detail']) ?? '',
        'type_id' => defending($_POST['type_id']) ?? '',
    ];


    $result = update_lms($data);
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
    $result = delete_lms($data);
    if ($result) {
        set_flash_message('success', 'ลบข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}


$dataheader = [
    "title" => "รายการ",
    "icon" => "bx bxs-memory-card",
    "list" => [
        [
            "data" => "รายการ",
            "active" => true
        ]
    ]
];
generateHeaderHTML($dataheader, $system, $route);

// get all data 

// $lmss = find_all_lms();


// print_r($lmss);
// echo "waaa<br>";