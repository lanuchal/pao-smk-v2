<?php


$dataheader = [
    "title" => "นำเข้าเงินเดือน (รพ.สต.)",
    "icon" => "bx bx-import",
    "list" => [
        [
            "data" => "นำเข้าเงินเดือน (รพ.สต.)",
            "active" => true
        ]
    ]
];
generateHeaderHTML($dataheader, $system, $route);


$payroll_pres = find_all_payroll_pre(3);

?>
<div class="card p-4 border-0 shadow">
    <form method="POST" action="?s=<?= defending($_GET['s']) ?>&p=<?= defending($_GET['p']) ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <label for="request_date" class="form-label ps-3">นำเข้าไฟล์</label>
                    <input type="file" class="form-control" name="file_input" accept=".xls,.xlsx" required>
                </div>
                <div class="mt-3">
                    <label for="request_date" class="form-label ps-3">ประจำเดือน</label>
                    <input type="month" class="form-control" name="month" value="<?= defending($_POST['month']) ? defending($_POST['month']) : date("Y-m") ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <label for="request_date" class="form-label ps-3">ชื่อผู้จ่ายเงิน</label>
                    <input type="text" class="form-control" name="full_name_active" value="<?= defending($_POST['full_name_active']) ? defending($_POST['full_name_active']) : "" ?>" required>
                </div>
                <div class="mt-3">
                    <label for="request_date" class="form-label ps-3">ตำแหน่งผู้จ่ายเงิน</label>
                    <input type="text" class="form-control" name="position_active" value="<?= defending($_POST['position_active']) ? defending($_POST['position_active']) : "" ?>" required>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary w-100" name="import">นำเข้าข้อมูล</button>
            </div>
        </div>
    </form>
</div>

