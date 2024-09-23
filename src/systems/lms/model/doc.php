<?php
// Function to find all lmss
function find_all_lms()
{
    $sql = "SELECT
                lms_type.`name`, 
                lms.*
            FROM
                lms
                LEFT JOIN
                lms_type
                ON 
                    lms.type_id = lms_type.id
            WHERE
                lms.deleted = 0";
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to find a specific lms by ID
function find_one_lms($data)
{
    $sql = "SELECT * FROM lms WHERE id = ? AND deleted = 0";
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

// Function to create a new lms
function create_lms($data)
{
    $sql = "INSERT INTO lms (title, date_create, detail, img, type_id, create_by)VALUES ('{$data['title']}', '{$data['date_create']}', '{$data['detail']}', '{$data['img']}', '{$data['type_id']}', '{$data['create_by']}')";
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}




// Function to update an existing lms
function update_lms($data)
{
    $sql = "UPDATE lms SET 
                title = '{$data['title']}', 
                date_create = '{$data['date_create']}', 
                detail = '{$data['detail']}', 
                type_id = '{$data['type_id']}', 
                update_by = '{$_SESSION['username']}' 
              WHERE id = {$data['id']}";
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

function update_lms_img($data)
{
    $sql = "UPDATE lms SET 
                img = '{$data['img']}', 
                update_by = '{$_SESSION['username']}' 
              WHERE id = {$data['id']}";
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}


// Function to delete an lms (soft delete)
function delete_lms($data)
{
    $sql = "UPDATE lms SET deleted = 1 WHERE id = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}
