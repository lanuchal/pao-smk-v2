<?php


require_once "assets/lib/excel/PHPExcel.php";
includeIfExists('systems/' . defending($_GET['s']) . '/model/listHph.php');

$data_import = [];

if (isset($_POST['import'])) {
    if ($_FILES['file_input']['name']) {
        $tmpfname = $_FILES['file_input']['tmp_name']; // Get the temporary file name from the upload

        try {
            // Create an Excel Reader for the uploaded file
            $excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
            $excelObj = $excelReader->load($tmpfname); // Load the file
            $totalSheets = $excelObj->getSheetCount(); // Get total number of sheets
            $sheetNames = $excelObj->getSheetNames(); // Get names of all sheets

            // Loop through all the sheets
            for ($sheetIndex = 0; $sheetIndex < $totalSheets; $sheetIndex++) {
                $worksheet = $excelObj->getSheet($sheetIndex); // Get each sheet by index
                $sheetName = $sheetNames[$sheetIndex]; // Get the name of the current sheet
                $lastRow = $worksheet->getHighestRow(); // Get the last row number in the current sheet
                if ($sheetName == 'ตารางเงินเดือน') {

                    for ($row = 4; $row <= $lastRow; $row++) {
                        $first_name = $worksheet->getCell('B' . $row)->getValue();
                        $last_name = $worksheet->getCell('C' . $row)->getValue();

                        if ($first_name && !$last_name) {
                            $data['address'] = $first_name;
                        }
                        if ($first_name && $last_name) {
                            $data['full_name'] = $first_name . " " . $last_name;
                            $data['revenue_salary'] = $worksheet->getCell('L' . $row)->getValue() ?? '0';
                            $data['revenue_retro_salary'] = $worksheet->getCell('M' . $row)->getValue() ?? '0';
                            $data['revenue_allowance'] = $worksheet->getCell('N' . $row)->getValue() ?? '0';
                            $data['revenue_retro_allowance'] = $worksheet->getCell('O' . $row)->getValue() ?? '0';
                            $data['revenue_position'] = $worksheet->getCell('P' . $row)->getValue() ?? '0';
                            $data['revenue_retro_position'] = $worksheet->getCell('Q' . $row)->getValue() ?? '0';
                            $data['revenue_academic'] = $worksheet->getCell('R' . $row)->getValue() ?? '0';
                            $data['revenue_retro_academic'] = $worksheet->getCell('S' . $row)->getValue() ?? '0';
                            $data['revenue_cost_of_living'] = $worksheet->getCell('T' . $row)->getValue() ?? '0';
                            $data['revenue_retro_cost_of_living'] = $worksheet->getCell('U' . $row)->getValue() ?? '0';
                            $data['revenue_total_earnings'] = $worksheet->getCell('V' . $row)->getValue() ?? '0';
                            $data['expenses_income_tax'] = $worksheet->getCell('W' . $row)->getValue() ?? '0';
                            $data['expenses_social_security'] = $worksheet->getCell('X' . $row)->getValue() ?? '0';
                            $data['expenses_gpf'] = $worksheet->getCell('Y' . $row)->getValue() ?? '0';
                            $data['expenses_lgpf'] = $worksheet->getCell('Z' . $row)->getValue() ?? '0';
                            $data['expenses_cooperative_pao'] = $worksheet->getCell('AA' . $row)->getValue() ?? '0';
                            $data['expenses_cooperative_teachers'] = $worksheet->getCell('AB' . $row)->getValue() ?? '0';
                            $data['expenses_cooperative_health'] = $worksheet->getCell('AC' . $row)->getValue() ?? '0';
                            $data['expenses_slf'] = $worksheet->getCell('AD' . $row)->getValue() ?? '0';
                            $data['expenses_gsb'] = $worksheet->getCell('AE' . $row)->getValue() ?? '0';
                            $data['expenses_ktb'] = $worksheet->getCell('AF' . $row)->getValue() ?? '0';
                            $data['expenses_ghb'] = $worksheet->getCell('AG' . $row)->getValue() ?? '0';
                            $data['expenses_funeral_fund'] = $worksheet->getCell('AH' . $row)->getValue() ?? '0';
                            $data['expenses_ocean_life'] = $worksheet->getCell('AI' . $row)->getValue() ?? '0';
                            $data['expenses_welfare_chork'] = $worksheet->getCell('AJ' . $row)->getValue() ?? '0';
                            $data['expenses_welfare_chors'] = $worksheet->getCell('AK' . $row)->getValue() ?? '0';
                            $data['expenses_loan_chors'] = $worksheet->getCell('AL' . $row)->getValue() ?? '0';
                            $data['expenses_funeral_aid'] = $worksheet->getCell('AM' . $row)->getValue() ?? '0';
                            $data['expenses_total_deductions'] = $worksheet->getCell('AN' . $row)->getValue() ?? '0';
                            $data['expenses_remaining_balance'] = $worksheet->getCell('AO' . $row)->getValue() ?? '0';
                            $data['full_name_active'] = defending($_POST['full_name_active']);
                            $data['position_active'] = defending($_POST['position_active']);
                            $data['month'] = defending($_POST['month']);
                            $data['main'] = '3';
                            $find = find_one_payroll_pre($data);
                            if (sizeof($find) == 0) {
                                create_payroll_pre($data);
                            }
                        }
                    }
                }
            }
        } catch (Exception $e) {
            echo 'Error loading file: ' . $e->getMessage();
        }
    }
}



