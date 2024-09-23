<?php

$status = find_all_status();
?>

<div class="card p-4 border-0 shadow">
    <table class="table table-hover " id="teble_data">
        <thead>
            <tr>
                <th class="text-center" style="max-width: 5rem;">รหัสพัสดุ</th>
                <th class="text-center" style="max-width: 5rem;">วันที่แจ้ง</th>
                <th class="text-center">ปัญหา/อาการ</th>
                <th class="text-center" style="max-width: 5rem;">ประเภท</th>
                <th class="text-center" style="max-width: 5rem;">สถานะ</th>
                <th class="text-center" style="max-width: 5rem;">การแก้ไข</th>
                <th class="text-center" style="max-width: 5rem;">ผู้แก้ไข</th>
                <th class="text-center" style="max-width: 5rem;">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $requests = find_all_list();
            foreach ($requests as $row) { ?>
                <tr>
                    <td class="text-center"><?= $row['code']; ?></td>
                    <td class="text-start"><?= $row['request_date']; ?></td>
                    <td class="text-center"><?= $row['detail']; ?></td>
                    <td class="text-center"><?= $row['type_name']; ?></td>
                    <td class="text-center"><?= $row['status_name'] ? $row['status_name'] : "แจ้งงาน"; ?></td>
                    <td class="text-center"><?= $row['detail_active'] ? $row['detail_active'] : " - "; ?></td>
                    <td class="text-center"><?= $row['active_user'] ? $row['user_name'] : " - "; ?></td>
                    <td class="text-center">
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id']; ?>"><i class='bx bxs-edit me-2'></i>อัปเดตสถานะ</button>
                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#remarkModal<?= $row['id']; ?>"><i class='bx bxs-edit me-2'></i>การแก้ไข</button>
                    </td>
                </tr>
                <div class="modal fade" id="editModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $row['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form method="POST" action="?s=<?= defending($_GET['s']) ?>&p=<?= defending($_GET['p']) ?>">
                                <div class="modal-header border-0">
                                    <h1 class="modal-title fs-5" id="editModalLabel<?= $row['id']; ?>">
                                        <div class="d-flex align-items-center"> <i class='bx bxs-edit me-2'></i> อัปเดตสถานะ </div>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body border-0">
                                    <div class="row">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <div class="col-md-12 mb-3">

                                            <label for="helpdesk_status_id" class="form-label ps-3">รุ่น</label>
                                            <select class="form-select" name="helpdesk_status_id" value="<?= $row['helpdesk_status_id'] ?>">
                                                <?php
                                                foreach ($status as $key3 => $row3) {  ?>
                                                    <option value="<?= $row3['id'] ?>" <?= $key3 == 0 ? 'selected' : '' ?>><?= $row3['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                    <button type="submit" class="btn btn-primary" name="update">อัปเดตสถานะ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="remarkModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="remarkModalLabel<?= $row['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form method="POST" action="?s=<?= defending($_GET['s']) ?>&p=<?= defending($_GET['p']) ?>">
                                <div class="modal-header border-0">
                                    <h1 class="modal-title fs-5" id="remarkModalLabel<?= $row['id']; ?>">
                                        <div class="d-flex align-items-center"> <i class='bx bxs-edit me-2'></i> การแก้ไข </div>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body border-0">
                                    <div class="row">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <div class="col-md-12 mb-3">
                                            <label for="detail_active" class="form-label ps-3">รายละเอียดการแก้ไข</label>
                                            <textarea name="detail_active" class="form-control" rows="2" required><?= $row['detail_active'] ?> </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                    <button type="submit" class="btn btn-primary" name="remark">อัปเดตสถานะ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </tbody>
    </table>
</div>