<?php
// Function to find all equipment records
function find_all_equipment()
{
    $sql = "SELECT * FROM room_equipment"; // Replace 'equipment' with your actual table name
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to find a specific equipment by ID
function find_one_equipment($data)
{
    $sql = "SELECT * FROM room_equipment WHERE id_equipment = ?";
    $stmt = mysqli_prepare($GLOBALS['CON'], $sql);
    mysqli_stmt_bind_param($stmt, 'i', $data['id_equipment']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

// Function to create a new equipment record
function create_equipment($data)
{
    $sql = "INSERT INTO room_equipment (name_equipment, position) 
            VALUES ('{$data['name_equipment']}', '{$data['position']}')";
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

// Function to update an existing equipment record
function update_equipment($data)
{
    $sql = "UPDATE room_equipment 
            SET name_equipment = '{$data['name_equipment']}', position = '{$data['position']}'
            WHERE id_equipment = " . intval($data['id_equipment']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

// Function to delete an equipment record
function delete_equipment($data)
{
    $sql = "DELETE FROM room_equipment WHERE id_equipment = " . intval($data['id_equipment']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}
?>
