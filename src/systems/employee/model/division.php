<?php
// Function to find all divisions
function find_all_division()
{
    $sql = "SELECT * FROM z_division WHERE deleted = 0";
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to find a specific division by ID
function find_one_division($data)
{
    $sql = "SELECT * FROM z_division WHERE id = ? AND deleted = 0";
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

// Function to create a new division
function create_division($data)
{
    $sql = "INSERT INTO z_division (name, create_by) VALUES ('{$data['name']}', '{$_SESSION['username']}')";
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}




// Function to update an existing division
function update_division($data)
{
    $sql = "UPDATE z_division SET name = '{$data['name']}', update_by = '{$_SESSION['username']}' WHERE id = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}



// Function to delete an division (soft delete)
function delete_division($data)
{
    $sql = "UPDATE z_division SET deleted = 1 WHERE id = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}


