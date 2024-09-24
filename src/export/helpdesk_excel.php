<?php
require_once "../assets/lib/excel/PHPExcel.php";

if (isset($_POST['export'])) {
    $data_report = json_decode($_POST['data_report'], true);
    if (!empty($data_report)) {
        export_to_excel($data_report);
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
        echo "<script>window.location.href='';</script>";
        exit;  // Ensure no further processing
    }
}

function export_to_excel($data)
{
    // Create a new PHPExcel object
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);
    $sheet = $objPHPExcel->getActiveSheet();

    // Set the header row with Thai labels
    $headers = [
        'วันที่แจ้ง', // request_date
        'ผู้แจ้งงาน', // r_fullname
        'รหัสทรัพย์สิน', // code
        'ชื่อทรัพย์สิน', // equipment_name
        'หน่วยงาน', // equipment_name
        'รายละเอียดแจ้งงาน', // detail
        'ประเภทงาน', // type_name
        'สถานะงาน', // status_name
        'สถานะอุปกรณ์', // equipment_status_name
        'ผู้รับงาน', // a_fullname
        'รายละเอียดการแก้ไขงาน' // detail_active
    ];

    // Add the headers to the first row
    $column = 'A';
    foreach ($headers as $header) {
        $sheet->setCellValue($column . '1', $header);
        // Set the header to bold
        $sheet->getStyle($column . '1')->getFont()->setBold(true);
        $column++;
    }


    // Add the data to the spreadsheet
    $row = 2; // Data starts from the second row
    foreach ($data as $record) {
        $column = 'A';
        $sheet->setCellValue($column . $row, $record['request_date']);
        $column++;
        $sheet->setCellValue($column . $row, $record['r_fullname']);
        $column++;
        $sheet->setCellValue($column . $row, $record['code']);
        $column++;
        $sheet->setCellValue($column . $row, $record['equipment_name']);
        $column++;
        $sheet->setCellValue($column . $row, $record['af_name']);
        $column++;
        $sheet->setCellValue($column . $row, $record['detail']);
        $column++;
        $sheet->setCellValue($column . $row, $record['type_name']);
        $column++;
        $sheet->setCellValue($column . $row, $record['status_name']);
        $column++;
        $sheet->setCellValue($column . $row, $record['equipment_status_name']);
        $column++;
        $sheet->setCellValue($column . $row, $record['a_fullname']);
        $column++;
        $sheet->setCellValue($column . $row, $record['detail_active']);
        $row++;
    }

    // Set the column width to auto-size
    foreach (range('A', $sheet->getHighestDataColumn()) as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    // Set the filename and create the Excel file
    $fileName = 'report_' . date('Y-m-d_H-i-s') . '.xlsx';

    // Set headers to trigger download
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=" . $fileName);
    header("Pragma: no-cache");
    header("Expires: 0");

    // Create and save the Excel file
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit;
}
