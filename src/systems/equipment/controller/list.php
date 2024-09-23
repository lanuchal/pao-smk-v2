<?php

includeIfExists('systems/' . defending($_GET['s']) . '/model/band.php');
includeIfExists('systems/' . defending($_GET['s']) . '/model/model.php');
includeIfExists('systems/' . defending($_GET['s']) . '/model/status.php');
includeIfExists('systems/employee/model/affiliation.php');

// require_once "assets/lib/excel/PHPExcel.php"; //เรียกใช้ library สำหรับอ่านไฟล์ excel
// $tmpfname = "data.xlsx"; //กำหนดให้อ่านข้อมูลจากไฟล์จากไฟล์ชื่อ
// // สร้าง object สำหรับอ่านข้อมูลชื่อ $excelReader
// $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
// $excelObj = $excelReader->load($tmpfname); // อ่านข้อมูลจากไฟล์
// $totalSheets = $excelObj->getSheetCount(); // นับจำนวน sheet ทั้งหมดในไฟล์

// function excelSerialDateToDate($serialDate)
// {
//     // วันที่เริ่มต้นของ Excel คือวันที่ 1 มกราคม 1900
//     $baseDate = new DateTime("1899-12-30"); // ใช้ 30 ธันวาคม 1899 เพราะ Excel นับผิดในปี leap ของ 1900

//     // เพิ่มจำนวนวันที่จาก serial date
//     $baseDate->modify("+{$serialDate} days");

//     // ส่งค่ากลับเป็นรูปแบบ Y-m-d
//     return $baseDate->format('Y-m-d');
// }

// // Loop สำหรับอ่านข้อมูลจากทุก sheet
// $z_affiliation_id = "";
// for ($sheetIndex = 1; $sheetIndex < $totalSheets; $sheetIndex++) {

//     switch ($sheetIndex) {
//         case 0:
//             $z_affiliation_id = '19';
//             break;
//         case 1:
//             $z_affiliation_id = '20';
//             break;
//         case 2:
//             $z_affiliation_id = '21';
//             break;
//         case 3:
//             $z_affiliation_id = '22';
//             break;
//         case 4:
//             $z_affiliation_id = '23';
//             break;
//         case 5:
//             $z_affiliation_id = '24';
//             break;
//         case 6:
//             $z_affiliation_id = '25';
//             break;
//         case 7:
//             $z_affiliation_id = '26';
//             break;
//         case 8:
//             $z_affiliation_id = '27';
//             break;
//         case 9:
//             $z_affiliation_id = '28';
//             break;
//         default:
//             $z_affiliation_id = '19';
//             break;
//     }

//     // echo $sheetIndex . " ";
//     $worksheet = $excelObj->getSheet($sheetIndex); // อ่านข้อมูลจากแต่ละ sheet
//     $lastRow = $worksheet->getHighestRow(); // นับจำนวนแถวทั้งหมดใน sheet ปัจจุบัน

//     // echo "<br>";
//     // echo "Sheet " . ($sheetIndex + 1) . " has " . $lastRow . " rows.<br><br>";

//     // วน loop อ่านข้อมูลในแต่ละแถวของ sheet ปัจจุบัน
//     for ($row = 4; $row <= $lastRow; $row++) {

//         $equipment_band['name'] = $worksheet->getCell('C' . $row)->getValue();
//         if ($equipment_band['name'] == "") {
//             $equipment_band['name'] = "ยังไม่ระบุ";
//         }
//         $find_band = find_one_equipment_band_by_name($equipment_band);


//         $equipment_modal['name'] = $worksheet->getCell('D' . $row)->getValue();
//         if ($equipment_modal['name'] == "") {
//             $equipment_modal['name'] = "ยังไม่ระบุ";
//         }
//         $find_modal = find_one_equipment_model_by_name($equipment_modal);

//         $equipment_status['name'] = $worksheet->getCell('H' . $row)->getValue();
//         if ($equipment_status['name'] == "") {
//             $equipment_status['name'] = "ยังไม่ระบุ";
//         }
//         echo "<br>" . "equipment_status = " . $equipment_status['name'] . "<br>";
//         $find_status = find_one_equipment_status_by_name($equipment_status);


