<?php
// Function to find all types
function find_all_type()
{
    $sql = "SELECT * FROM helpdesk_type WHERE deleted = 0";
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to find a specific type by ID
function find_one_type($data)
{
    $sql = "SELECT * FROM helpdesk_type WHERE id = ? AND deleted = 0";
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
function create_type($data)
{
    $sql = "INSERT INTO helpdesk_type (name, create_by) VALUES ('{$data['name']}', '{$_SESSION['username']}')";
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

// Function to update an existing type
function update_type($data)
{
    $sql = "UPDATE helpdesk_type SET name = '{$data['name']}', update_by = '{$_SESSION['username']}' WHERE id = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

// Function to delete an type (soft delete)
function delete_type($data)
{
    $sql = "UPDATE helpdesk_type SET deleted = 1 WHERE id = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}
