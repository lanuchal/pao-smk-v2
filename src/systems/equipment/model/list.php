<?php
// Function to find all equipment_models
function find_all_equipment()
{
    $sql = "SELECT
                equipment.*, 
                z_affiliation.`name` AS a_name, 
                equipment_model.`name` AS m_name, 
                equipment_band.`name` AS b_name
            FROM
                equipment
                LEFT JOIN
                equipment_band
                ON 
                    equipment.equipment_band_id = equipment_band.id
                LEFT JOIN
                equipment_model
                ON 
                    equipment.equipment_model_id = equipment_model.id
                LEFT JOIN
                z_affiliation
                ON 
                    equipment.z_affiliation_id = z_affiliation.id
            WHERE
                equipment.deleted = 0";
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to create a new equipment_model
function create_equipment($data)
{
    // การสร้างคำสั่ง SQL โดยใช้การเชื่อมสายอักขระอย่างถูกต้อง
    $sql = "INSERT INTO equipment (property_code, property_name, equipment_band_id, equipment_model_id, resive_date, sn, price, equipment_status_id, form, remark, z_affiliation_id, create_by) 
            VALUES (
                '" . $data['property_code'] . "', 
                '" . $data['property_name'] . "', 
                '" . $data['equipment_band_id'] . "', 
                '" . $data['equipment_model_id'] . "', 
                '" . $data['resive_date'] . "', 
                '" . $data['sn'] . "', 
                '" . $data['price'] . "', 
                '" . $data['equipment_status_id'] . "', 
                '" . $data['form'] . "', 
                '" . $data['remark'] . "', 
                '" . $data['z_affiliation_id'] . "', 
                '" . $_SESSION['username'] . "'
            )";

    // เรียกใช้งาน mysqli_query เพื่อรัน SQL
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if (!$result) {
        // แสดงข้อผิดพลาดที่เกิดขึ้น
        echo "Error: " . mysqli_error($GLOBALS['CON']);
        return false;
    }

    return true;
}


function update_equipment($data)
{
    // ตรวจสอบให้แน่ใจว่ามี `id` สำหรับอัพเดต
    if (!isset($data['id']) || empty($data['id'])) {
        echo "Error: ID is required for update.";
        return false;
    }

    // สร้างคำสั่ง SQL สำหรับการอัพเดตข้อมูลในตาราง equipment
    $sql = "UPDATE equipment SET 
                property_code = '" . $data['property_code'] . "', 
                property_name = '" . $data['property_name'] . "', 
                equipment_band_id = '" . $data['equipment_band_id'] . "', 
                equipment_model_id = '" . $data['equipment_model_id'] . "', 
                resive_date = '" . $data['resive_date'] . "', 
                sn = '" . $data['sn'] . "', 
                price = '" . $data['price'] . "', 
                equipment_status_id = '" . $data['equipment_status_id'] . "', 
                form = '" . $data['form'] . "', 
                remark = '" . $data['remark'] . "', 
                z_affiliation_id = '" . $data['z_affiliation_id'] . "', 
                update_by = '" . $_SESSION['username'] . "'
            WHERE id = '" . $data['id'] . "'";

    // เรียกใช้งาน mysqli_query เพื่อรัน SQL
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if (!$result) {
        // แสดงข้อผิดพลาดที่เกิดขึ้น
        echo "Error: " . mysqli_error($GLOBALS['CON']);
        return false;
    }

    return true;
}



function delete_equipment($data)
{
    // ตรวจสอบให้แน่ใจว่ามี `id` สำหรับอัพเดต
    if (!isset($data['id']) || empty($data['id'])) {
        echo "Error: ID is required for delete.";
        return false;
    }

    // สร้างคำสั่ง SQL สำหรับการอัพเดตข้อมูลในตาราง equipment
    $sql = "UPDATE equipment SET 
                deleted = '1', 
                update_by = '" . $_SESSION['username'] . "'
            WHERE id = '" . $data['id'] . "'";

    // เรียกใช้งาน mysqli_query เพื่อรัน SQL
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if (!$result) {
        // แสดงข้อผิดพลาดที่เกิดขึ้น
        echo "Error: " . mysqli_error($GLOBALS['CON']);
        return false;
    }

    return true;
}