if (isset($_POST['update'])) {
    $data['id'] = defending($_POST['id']);
    $data['full_name'] = defending($_POST['full_name']);
    $data['revenue_salary'] = defending($_POST['revenue_salary']);
    $data['revenue_retro_salary'] = defending($_POST['revenue_retro_salary']);
    $data['revenue_allowance'] = defending($_POST['revenue_allowance']);
    $data['revenue_retro_allowance'] = defending($_POST['revenue_retro_allowance']);
    $data['revenue_position'] = defending($_POST['revenue_position']);
    $data['revenue_retro_position'] = defending($_POST['revenue_retro_position']);
    $data['revenue_academic'] = defending($_POST['revenue_academic']);
    $data['revenue_retro_academic'] = defending($_POST['revenue_retro_academic']);
    $data['revenue_cost_of_living'] = defending($_POST['revenue_cost_of_living']);
    $data['revenue_retro_cost_of_living'] = defending($_POST['revenue_retro_cost_of_living']);
    $data['revenue_total_earnings'] = defending($_POST['revenue_total_earnings']);
    $data['expenses_income_tax'] = defending($_POST['expenses_income_tax']);
    $data['expenses_social_security'] = defending($_POST['expenses_social_security']);
    $data['expenses_gpf'] = defending($_POST['expenses_gpf']);
    $data['expenses_lgpf'] = defending($_POST['expenses_lgpf']);
    $data['expenses_cooperative_pao'] = defending($_POST['expenses_cooperative_pao']);
    $data['expenses_cooperative_teachers'] = defending($_POST['expenses_cooperative_teachers']);
    $data['expenses_cooperative_health'] = defending($_POST['expenses_cooperative_health']);
    $data['expenses_slf'] = defending($_POST['expenses_slf']);
    $data['expenses_gsb'] = defending($_POST['expenses_gsb']);
    $data['expenses_ktb'] = defending($_POST['expenses_ktb']);
    $data['expenses_ghb'] = defending($_POST['expenses_ghb']);
    $data['expenses_funeral_fund'] = defending($_POST['expenses_funeral_fund']);
    $data['expenses_ocean_life'] = defending($_POST['expenses_ocean_life']);
    $data['expenses_welfare_chork'] = defending($_POST['expenses_welfare_chork']);
    $data['expenses_welfare_chors'] = defending($_POST['expenses_welfare_chors']);
    $data['expenses_loan_chors'] = defending($_POST['expenses_loan_chors']);
    $data['expenses_funeral_aid'] = defending($_POST['expenses_funeral_aid']);
    $data['expenses_total_deductions'] = defending($_POST['expenses_total_deductions']);
    $data['expenses_remaining_balance'] = defending($_POST['expenses_remaining_balance']);
    $data['address'] = defending($_POST['address']);

    $result = update_payroll_pre($data);
    // exit();
    if ($result) {
        set_flash_message('success', 'แก้ไขข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}


if (isset($_POST['save'])) {

    $data['id'] = defending($_POST['id']);
    $payroll_pres = json_decode($_POST['payroll_pres'], true);
    // print_r($payroll_pres);
    if (sizeof($payroll_pres) > 0) {
        foreach ($payroll_pres as $key => $row) {
            $data['full_name'] = $row['full_name'];
            $data['revenue_salary'] = $row['revenue_salary'];
            $data['revenue_retro_salary'] = $row['revenue_retro_salary'];
            $data['revenue_allowance'] = $row['revenue_allowance'];
            $data['revenue_retro_allowance'] = $row['revenue_retro_allowance'];
            $data['revenue_position'] = $row['revenue_position'];
            $data['revenue_retro_position'] = $row['revenue_retro_position'];
            $data['revenue_academic'] = $row['revenue_academic'];
            $data['revenue_retro_academic'] = $row['revenue_retro_academic'];
            $data['revenue_cost_of_living'] = $row['revenue_cost_of_living'];
            $data['revenue_retro_cost_of_living'] = $row['revenue_retro_cost_of_living'];
            $data['revenue_total_earnings'] = $row['revenue_total_earnings'];
            $data['expenses_income_tax'] = $row['expenses_income_tax'];
            $data['expenses_social_security'] = $row['expenses_social_security'];
            $data['expenses_gpf'] = $row['expenses_gpf'];
            $data['expenses_lgpf'] = $row['expenses_lgpf'];
            $data['expenses_cooperative_pao'] = $row['expenses_cooperative_pao'];
            $data['expenses_cooperative_teachers'] = $row['expenses_cooperative_teachers'];
            $data['expenses_cooperative_health'] = $row['expenses_cooperative_health'];
            $data['expenses_slf'] = $row['expenses_slf'];
            $data['expenses_gsb'] = $row['expenses_gsb'];
            $data['expenses_ktb'] = $row['expenses_ktb'];
            $data['expenses_ghb'] = $row['expenses_ghb'];
            $data['expenses_funeral_fund'] = $row['expenses_funeral_fund'];
            $data['expenses_ocean_life'] = $row['expenses_ocean_life'];
            $data['expenses_welfare_chork'] = $row['expenses_welfare_chork'];
            $data['expenses_welfare_chors'] = $row['expenses_welfare_chors'];
            $data['expenses_loan_chors'] = $row['expenses_loan_chors'];
            $data['expenses_funeral_aid'] = $row['expenses_funeral_aid'];
            $data['expenses_total_deductions'] = $row['expenses_total_deductions'];
            $data['expenses_remaining_balance'] = $row['expenses_remaining_balance'];
            $data['full_name_active'] = $row['full_name_active'];
            $data['position_active'] = $row['position_active'];
            $data['month'] = $row['month'];
            $data['main'] = $row['main'];
            create_payroll($data);
        }
    }


    $data['main'] = '3';
    $result = clear_payroll_pre($data);

    if ($result) {
        set_flash_message('success', 'อัปเดตมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }

    $link_redirect = '?s=' . defending($_GET['s']) . '&p=listHph';
    echo "<script>window.location.href='" . $link_redirect . "';</script>";
}



if (isset($_POST['delete'])) {
    $data['id'] = defending($_POST['id']);
    $result = delete_payroll_pre($data);
    if ($result) {
        set_flash_message('success', 'ลบข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}

if (isset($_POST['clear'])) {
    $data['main'] = '3';
    $result = clear_payroll_pre($data);
    if ($result) {
        set_flash_message('success', 'ลบข้อมูลสำเร็จ');
    } else {
        set_flash_message('danger', 'เกิดข้อผิดพลาด');
    }
    echo "<script>window.location.href='';</script>";
}
