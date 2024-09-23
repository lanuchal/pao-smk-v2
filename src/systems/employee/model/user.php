<?php
// Function to find all users
function find_all_user()
{
    $sql = "SELECT
                z_user.*,
                z_organization.`name` AS or_name, 
                z_position.`name` AS ps_name
            FROM
                z_user
                LEFT JOIN
                z_organization
                ON 
                    z_user.organization_id = z_organization.id
                LEFT JOIN
                z_position
                ON 
                    z_user.position_id = z_position.id";
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to find a specific user by ID
function find_one_user($data)
{
    $sql = "SELECT * FROM z_user WHERE user_code = '{$data['user_code']}'";
    $result = mysqli_query($GLOBALS['CON'], $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

function find_one_user_id($data)
{
    $sql = "SELECT * FROM z_user WHERE user_id = '{$data['user_id']}'";
    $result = mysqli_query($GLOBALS['CON'], $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

// Function to create a new user
function create_user($data)
{
    $sql = "INSERT INTO z_user (user_code, user_name, user_pass, organization_id, affiliation_id, division_id, position_id, permission_id) 
            VALUES ('{$data['user_code']}', '{$data['user_name']}', '{$data['user_pass']}', '{$data['organization_id']}', '{$data['affiliation_id']}', '{$data['division_id']}', '{$data['position_id']}', '{$data['permission_id']}')";
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}


// Function to update an existing user
function update_user($data)
{
    $sql = "UPDATE z_user SET 
                user_name = '{$data['user_name']}', 
                organization_id = '{$data['organization_id']}', 
                affiliation_id = '{$data['affiliation_id']}', 
                division_id = '{$data['division_id']}', 
                position_id = '{$data['position_id']}', 
                permission_id = '{$data['permission_id']}'
            WHERE user_id = '{$data['user_id']}'";

    $result = mysqli_query($GLOBALS['CON'], $sql);
    // echo $sql;
    // exit();
    return $result ? true : false;
}



// Function to delete an user (soft delete)
function delete_user($data)
{

    $sql = "DELETE FROM `system_e_leave`.`z_user` WHERE `user_id` = " . $data['user_id'];
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}
