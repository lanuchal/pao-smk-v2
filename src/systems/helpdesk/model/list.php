<?php

// Function to find a specific request by ID
function find_all_list()
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

// Function to update an existing request
function update_status_job($data)
{
    $sql = "UPDATE helpdesk SET helpdesk_status_id = '{$data['helpdesk_status_id']}' , active_user = '{$_SESSION['username']}' WHERE id = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

function update_detail_active($data)
{
    $sql = "UPDATE helpdesk SET detail_active = '{$data['detail_active']}', active_user = '{$_SESSION['username']}' WHERE id = " . intval($data['id']);

    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

