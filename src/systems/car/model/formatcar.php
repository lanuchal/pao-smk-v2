<?php
// Function to find all car styles
function find_all_records()
{
    $sql = "SELECT * FROM cars_style";  // Use the 'cars_style' table
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to find a specific car style by ID
function find_one_car_style($data)
{
    $sql = "SELECT * FROM cars_style WHERE id_style = ?";
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

// Function to create a new car style
function create_car_style($data)
{
    $sql = "INSERT INTO cars_style (name_style, position) 
            VALUES ('{$data['name_style']}', '{$data['position']}')";
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

// Function to update an existing car style
function update_car_style($data)
{
    $sql = "UPDATE cars_style 
            SET name_style = '{$data['name_style']}', position = '{$data['position']}'
            WHERE id_style = " . intval($data['id_style']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

// Function to delete a car style
function delete_car_style($data)
{
    $sql = "DELETE FROM cars_style 
            WHERE id_style = " . intval($data['id_style']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}
?>
