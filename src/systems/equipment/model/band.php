<?php
// Function to find all equipment_bands
function find_all_equipment_band()
{
    $sql = "SELECT * FROM equipment_band WHERE deleted = 0";
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to find a specific equipment_band by ID
function find_one_equipment_band_by_name($data)
{
    $sql = "SELECT * FROM equipment_band WHERE name = ? AND deleted = 0";
    $stmt = mysqli_prepare($GLOBALS['CON'], $sql);
    mysqli_stmt_bind_param($stmt, 's', $data['name']); // 's' สำหรับ string
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

function find_one_equipment_band($data)
{
    $sql = "SELECT * FROM equipment_band WHERE id = ? AND deleted = 0";
    $stmt = mysqli_prepare($GLOBALS['CON'], $sql);
    mysqli_stmt_bind_param($stmt, 'i', $data['id']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

// Function to create a new equipment_band
function create_equipment_band($data)
{
    $sql = "INSERT INTO equipment_band (name, create_by) VALUES ('{$data['name']}', '{$_SESSION['username']}')";
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

// Function to update an existing equipment_band
function update_equipment_band($data)
{
    $sql = "UPDATE equipment_band SET name = '{$data['name']}', update_by = '{$_SESSION['username']}' WHERE id = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

// Function to delete an equipment_band (soft delete)
function delete_equipment_band($data)
{
    $sql = "UPDATE equipment_band SET deleted = 1 WHERE id = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}
