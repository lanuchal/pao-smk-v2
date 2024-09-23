<?php
// Function to find all affiliations
function find_all_affiliation()
{
    $sql = "SELECT * FROM z_affiliation WHERE deleted = 0";
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to find a specific affiliation by ID
function find_one_affiliation($data)
{
    $sql = "SELECT * FROM z_affiliation WHERE id = ? AND deleted = 0";
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

// Function to create a new affiliation
function create_affiliation($data)
{
    $sql = "INSERT INTO z_affiliation (name, create_by) VALUES ('{$data['name']}', '{$_SESSION['username']}')";
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}




// Function to update an existing affiliation
function update_affiliation($data)
{
    $sql = "UPDATE z_affiliation SET name = '{$data['name']}', update_by = '{$_SESSION['username']}' WHERE id = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}



// Function to delete an affiliation (soft delete)
function delete_affiliation($data)
{
    $sql = "UPDATE z_affiliation SET deleted = 1 WHERE id = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}


