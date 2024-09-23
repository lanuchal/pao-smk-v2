<?php
// Function to find all requests
function find_all_request()
{
    $sql = "SELECT
                helpdesk_type.`name` AS type_name, 
                helpdesk_status.`name` AS status_name, 
                helpdesk.*, 
                z_user.user_name
            FROM
                helpdesk
                LEFT JOIN
                helpdesk_type
                ON 
                    helpdesk.helpdesk_type_id = helpdesk_type.id
                LEFT JOIN
                helpdesk_status
                ON 
                    helpdesk.helpdesk_status_id = helpdesk_status.id
                LEFT JOIN
                z_user
                ON 
                    helpdesk.active_user = z_user.user_id
            WHERE
                helpdesk.deleted = 0";
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to find a specific request by ID
function find_one_request($data)
{
    $sql = "SELECT
                helpdesk_type.`name` AS type_name, 
                helpdesk_status.`name` AS status_name, 
                helpdesk.*
            FROM
                helpdesk
                LEFT JOIN
                helpdesk_type
                ON 
                    helpdesk.helpdesk_type_id = helpdesk_type.id
                LEFT JOIN
                helpdesk_status
                ON 
                    helpdesk.helpdesk_status_id = helpdesk_status.id
            WHERE
                helpdesk.deleted = 0 WHERE helpdesk_type.id = ? AND deleted = 0";
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

// Function to create a new request
function create_request($data)
{
    $sql = "INSERT INTO helpdesk (code, request_date, detail, request_user, helpdesk_type_id, create_by) VALUES ('{$data['code']}', '{$data['request_date']}', '{$data['detail']}', '{$_SESSION['username']}', '{$data['helpdesk_type_id']}', '{$_SESSION['username']}')";
    // echo $sql;
    // exit();
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

// Function to update an existing request
function update_request($data)
{
    $sql = "UPDATE helpdesk SET code = '{$data['code']}', request_date = '{$data['request_date']}', detail = '{$data['detail']}', helpdesk_type_id = '{$data['helpdesk_type_id']}' WHERE id = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

// Function to delete an request (soft delete)
function delete_request($data)
{
    $sql = "UPDATE helpdesk SET deleted = 1 WHERE id = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}
