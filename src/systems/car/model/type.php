<?php

// Function to find all records
function find_all_records()
{
    $sql = "SELECT
        cars_bookings.id,
        cars_bookings.car_id,
        cars_bookings.z_user,
        cars_bookings.z_organization,
        cars_bookings.start_datetime,
        cars_bookings.end_datetime,
        cars_bookings.status,
        cars_bookings.reason
    FROM
        cars_bookings
    LEFT JOIN z_user ON cars_bookings.z_user = z_user.user_id
    ORDER BY
        cars_bookings.id DESC";
        
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return ['error' => mysqli_error($GLOBALS['CON'])];
    }
}

// Function to find a specific record by ID
function find_one_record($id)
{
    $sql = "SELECT * FROM cars_bookings WHERE id = ?";
    $stmt = mysqli_prepare($GLOBALS['CON'], $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        return ['error' => mysqli_error($GLOBALS['CON'])];
    }
}

// Function to create a new record
function create_record($data)
{
    $sql = "INSERT INTO cars_bookings (car_id, z_user, z_organization, start_datetime, end_datetime, status, reason) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($GLOBALS['CON'], $sql);

    // 'i' for int, 's' for string, 'ss' for datetime and varchar fields
    mysqli_stmt_bind_param($stmt, 'iiissss', 
        $data['car_id'], $data['z_user'], $data['z_organization'], $data['start_datetime'], 
        $data['end_datetime'], $data['status'], $data['reason']
    );

    $result = mysqli_stmt_execute($stmt);
    if ($result) {
        return true;
    } else {
        return ['error' => mysqli_error($GLOBALS['CON'])];
    }
}

// Function to update an existing record
function update_record($data)
{
    $sql = "UPDATE cars_bookings 
            SET car_id = ?, z_user = ?, z_organization = ?, start_datetime = ?, end_datetime = ?, 
                status = ?, reason = ?
            WHERE id = ?";
    $stmt = mysqli_prepare($GLOBALS['CON'], $sql);
    
    mysqli_stmt_bind_param($stmt, 'iiissssi', 
        $data['car_id'], $data['z_user'], $data['z_organization'], $data['start_datetime'], 
        $data['end_datetime'], $data['status'], $data['reason'], $data['id']
    );

    $result = mysqli_stmt_execute($stmt);
    if ($result) {
        return true;
    } else {
        return ['error' => mysqli_error($GLOBALS['CON'])];
    }
}

// Function to soft delete a record
function delete_record($id)
{
    // Ensure the table has a 'deleted' column, or change to actual delete
    $sql = "UPDATE cars_bookings 
            SET deleted = 1 
            WHERE id = ?";
    $stmt = mysqli_prepare($GLOBALS['CON'], $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    
    $result = mysqli_stmt_execute($stmt);
    if ($result) {
        return true;
    } else {
        return ['error' => mysqli_error($GLOBALS['CON'])];
    }
}
function fetch_all_cars()
{
    $sql = "SELECT * FROM cars_car";
    $stmt = mysqli_prepare($GLOBALS['CON'], $sql);
    
    // Execute the statement
    mysqli_stmt_execute($stmt);
    
    // Get the result
    $result = mysqli_stmt_get_result($stmt);
    
    if ($result) {
        // Fetch all rows as an associative array
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        // Return an error message if something went wrong
        return ['error' => mysqli_error($GLOBALS['CON'])];
    }
}
function fetch_all_users()
{
    $sql = "SELECT * FROM z_user";
    $stmt = mysqli_prepare($GLOBALS['CON'], $sql);
    
    // Execute the statement
    mysqli_stmt_execute($stmt);
    
    // Get the result
    $result = mysqli_stmt_get_result($stmt);
    
    if ($result) {
        // Fetch all rows as an associative array
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        // Return an error message if something went wrong
        return ['error' => mysqli_error($GLOBALS['CON'])];
    }
}

?>