<div class="card p-4 mt-3 border-0 shadow">
    <?php
    if (sizeof($payroll_pres) > 0) {    ?>
        <div class="table-responsive" style="height: 80vh; overflow-y: auto;"> <!-- Set height and make body scrollable -->
            <table class="table table-hover table-bordered table-sm table-striped ">
                <thead class="table-light" style="position: sticky; top: 0; z-index: 10;"> <!-- Sticky table header -->
                    <tr>
                        <th class="text-center" style="min-width: 5rem;" rowspan="2">จัดการ</th>
                        <th class="text-center" style="max-width: 3rem;" rowspan="2">ลำดับ</th>
                        <th class="text-center" style="min-width: 10rem;" rowspan="2">สถานที่</th>
                        <th class="text-center" style="min-width: 15rem;" rowspan="2">ชื่อ - สกุล</th>
                        <th class="text-center" colspan="10">เงินรับ</th>
                        <th class="text-center" rowspan="2" style="min-width: 6rem;">รวมรับ</th>
                        <th class="text-center" colspan="17">รายการหัก</th>
                        <th class="text-center" rowspan="2" style="min-width: 6rem;">รวมจ่าย</th>
                        <th class="text-center" rowspan="2" style="min-width: 6rem;">คงเหลือ</th>
                    </tr>
                    <tr>
                        <th style="min-width: 6rem; " class="text-center">เงินเดือน/ค่าจ้างประจำ/ค่าตอบแทน</th>
                        <th style="min-width: 6rem;" class="text-center">เงินเดือน/ค่าจ้างประจำ (ตกเบิก)</th>
                        <th style="min-width: 6rem;" class="text-center">เงินค่าตอบแทนรายเดือน/ค่าครองชีพชั่วคราว ขรก.</th>
                        <th style="min-width: 6rem;" class="text-center">ค่าครองชีพชั่วคราว ขรก. (ตกเบิก)</th>
                        <th style="min-width: 6rem;" class="text-center">เงินประจำตำแหน่ง</th>
                        <th style="min-width: 6rem;" class="text-center">เงินประจำตำแหน่ง (ตกเบิก)</th>
                        <th style="min-width: 6rem;" class="text-center">เงินวิทยะฐานะ</th>
                        <th style="min-width: 6rem;" class="text-center">เงินวิทยะฐานะ (ตกเบิก)</th>
                        <th style="min-width: 6rem;" class="text-center">ค่าครองชีพ</th>
                        <th style="min-width: 6rem;" class="text-center">ค่าครองชีพ (ตกเบิก)</th>
                        <th style="min-width: 6rem;" class="text-center">ภาษีเงินได้</th>
                        <th style="min-width: 6rem;" class="text-center">ประกันสังคม(ผู้ประกันตน)</th>
                        <th style="min-width: 6rem;" class="text-center">กบข.</th>
                        <th style="min-width: 6rem;" class="text-center">กสจ.</th>
                        <th style="min-width: 6rem;" class="text-center">สหกรณ์ออมทรัพย์ข้าราชการ อบจ.</th>
                        <th style="min-width: 6rem;" class="text-center">สหกรณ์ออมทรัพย์ครูฯ</th>
                        <th style="min-width: 6rem;" class="text-center">สหกรณ์ออมทรัพย์สาธารณสุขสมุทรสาคร</th>
                        <th style="min-width: 6rem;" class="text-center">กยศ.</th>
                        <th style="min-width: 6rem;" class="text-center">ออมสิน</th>
                        <th style="min-width: 6rem;" class="text-center">ธ.กรุงไทย</th>
                        <th style="min-width: 6rem;" class="text-center">ธอส.</th>
                        <th style="min-width: 6rem;" class="text-center">ฌกส.</th>
                        <th style="min-width: 6rem;" class="text-center">บมจ.ไทยสมุทรฯ</th>
                        <th style="min-width: 6rem;" class="text-center">ชพค.</th>
                        <th style="min-width: 6rem;" class="text-center">ชพส.</th>
                        <th style="min-width: 6rem;" class="text-center">กู้ ชพค.-กู้ ชพส.</th>
                        <th class="text-center" style="min-width: 6rem;">ก.ฌ.</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($payroll_pres as $key => $row) { ?>
                        <tr>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm " data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id']; ?>"><i class='bx bxs-edit'></i></button>
                                <button class="btn btn-danger btn-sm " data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id']; ?>"><i class='bx bx-trash'></i></button>
                            </td>

                            <td class="text-center"><?= $key + 1 ?></td>
                            <td class="text-center ps-2"><?= $row['address'] ?></td>
                            <td class="text-start  ps-2"><?= $row['full_name'] ?></td>
                            <td class="text-center  ps-2"><?= $row['revenue_salary'] ?></td>
                            <td class="text-center  ps-2"><?= $row['revenue_retro_salary'] ?></td>
                            <td class="text-center  ps-2"><?= $row['revenue_allowance'] ?></td>
                            <td class="text-center  ps-2"><?= $row['revenue_retro_allowance'] ?></td>
                            <td class="text-center  ps-2"><?= $row['revenue_position'] ?></td>
                            <td class="text-center  ps-2"><?= $row['revenue_retro_position'] ?></td>
                            <td class="text-center  ps-2"><?= $row['revenue_academic'] ?></td>
                            <td class="text-center  ps-2"><?= $row['revenue_retro_academic'] ?></td>
                            <td class="text-center  ps-2"><?= $row['revenue_cost_of_living'] ?></td>
                            <td class="text-center  ps-2"><?= $row['revenue_retro_cost_of_living'] ?></td>
                            <td class="text-center  ps-2"><?= $row['revenue_total_earnings'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_income_tax'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_social_security'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_gpf'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_lgpf'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_cooperative_pao'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_cooperative_teachers'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_cooperative_health'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_slf'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_gsb'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_ktb'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_ghb'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_funeral_fund'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_ocean_life'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_welfare_chork'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_welfare_chors'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_loan_chors'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_funeral_aid'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_total_deductions'] ?></td>
                            <td class="text-center  ps-2"><?= $row['expenses_remaining_balance'] ?></td>
                        </tr>

                        <div class="modal fade" id="editModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $row['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <form method="POST" action="?s=<?= defending($_GET['s']) ?>&p=<?= defending($_GET['p']) ?>">
                                        <div class="modal-header border-0">
                                            <h1 class="modal-title fs-5" id="editModalLabel<?= $row['id']; ?>">
                                                <div class="d-flex align-items-center"> <i class='bx bxs-edit me-2'></i> แก้ไขข้อมูล </div>
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body border-0">
                                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="address" class="form-label">สถานที่</label>
                                                    <input type="text" class="form-control" name="address" value="<?= $row['address']; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="full_name" class="form-label">ชื่อ - สกุล</label>
                                                    <input type="text" class="form-control" name="full_name" value="<?= $row['full_name']; ?>">
                                                </div>
                                            </div>

                                            <div class="border border-1 rounded p-2 border-primary mt-4">
                                                <div class="row">
                                                    <div class="col-md-12 text-center text-primary"><b>รายรับ</b> </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="revenue_salary" class="form-label">เงินเดือน/ค่าจ้างประจำ/ค่าตอบแทน</small>
                                                        <input type="number" class="form-control" name="revenue_salary" value="<?= $row['revenue_salary']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="revenue_retro_salary" class="form-label">เงินเดือน/ค่าจ้างประจำ (ตกเบิก)</small>
                                                        <input type="number" class="form-control" name="revenue_retro_salary" value="<?= $row['revenue_retro_salary']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="revenue_allowance" class="form-label">ตอบแทนรายเดือน/ค่าครองชีพชั่วคราว ขรก.</small>
                                                        <input type="number" class="form-control" name="revenue_allowance" value="<?= $row['revenue_allowance']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="revenue_retro_allowance" class="form-label">ค่าครองชีพชั่วคราว ขรก. (ตกเบิก)</small>
                                                        <input type="number" class="form-control" name="revenue_retro_allowance" value="<?= $row['revenue_retro_allowance']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="revenue_position" class="form-label">เงินประจำตำแหน่ง</small>
                                                        <input type="number" class="form-control" name="revenue_position" value="<?= $row['revenue_position']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="revenue_retro_position" class="form-label">เงินประจำตำแหน่ง (ตกเบิก)</small>
                                                        <input type="number" class="form-control" name="revenue_retro_position" value="<?= $row['revenue_retro_position']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="revenue_academic" class="form-label">เงินวิทยะฐานะ</small>
                                                        <input type="number" class="form-control" name="revenue_academic" value="<?= $row['revenue_academic']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="revenue_retro_academic" class="form-label">เงินวิทยะฐานะ (ตกเบิก)</small>
                                                        <input type="number" class="form-control" name="revenue_retro_academic" value="<?= $row['revenue_retro_academic']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="revenue_cost_of_living" class="form-label">ค่าครองชีพ</small>
                                                        <input type="number" class="form-control" name="revenue_cost_of_living" value="<?= $row['revenue_cost_of_living']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="revenue_retro_cost_of_living" class="form-label">ค่าครองชีพ (ตกเบิก)</small>
                                                        <input type="number" class="form-control" name="revenue_retro_cost_of_living" value="<?= $row['revenue_retro_cost_of_living']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="revenue_total_earnings" class="form-label">รวมรับ</small>
                                                        <input type="number" class="form-control" name="revenue_total_earnings" value="<?= $row['revenue_total_earnings']; ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border border-1 rounded p-2 border-danger mt-4">
                                                <div class="row">
                                                    <div class="col-md-12 text-center text-danger"><b>รายจ่าย</b> </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_income_tax" class="form-label">ภาษีเงินได้</small>
                                                        <input type="number" class="form-control" name="expenses_income_tax" value="<?= $row['expenses_income_tax']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_social_security" class="form-label">ประกันสังคม(ผู้ประกันตน)</small>
                                                        <input type="number" class="form-control" name="expenses_social_security" value="<?= $row['expenses_social_security']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_gpf" class="form-label">กบข.</small>
                                                        <input type="number" class="form-control" name="expenses_gpf" value="<?= $row['expenses_gpf']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_lgpf" class="form-label">กสจ.</small>
                                                        <input type="number" class="form-control" name="expenses_lgpf" value="<?= $row['expenses_lgpf']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_cooperative_pao" class="form-label">สหกรณ์ออมทรัพย์ข้าราชการ อบจ.</small>
                                                        <input type="number" class="form-control" name="expenses_cooperative_pao" value="<?= $row['expenses_cooperative_pao']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_cooperative_teachers" class="form-label">สหกรณ์ออมทรัพย์ครูฯ</small>
                                                        <input type="number" class="form-control" name="expenses_cooperative_teachers" value="<?= $row['expenses_cooperative_teachers']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_cooperative_health" class="form-label">สหกรณ์ออมทรัพย์สาธารณสุขสมุทรสาคร</small>
                                                        <input type="number" class="form-control" name="expenses_cooperative_health" value="<?= $row['expenses_cooperative_health']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_slf" class="form-label">กยศ.</small>
                                                        <input type="number" class="form-control" name="expenses_slf" value="<?= $row['expenses_slf']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_gsb" class="form-label">ออมสิน</small>
                                                        <input type="number" class="form-control" name="expenses_gsb" value="<?= $row['expenses_gsb']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_ktb" class="form-label">ธ.กรุงไทย</small>
                                                        <input type="number" class="form-control" name="expenses_ktb" value="<?= $row['expenses_ktb']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_ghb" class="form-label">ธอส.</small>
                                                        <input type="number" class="form-control" name="expenses_ghb" value="<?= $row['expenses_ghb']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_funeral_fund" class="form-label">ฌกส.</small>
                                                        <input type="number" class="form-control" name="expenses_funeral_fund" value="<?= $row['expenses_funeral_fund']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_ocean_life" class="form-label">บมจ.ไทยสมุทรฯ</small>
                                                        <input type="number" class="form-control" name="expenses_ocean_life" value="<?= $row['expenses_ocean_life']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_welfare_chork" class="form-label">ชพค.</small>
                                                        <input type="number" class="form-control" name="expenses_welfare_chork" value="<?= $row['expenses_welfare_chork']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_welfare_chors" class="form-label">ชพส.</small>
                                                        <input type="number" class="form-control" name="expenses_welfare_chors" value="<?= $row['expenses_welfare_chors']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_loan_chors" class="form-label">กู้ ชพค.-กู้ ชพส.</small>
                                                        <input type="number" class="form-control" name="expenses_loan_chors" value="<?= $row['expenses_loan_chors']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_funeral_aid" class="form-label">ก.ฌ.</small>
                                                        <input type="number" class="form-control" name="expenses_funeral_aid" value="<?= $row['expenses_funeral_aid']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_total_deductions" class="form-label">รวมจ่าย</small>
                                                        <input type="number" class="form-control" name="expenses_total_deductions" value="<?= $row['expenses_total_deductions']; ?>">
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <small for="expenses_remaining_balance" class="form-label">คงเหลือ</small>
                                                        <input type="number" class="form-control" name="expenses_remaining_balance" value="<?= $row['expenses_remaining_balance']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                            <button type="submit" class="btn btn-primary" name="update">บักทึก</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="deleteModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $row['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form method="POST" action="?s=<?= defending($_GET['s']) ?>&p=<?= defending($_GET['p']) ?>">
                                        <div class="modal-header border-0">
                                            <h1 class="modal-title fs-5" id="deleteModalLabel<?= $row['id']; ?>">
                                                <div class="d-flex align-items-center"> <i class='bx bx-trash me-2'></i> ลบข้อมูล </div>
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body border-0">
                                            <div class="mb-3 text-center">
                                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                <label for="name" class="form-label">ชื่อ - สกุล</label>
                                                <input type="text" class="form-control" name="full_name" value="<?= $row['full_name']; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                            <button type="submit" class="btn btn-primary" name="delete">บักทึก</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </tbody>
            </table>


        </div>

    <?php  } else { ?>
        <div class="row mt-3">
            <div class="col-md-12 text-center text-secondary">
                <h2>ยังไม่มีข้อมูล</h2>
            </div>
        </div>
    <?php  } ?>
    <div class="row mt-3">
        <div class="col-md-4">
            <button class="btn btn-secondary btn-sm w-100" data-bs-toggle="modal" data-bs-target="#clearModal"><i class='bx bxs-trash'></i> ล้างข้อมูล</button>
        </div>
        <div class="col-md-8">
            <form method="POST" action="?s=<?= defending($_GET['s']) ?>&p=<?= defending($_GET['p']) ?>">
                <div class="row align-items-center">
                    <div class="col-md-8 text-end">
                        <input class="form-check-input" type="checkbox" value="" id="cc" required>
                        <label class="form-check-label ms-3" for="cc">
                            ยืนยันความถูกต้องของข้อมูล
                        </label>
                    </div>
                    <input type="hidden" name="payroll_pres" value='<?= json_encode($payroll_pres) ?>'>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success w-100 btn-sm" name="save">บักทึก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="clearModal" tabindex="-1" aria-labelledby="clearModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="?s=<?= defending($_GET['s']) ?>&p=<?= defending($_GET['p']) ?>">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="clearModal">
                        <div class="d-flex align-items-center"> <i class='bx bx-trash me-2'></i> ลบข้อมูล </div>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-0">
                    <div class="mb-3 text-center">
                        ยืนยันการล้างข้อมูลทั้งหมด
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary" name="clear">บักทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>