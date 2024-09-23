<?php


function convertFullToYMD($data)
{
    $newDate = date('Y-m-d', strtotime($data));
    return $newDate;
}

function convertToDMYThai($date) {
    // Convert the input date to a timestamp
    $timestamp = strtotime($date);
    
    // Extract the day, month, and year
    $day = date('d', $timestamp);
    $month = date('m', $timestamp);
    $year = date('Y', $timestamp) + 543;  // Convert year to BE
    
    // Return the Thai formatted date (DD/MM/YYYY)
    return $day . '/' . $month . '/' . $year;
}

function convertToThaiDate($date) {
    // Map for Thai months
    $thai_months = [
        1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม', 
        4 => 'เมษายน', 5 => 'พฤษภาคม', 6 => 'มิถุนายน', 
        7 => 'กรกฎาคม', 8 => 'สิงหาคม', 9 => 'กันยายน', 
        10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
    ];
    
    // Convert the input date to a timestamp
    $timestamp = strtotime($date);
    
    // Extract the day, month, and year
    $day = date('d', $timestamp);
    $month = date('n', $timestamp);  // 'n' gives month as a number without leading zeros
    $year = date('Y', $timestamp) + 543;  // Convert year to BE
    
    // Return the Thai formatted date (วันที่ เดือน พ.ศ.)
    return $day . ' ' . $thai_months[$month] . ' พ.ศ. ' . $year;
}