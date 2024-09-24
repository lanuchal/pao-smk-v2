<?php

function create_payroll($data)
{
    $sql = "INSERT INTO payroll (full_name, revenue_salary, revenue_retro_salary, revenue_allowance, 
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
