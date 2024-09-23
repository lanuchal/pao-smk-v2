<?php

// Function to find all records
function find_all_records()
{
    $sql = "SELECT * FROM room_event";
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to find a specific record by ID
function find_one_record($data)
{
    $sql = "SELECT * FROM room_event WHERE id = ?";
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

// Function to create a new record
function create_record($data)
{
    $sql = "INSERT INTO room_event (id_member, status, rooms, title, start, end, color, division, people, style, equipment, member, etc) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($GLOBALS['CON'], $sql);
    
    // Corrected parameter types: 'i' for int, 's' for string, 'ss' for datetime and varchar fields
    mysqli_stmt_bind_param($stmt, 'iiissssisssss', 
        $data['id_member'], $data['status'], $data['rooms'], $data['title'], $data['start'], $data['end'], $data['color'], 
        $data['division'], $data['people'], $data['style'], $data['equipment'], $data['member'], $data['etc']
    );

    $result = mysqli_stmt_execute($stmt);
    return $result ? true : mysqli_error($GLOBALS['CON']); // Returns false or the error
}

// Function to update an existing record
function update_record($data)
{
    $sql = "UPDATE room_event 
            SET id_member = ?, status = ?, rooms = ?, title = ?, start = ?, end = ?, color = ?, division = ?, people = ?, 
                style = ?, equipment = ?, member = ?, etc = ?
            WHERE id = ?";
    $stmt = mysqli_prepare($GLOBALS['CON'], $sql);
    
    mysqli_stmt_bind_param($stmt, 'iiissssisssssi', 
        $data['id_member'], $data['status'], $data['rooms'], $data['title'], $data['start'], $data['end'], $data['color'], 
        $data['division'], $data['people'], $data['style'], $data['equipment'], $data['member'], $data['etc'], $data['id']
    );

    $result = mysqli_stmt_execute($stmt);
    return $result ? true : mysqli_error($GLOBALS['CON']); // Returns false or the error
}

// Function to soft delete a record
function delete_record($data)
{
    $sql = "UPDATE room_event 
            SET deleted = 1 
            WHERE id = ?";
    $stmt = mysqli_prepare($GLOBALS['CON'], $sql);
    mysqli_stmt_bind_param($stmt, 'i', $data['id']);
    
    $result = mysqli_stmt_execute($stmt);
    return $result ? true : mysqli_error($GLOBALS['CON']); // Returns false or the error
}

?>
