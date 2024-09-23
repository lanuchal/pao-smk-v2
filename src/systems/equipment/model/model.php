<?php
// Function to find all equipment_models
function find_all_equipment_model()
{
    $sql = "SELECT * FROM equipment_model WHERE deleted = 0";
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to find a specific equipment_model by ID
function find_one_equipment_model_by_name($data)
{
    $sql = "SELECT * FROM equipment_model WHERE name = ? AND deleted = 0";
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

function find_one_equipment_model($data)
{
    $sql = "SELECT * FROM equipment_model WHERE id = ? AND deleted = 0";
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

// Function to create a new equipment_model
function create_equipment_model($data)
{
    $sql = "INSERT INTO equipment_model (name, create_by) VALUES ('{$data['name']}', '{$_SESSION['username']}')";
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

// Function to update an existing equipment_model
function update_equipment_model($data)
{
    $sql = "UPDATE equipment_model SET name = '{$data['name']}', update_by = '{$_SESSION['username']}' WHERE id = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

// Function to delete an equipment_model (soft delete)
function delete_equipment_model($data)
{
    $sql = "UPDATE equipment_model SET deleted = 1 WHERE id = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}
