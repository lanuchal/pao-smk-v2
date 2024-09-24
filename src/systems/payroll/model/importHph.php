<?php

function find_all_payroll_pre($main)
{
    $sql = "SELECT * FROM payroll_pre WHERE deleted = 0 AND main = '" . $main . "'";
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

function find_one_payroll_pre($data)
{
    $sql = "SELECT * FROM payroll_pre WHERE deleted = 0 AND full_name = '" . $data['full_name'] . "' AND month = '" . $data['month'] . "' AND  main = '" . $data['main'] . "';";
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to create a new equipment_band
function create_payroll_pre($data)
{
    $sql = "INSERT INTO payroll_pre (full_name, revenue_salary, revenue_retro_salary, revenue_allowance, 
                                    revenue_retro_allowance, revenue_position, revenue_retro_position, 
                                    revenue_academic, revenue_retro_academic, revenue_cost_of_living, 
                                    revenue_retro_cost_of_living, revenue_total_earnings, expenses_income_tax, 
                                    expenses_social_security, expenses_gpf, expenses_lgpf, expenses_cooperative_pao, 
                                    expenses_cooperative_teachers, expenses_cooperative_health, expenses_slf, 
                                    expenses_gsb, expenses_ktb, expenses_ghb, expenses_funeral_fund, 
                                    expenses_ocean_life, expenses_welfare_chork, expenses_welfare_chors, 
                                    expenses_loan_chors, expenses_funeral_aid, expenses_total_deductions, 
                                    expenses_remaining_balance, full_name_active, position_active, month, main, address, create_by) 
                                VALUES (
                                '" . $data['full_name'] . "',
                                '" . $data['revenue_salary'] . "',
                                '" . $data['revenue_retro_salary'] . "',
                                '" . $data['revenue_allowance'] . "',
                                '" . $data['revenue_retro_allowance'] . "',
                                '" . $data['revenue_position'] . "',
                                '" . $data['revenue_retro_position'] . "',
                                '" . $data['revenue_academic'] . "',
                                '" . $data['revenue_retro_academic'] . "',
                                '" . $data['revenue_cost_of_living'] . "',
                                '" . $data['revenue_retro_cost_of_living'] . "',
                                '" . $data['revenue_total_earnings'] . "',
                                '" . $data['expenses_income_tax'] . "',
                                '" . $data['expenses_social_security'] . "',
                                '" . $data['expenses_gpf'] . "',
                                '" . $data['expenses_lgpf'] . "',
                                '" . $data['expenses_cooperative_pao'] . "',
                                '" . $data['expenses_cooperative_teachers'] . "',
                                '" . $data['expenses_cooperative_health'] . "',
                                '" . $data['expenses_slf'] . "',
                                '" . $data['expenses_gsb'] . "',
                                '" . $data['expenses_ktb'] . "',
                                '" . $data['expenses_ghb'] . "',
                                '" . $data['expenses_funeral_fund'] . "',
                                '" . $data['expenses_ocean_life'] . "',
                                '" . $data['expenses_welfare_chork'] . "',
                                '" . $data['expenses_welfare_chors'] . "',
                                '" . $data['expenses_loan_chors'] . "',
                                '" . $data['expenses_funeral_aid'] . "',
                                '" . $data['expenses_total_deductions'] . "',
                                '" . $data['expenses_remaining_balance'] . "',
                                '" . $data['full_name_active'] . "',
                                '" . $data['position_active'] . "',
                                '" . $data['month'] . "',
                                '" . $data['main'] . "',
                                '" . $data['address'] . "',
                                '" . $_SESSION['username'] . "'
                                )";
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}


function update_payroll_pre($data)
{
    $sql = "UPDATE payroll_pre SET 
                full_name = '" . $data['full_name'] . "',
                revenue_salary = '" . $data['revenue_salary'] . "',
                revenue_retro_salary = '" . $data['revenue_retro_salary'] . "',
                revenue_allowance = '" . $data['revenue_allowance'] . "',
                revenue_retro_allowance = '" . $data['revenue_retro_allowance'] . "',
                revenue_position = '" . $data['revenue_position'] . "',
                revenue_retro_position = '" . $data['revenue_retro_position'] . "',
                revenue_academic = '" . $data['revenue_academic'] . "',
                revenue_retro_academic = '" . $data['revenue_retro_academic'] . "',
                revenue_cost_of_living = '" . $data['revenue_cost_of_living'] . "',
                revenue_retro_cost_of_living = '" . $data['revenue_retro_cost_of_living'] . "',
                revenue_total_earnings = '" . $data['revenue_total_earnings'] . "',
                expenses_income_tax = '" . $data['expenses_income_tax'] . "',
                expenses_social_security = '" . $data['expenses_social_security'] . "',
                expenses_gpf = '" . $data['expenses_gpf'] . "',
                expenses_lgpf = '" . $data['expenses_lgpf'] . "',
                expenses_cooperative_pao = '" . $data['expenses_cooperative_pao'] . "',
                expenses_cooperative_teachers = '" . $data['expenses_cooperative_teachers'] . "',
                expenses_cooperative_health = '" . $data['expenses_cooperative_health'] . "',
                expenses_slf = '" . $data['expenses_slf'] . "',
                expenses_gsb = '" . $data['expenses_gsb'] . "',
                expenses_ktb = '" . $data['expenses_ktb'] . "',
                expenses_ghb = '" . $data['expenses_ghb'] . "',
                expenses_funeral_fund = '" . $data['expenses_funeral_fund'] . "',
                expenses_ocean_life = '" . $data['expenses_ocean_life'] . "',
                expenses_welfare_chork = '" . $data['expenses_welfare_chork'] . "',
                expenses_welfare_chors = '" . $data['expenses_welfare_chors'] . "',
                expenses_loan_chors = '" . $data['expenses_loan_chors'] . "',
                expenses_funeral_aid = '" . $data['expenses_funeral_aid'] . "',
                expenses_total_deductions = '" . $data['expenses_total_deductions'] . "',
                expenses_remaining_balance = '" . $data['expenses_remaining_balance'] . "',
                address = '" . $data['address'] . "',
                update_by = '" . $_SESSION['username'] . "' 
            WHERE id = '" . $data['id'] . "'";
    echo $sql;

    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}


function delete_payroll_pre($data)
{
    $sql =  "DELETE FROM `system_e_leave`.`payroll_pre` WHERE `id` = " . intval($data['id']);
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}

function clear_payroll_pre($data)
{
    $sql =  "DELETE FROM `system_e_leave`.`payroll_pre` WHERE `main` = '" . $data['main'] . "' ";
    $result = mysqli_query($GLOBALS['CON'], $sql);
    return $result ? true : false;
}
