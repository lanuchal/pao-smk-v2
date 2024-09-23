<?php
// Function to find all positions
function find_all_position()
{
    $sql = "SELECT * FROM z_position WHERE deleted = 0";
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to find a specific position by ID
function find_one_position($data)
{
    $sql = "SELECT * FROM z_position WHERE id = ? AND deleted = 0";
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

// Function to create a new position
function create_position($data)
{
    $sql = "INSERT INTO z_position (name, create_by) VALUES ('{$data['name']}', '{$_SESSION['username']}')";
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}




// Function to update an existing position
function update_position($data)
{
    $sql = "UPDATE z_position SET name = '{$data['name']}', update_by = '{$_SESSION['username']}' WHERE id = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}



// Function to delete an position (soft delete)
function delete_position($data)
{
    $sql = "UPDATE z_position SET deleted = 1 WHERE id = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}