//         $data['property_code'] = $worksheet->getCell('A' . $row)->getValue();
//         $data['property_name'] = $worksheet->getCell('B' . $row)->getValue();
//         $data['equipment_band_id'] = $find_band['id'];
//         $data['equipment_model_id'] = $find_modal['id'];
//         $data['sn'] = $worksheet->getCell('E' . $row)->getValue();
//         $data['resive_date'] = excelSerialDateToDate($worksheet->getCell('F' . $row)->getValue());
//         $data['price'] = $worksheet->getCell('G' . $row)->getValue();
//         $data['equipment_status_id'] = $find_status['id'];
//         $data['form'] = $worksheet->getCell('I' . $row)->getValue();
//         $data['remark'] = $worksheet->getCell('J' . $row)->getValue();
//         $data['z_affiliation_id'] = $z_affiliation_id;


//         if ($data['property_code']) {
//             $create = create_equipment($data);
//         }

//         echo "<br> date = ";
//         // echo $data['resive_date'];
//         print_r($find_status);
//         echo "<br>";

//         if ($create) {
//             echo "success=";
//             // print_r($data);
//         } else {
//             echo "error =";
//             // print_r($data);
//             //             // สร้างข้อมูลใหม่ถ้าไม่พบ
//             //             create_equipment_model($data);
//             //             // echo "created = " . $data['name'] . "<br>";
//         }
//         echo "<br>";
//         // break;


//         // $data['name'] = $worksheet->getCell('C' . $row)->getValue();
//         // if ($data['name'] == "") {
//         //     $data['name'] = "ยังไม่มียี่ห้อ";
//         // }
//         // echo "shett = ".$z_affiliation_id." / ".$data['name']."<br>";

//         // ค้นหาข้อมูลจาก database โดยใช้ชื่อ
//         // $find = find_one_equipment_band_by_name($data);

//     }
//     // echo "<br><br>";
// }


if (isset($_POST['create'])) {
    $data['property_code'] = defending($_POST['property_code']);
    $data['property_name'] = defending($_POST['property_name']);
    $data['equipment_band_id'] = defending($_POST['equipment_band_id']);
    $data['equipment_model_id'] = defending($_POST['equipment_model_id']);
    $data['sn'] = defending($_POST['sn']);
    $data['resive_date'] = defending($_POST['resive_date']);
    $data['price'] = defending($_POST['price']);
    $data['equipment_status_id'] = defending($_POST['equipment_status_id']);
    $data['form'] = defending($_POST['form']);
    $data['remark'] = defending($_POST['remark']);
    $data['z_affiliation_id'] = defending($_POST['z_affiliation_id']);
    $result = create_equipment($data);
    if ($result) {
        set_flash_message('success', 'เพิ่มข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['edit'])) {
    $data['id'] = defending($_POST['id']);
    $data['property_code'] = defending($_POST['property_code']);
    $data['property_name'] = defending($_POST['property_name']);
    $data['equipment_band_id'] = defending($_POST['equipment_band_id']);
    $data['equipment_model_id'] = defending($_POST['equipment_model_id']);
    $data['sn'] = defending($_POST['sn']);
    $data['resive_date'] = defending($_POST['resive_date']);
    $data['price'] = defending($_POST['price']);
    $data['equipment_status_id'] = defending($_POST['equipment_status_id']);
    $data['form'] = defending($_POST['form']);
    $data['remark'] = defending($_POST['remark']);
    $data['z_affiliation_id'] = defending($_POST['z_affiliation_id']);
    $result = update_equipment($data);
    if ($result) {
        set_flash_message('success', 'แก้ไขข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['delete'])) {
    $data['id'] = defending($_POST['id']);
    echo "id = ".$data['id'];
    $result = delete_equipment($data);
    if ($result) {
        set_flash_message('success', 'ลบข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}



$dataheader = [
    "title" => "อุปกรณ์",
    "icon" => "bx bxs-mouse-alt",
    "list" => [
        [
            "data" => "อุปกรณ์",
            "active" => true
        ]
    ]
];
generateHeaderHTML($dataheader, $system, $route);
