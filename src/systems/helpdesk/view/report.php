<div class="card border-0 p-4">
    <form method="POST" action="?s=<?= defending($_GET['s']) ?>&p=<?= defending($_GET['p']) ?>">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="text-primary">รายงานผลสรุปผลการซ่อม</h3>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <label for="request_date" class="form-label ps-3">เดือนเริ่มต้น</label>
                <input type="month" class="form-control" name="request_date_start" required
                    value="<?= defending($_POST['request_date_start']) ? defending($_POST['request_date_start']) : date("Y-m") ?>">
            </div>
            <div class="col-md-4">
                <label for="request_date" class="form-label ps-3">เดือนสิ้นสุด</label>
                <input type="month" class="form-control" name="request_date_end" required
                    value="<?= defending($_POST['request_date_end']) ? defending($_POST['request_date_end']) : date("Y-m") ?>">
            </div>
            <div class="col-md-4">
                <label for="request_date" class="form-label ps-3">หน่วยงาน</label>
                <select class="form-select" name="affiliation_id">
                    <option value="0" <?= defending($_POST['affiliation_id']) == '0' ?  "selected" : "" ?>>ทั้งหมด</option>
                    <?php $affiliations = find_all_affiliation();
                    foreach ($affiliations as $item1) {
                    ?>
                        <option value="<?= $item1['id'] ?>" <?= defending($_POST['affiliation_id']) == $item1['id'] ?  "selected" : "" ?>><?= $item1['name'] ?></option>
                    <?php } ?>
                </select>
            </div>

        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <label for="request_date" class="form-label ps-3">ผู้ดำเนินการ</label>
                <select class="form-select" name="user_active" required>
                    <option value="0" <?= defending($_POST['user_active']) == '0' ?  "selected" : "" ?>>ทั้งหมด</option>
                    <?php
                    $user_active_list = find_all_list_user_active();
                    foreach ($user_active_list as $item0) { ?>
                        <option value="<?= $item0['active_user'] ?>" <?= defending($_POST['user_active']) == $item0['active_user'] ?  "selected" : "" ?>>
                            <?= $item0['user_name'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="request_date" class="form-label ps-3">ประเภทงาน</label>
                <select class="form-select" name="helpdesk_type" required>
                    <option value="0" <?= defending($_POST['helpdesk_type']) == '0' ?  "selected" : "" ?>>ทั้งหมด</option>
                    <?php
                    $types = find_all_type();
                    foreach ($types as $item2) { ?>
                        <option value="<?= $item2['id'] ?>" <?= defending($_POST['helpdesk_type']) == $item2['id'] ?  "selected" : "" ?>>
                            <?= $item2['name'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="request_date" class="form-label ps-3">สถานะงาน</label>
                <select class="form-select" name="helpdesk_status_id" required>
                    <option value="0" <?= defending($_POST['helpdesk_status_id']) == '0' ?  "selected" : "" ?>>ทั้งหมด</option>
                    <?php
                    $statuss = find_all_status();
                    foreach ($statuss as $item3) { ?>
                        <option value="<?= $item3['id'] ?>" <?= defending($_POST['helpdesk_status_id']) == $item3['id'] ?  "selected" : "" ?>>
                            <?= $item3['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="request_date" class="form-label ps-3">สถานะอุปกรณ์</label>
                <select class="form-select" name="equipment_status_id" required>
                    <option value="0" <?= defending($_POST['equipment_status_id']) == '0' ?  "selected" : "" ?>>ทั้งหมด</option>
                    <?php
                    $equipment_statuss = find_all_equipment_status();
                    foreach ($equipment_statuss as $item4) { ?>
                        <option value="<?= $item4['id'] ?>" <?= defending($_POST['equipment_status_id']) == $item4['id'] ?  "selected" : "" ?>>
                            <?= $item4['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary w-100">ค้นหา</button>
            </div>
        </div>
    </form>
</div>

<div class="card p-4 mt-3 border-0 ">
    <?php
    $data_report = [
        "request_date_start" => defending($_POST['request_date_start']) ? defending($_POST['request_date_start']) : date("Y-m"),
        "request_date_end" => defending($_POST['request_date_start']) ? defending($_POST['request_date_end']) : date("Y-m"),
        "affiliation_id" => defending($_POST['affiliation_id']) ? defending($_POST['affiliation_id']) : '0',
        "user_active" => defending($_POST['user_active']) ? defending($_POST['user_active']) : '0',
        "helpdesk_type" => defending($_POST['helpdesk_type']) ? defending($_POST['helpdesk_type']) : '0',
        "helpdesk_status_id" => defending($_POST['helpdesk_status_id']) ? defending($_POST['helpdesk_status_id']) : '0',
        "equipment_status_id" => defending($_POST['equipment_status_id']) ? defending($_POST['equipment_status_id']) : '0',
    ];
    $report = find_report($data_report);
    ?>

    <div class="row my-3">
        <div class="col-md-6 text-primary">
            <div class="d-flex align-items-center">
                <i class='bx bx-list-ul fs-2 me-2'></i>
                <h3> รายละเอียดผลสรุปผลการซ่อม</h3>
            </div>
        </div>
        <div class="col-md-6 text-end">
            <form method="POST" action="/export/helpdesk_excel.php" target="_blank">
                <input type="hidden" name="data_report" value='<?= json_encode($report) ?>'>
                <button type="submit" name="export" class="btn btn-success">
                    <div class="d-flex align-items-center px-3"> <i class='bx bxs-file-export me-2 fs-5'></i> export </div>
                </button>
            </form>
        </div>
    </div>
    <div class="table-responsive overflow-x-auto">
        <table class="table table-sm table-bordered" style="min-width: 90rem">
            <thead>
                <tr>
                    <th class="text-center">วันที่แจ้ง</th>
                    <th class="text-center">ผู้แจ้งงาน</th>
                    <th class="text-center">รหัสทรัพย์สิน</th>
                    <th class="text-center">ชื่อทรัพย์สิน</th>
                    <th class="text-center">หน่วยงาน</th>
                    <th class="text-center">รายละเอียดแจ้งงาน</th>
                    <th class="text-center">ประเภทงาน</th>
                    <th class="text-center">สถานะงาน</th>
                    <th class="text-center">สถานะอุปกรณ์</th>
                    <th class="text-center">ผู้รับงาน</th>
                    <th class="text-center">รายละเอียดการแก้ไขงาน</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($report as $item) { ?>
                    <tr class="text-secondary">
                        <td class="text-center text-secondary"><?= $item['request_date'] ?></td>
                        <td class="text-center text-secondary"><?= $item['r_fullname'] ?></td>
                        <td class="text-center text-secondary"><?= $item['code'] ?></td>
                        <td class="text-secondary"><?= $item['equipment_name'] ?></td>
                        <td class="text-secondary"><?= $item['af_name'] ?></td>
                        <td class="text-secondary"><?= $item['detail'] ?></td>
                        <td class="text-center text-secondary"><?= $item['type_name'] ?></td>
                        <td class="text-center text-secondary"><?= $item['status_name'] ?></td>
                        <td class="text-center text-secondary"><?= $item['equipment_status_name'] ?></td>
                        <td class="text-center text-secondary"><?= $item['a_fullname'] ?></td>
                        <td class="text-secondary"><?= $item['detail_active'] ?></td>
                    </tr>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>