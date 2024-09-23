<?php

// Function to find a specific request by ID
function find_all_list_user_active()
{
    $sql = "SELECT
            active_user, 
            z_user.user_name
        FROM
            helpdesk
            INNER JOIN
            z_user
            ON 
                helpdesk.active_user = z_user.user_id
        WHERE
            helpdesk.deleted = 0
        GROUP BY
            helpdesk.active_user";
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

function find_report($data)
{
    $sql = "SELECT
                helpdesk_type.`name` AS type_name, 
                helpdesk_status.`name` AS status_name, 
                equipment.property_name AS equipment_name, 
                equipment_status.`name` AS equipment_status_name, 
                helpdesk.`code`, 
                helpdesk.request_date, 
                helpdesk.detail, 
                a_user.user_code AS a_code, 
                a_user.user_name AS a_fullname, 
                helpdesk.detail_active, 
                helpdesk.request_user, 
                r_user.user_code AS r_code, 
                r_user.user_name AS r_fullname,
	            z_affiliation.`name` AS af_name
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
                equipment
                ON 
                    helpdesk.`code` = equipment.property_code
                LEFT JOIN
                equipment_status
                ON 
                    equipment.equipment_status_id = equipment_status.id
                LEFT JOIN
                z_user AS a_user
                ON 
                    helpdesk.active_user = a_user.user_id
                LEFT JOIN
                z_user AS r_user
                ON 
                    helpdesk.request_user = r_user.user_id
                LEFT JOIN
                z_affiliation
                ON 
                    equipment.z_affiliation_id = z_affiliation.id
            WHERE
                helpdesk.request_date BETWEEN '" . $data['request_date_start'] . "-01' AND '" . $data['request_date_end'] . "-31' 
                AND helpdesk.deleted = '0' ";

    if ($data['affiliation_id'] != '0') {
        $sql .= " AND equipment.z_affiliation_id = '" . $data['affiliation_id'] . "'";
    }
    if ($data['user_active'] != '0') {
        $sql .= " AND helpdesk.active_user = '" . $data['user_active'] . "'";
    }
    if ($data['helpdesk_type'] != '0') {
        $sql .= " AND helpdesk.helpdesk_type_id = '" . $data['helpdesk_type'] . "'";
    }
    if ($data['helpdesk_status_id'] != '0') {
        $sql .= " AND helpdesk.helpdesk_status_id = '" . $data['helpdesk_status_id'] . "'";
    }
    if ($data['equipment_status_id'] != '0') {
        $sql .= " AND equipment.equipment_status_id = '" . $data['equipment_status_id'] . "'";
    }
    // echo $sql;
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}
