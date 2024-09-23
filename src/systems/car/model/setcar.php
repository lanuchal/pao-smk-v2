<?php

// Function to find all car records
function find_all_records()
{
    $sql = "SELECT * FROM cars_car";
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        // Log the error or handle it as needed
        return [];
    }
}

// Function to find a specific car record by ID
function find_one_record($data)
{
    $sql = "SELECT * FROM cars_car WHERE id = ?";
    $stmt = mysqli_prepare($GLOBALS['CON'], $sql);
    mysqli_stmt_bind_param($stmt, 'i', $data['id']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        // Log the error or handle it as needed
        return null;
    }
}

// Function to handle file uploads (e.g., car image)
function uploadFile($file, $uploadDir = 'uploads/car/')
{
    // Check if the file was uploaded without errors
    if (isset($file) && $file['error'] == 0) {
        $fileName = basename($file['name']);
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        // Generate a unique name for the file
        $newFileName = uniqid() . '.' . $fileExtension;
        $targetFilePath = $uploadDir . $newFileName;

        // Create the directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Move the file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            return $newFileName;
        } else {
            throw new Exception("Error in moving the uploaded file.");
        }
    } else {
        throw new Exception("No file was uploaded or there was an error during the upload process.");
    }
}

// Function to create a new car record
function create_record($data)
{
    $sql = "INSERT INTO cars_car (car_name, car_type, plate_number, status, color, capacity, image) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($GLOBALS['CON'], $sql);

    if ($stmt === false) {
        die('mysqli error: ' . mysqli_error($GLOBALS['CON']));
    }

    mysqli_stmt_bind_param($stmt, 'sssssis', 
        $data['car_name'], 
        $data['car_type'], 
        $data['plate_number'], 
        $data['status'], 
        $data['color'], 
        $data['capacity'], 
        $data['image']
    );

    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die('mysqli_stmt_execute error: ' . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);

    return $result ? true : false;
}

// Function to update an existing car record
function update_record($data)
{
    $sql = "UPDATE cars_car 
            SET car_name = ?, 
                car_type = ?, 
                plate_number = ?, 
                status = ?, 
                color = ?, 
                capacity = ?, 
                image = ?
            WHERE id = ?";
    
    $stmt = mysqli_prepare($GLOBALS['CON'], $sql);

    if ($stmt === false) {
        die('mysqli error: ' . mysqli_error($GLOBALS['CON']));
    }

    mysqli_stmt_bind_param($stmt, 'sssssis', 
        $data['car_name'], 
        $data['car_type'], 
        $data['plate_number'], 
        $data['status'], 
        $data['color'], 
        $data['capacity'], 
        $data['image'],
        $data['id']
    );

    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        die('mysqli_stmt_execute error: ' . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);

    return $result ? true : false;
}

// Function to delete a car record
function delete_record($data)
{
    $sql = "DELETE FROM cars_car WHERE id = ?";
    $stmt = mysqli_prepare($GLOBALS['CON'], $sql);
    mysqli_stmt_bind_param($stmt, 'i', $data['id']);
    $result = mysqli_stmt_execute($stmt);
    return $result ? true : false;
}

?>
