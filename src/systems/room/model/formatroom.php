<?php
// Function to find all room styles
function find_all_records()
{
    $sql = "SELECT * FROM room_style";  // Replace 'room_styles' with your actual table name
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to find a specific room style by ID
function find_one_room_style($data)
{
    $sql = "SELECT * FROM room_style WHERE id_style = ?";
    $stmt = mysqli_prepare($GLOBALS['CON'], $sql);
    mysqli_stmt_bind_param($stmt, 'i', $data['id_style']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

// Function to create a new room style
function create_room_style($data)
{
    $sql = "INSERT INTO room_style (name_style, position) 
            VALUES ('{$data['name_style']}', '{$data['position']}')";
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

// Function to update an existing room style
function update_room_style($data)
{
    $sql = "UPDATE room_style 
            SET name_style = '{$data['name_style']}', position = '{$data['position']}'
            WHERE id_style = " . intval($data['id_style']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

// Function to delete a room style
function delete_room_style($data)
{
    $sql = "DELETE FROM room_style 
            WHERE id_style = " . intval($data['id_style']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}
?>
