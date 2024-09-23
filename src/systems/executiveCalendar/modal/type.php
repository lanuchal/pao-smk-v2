<?php
// Function to find all types
function find_all_records()
{
    $sql = "SELECT * FROM executivecalendar_calendar";  // Replace 'your_table_name' with the actual table name
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}


// Function to find a specific type by ID
function find_one_record($data)
{
    $sql = "SELECT * FROM executivecalendar_calendar WHERE id = ?";
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

// Function to create a new type
// Function to create a new record
function create_record($data)
{
    $sql = "INSERT INTO executivecalendar_calendar (title, start, end, color) 
            VALUES ('{$data['title']}', '{$data['start']}', '{$data['end']}', '{$data['color']}')";
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

// Function to update an existing record
function update_record($data)
{
    $sql = "UPDATE executivecalendar_calendar 
            SET title = '{$data['title']}', start = '{$data['start']}', end = '{$data['end']}', color = '{$data['color']}'
            WHERE id = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

// Function to soft delete a record
function delete_record($data)
{
    $sql = "UPDATE executivecalendar_calendar 
            SET deleted = 1 
            WHERE id = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}
