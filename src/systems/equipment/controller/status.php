<?php
// require_once "assets/lib/excel/PHPExcel.php"; //เรียกใช้ library สำหรับอ่านไฟล์ excel
// $tmpfname = "data.xlsx"; //กำหนดให้อ่านข้อมูลจากไฟล์จากไฟล์ชื่อ
// // สร้าง object สำหรับอ่านข้อมูลชื่อ $excelReader
// $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
// $excelObj = $excelReader->load($tmpfname); // อ่านข้อมูลจากไฟล์
// $totalSheets = $excelObj->getSheetCount(); // นับจำนวน sheet ทั้งหมดในไฟล์

// // Loop สำหรับอ่านข้อมูลจากทุก sheet
// for ($sheetIndex = 1; $sheetIndex < $totalSheets; $sheetIndex++) {
//     $worksheet = $excelObj->getSheet($sheetIndex); // อ่านข้อมูลจากแต่ละ sheet
//     $lastRow = $worksheet->getHighestRow(); // นับจำนวนแถวทั้งหมดใน sheet ปัจจุบัน

//     // echo "<br>";
//     // echo "Sheet " . ($sheetIndex + 1) . " has " . $lastRow . " rows.<br><br>";

//     // วน loop อ่านข้อมูลในแต่ละแถวของ sheet ปัจจุบัน
//     for ($row = 4; $row <= $lastRow; $row++) {
//         $data['name'] = $worksheet->getCell('H' . $row)->getValue();
//         if ($data['name'] == "") {
//             $data['name'] = "ยังไม่ระบุ";
//         }

//         // ค้นหาข้อมูลจาก database โดยใช้ชื่อ
//         $find = find_one_equipment_status_by_name($data);

//         if ($find) {
//             // echo "no = " . $data['name'] . "<br>";
//         } else {
//             // สร้างข้อมูลใหม่ถ้าไม่พบ
//             create_equipment_status($data);
//             // echo "created = " . $data['name'] . "<br>";
//         }
//     }
//     // echo "<br><br>";
// }



if (isset($_POST['create'])) {
    $data['name'] = defending($_POST['name']);
    $result = create_equipment_status($data);
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
    $result = update_equipment_status($data);
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
    $result = delete_equipment_status($data);
    if ($result) {
        set_flash_message('success', 'ลบข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}


$dataheader = [
    "title" => "จัดการสถานะ",
    "icon" => "bx bxs-share-alt",
    "list" => [
        [
            "data" => "จัดการสถานะ",
            "active" => true
        ]
    ]
];
generateHeaderHTML($dataheader, $system, $route);
