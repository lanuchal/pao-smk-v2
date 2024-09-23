<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="?s=<?= defending($_GET['s']) ?>&p=<?= defending($_GET['p']) ?>">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="addModalLabel">
                        <div class="d-flex align-items-center"> <i class='bx bxs-plus-circle me-2'></i> เพิ่มข้อมูล </div>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-0">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="code" class="form-label ps-3">รหัสพัสดุ</label>
                            <input type="text" class="form-control" name="code" placeholder="รหัสพัสดุ" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="request_date" class="form-label ps-3">วันที่แจ้ง</label>
                            <input type="date" class="form-control" name="request_date" placeholder="วันที่แจ้ง" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="helpdesk_type_id" class="form-label ps-3">ประเภทงาน</label>
                            <select class="form-select" name="helpdesk_type_id" required>
                                <?php
                                $types = find_all_type();
                                foreach ($types as $key => $row) {  ?>
                                    <option value="<?= $row['id'] ?>" <?= $key == 0 ? 'selected' : '' ?>><?= $row['name'] ?></option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="detail" class="form-label ps-3">ปัญหา/อาการ</label>
                            <textarea name="detail" class="form-control" rows="2" required> </textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary" name="create">บักทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="card p-4 border-0 shadow">

    <div class="row mb-4">
        <div class="col-md-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-plus-circle me-2'></i> เพิ่มข้อมูล
                </div>
            </button>
        </div>
    </div>

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
            $requests = find_all_request();
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
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id']; ?>"><i class='bx bxs-edit me-2'></i>แก้ไข</button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id']; ?>"><i class='bx bx-trash me-2'></i>ลบ</button>
                    </td>
                </tr>
                <div class="modal fade" id="editModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $row['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form method="POST" action="?s=<?= defending($_GET['s']) ?>&p=<?= defending($_GET['p']) ?>">
                                <div class="modal-header border-0">
                                    <h1 class="modal-title fs-5" id="editModalLabel<?= $row['id']; ?>">
                                        <div class="d-flex align-items-center"> <i class='bx bxs-edit me-2'></i> แก้ไขข้อมูล </div>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body border-0">
                                    <div class="row">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <div class="col-md-12 mb-3">
                                            <label for="code" class="form-label ps-3">รหัสพัสดุ</label>
                                            <input type="text" class="form-control" name="code" placeholder="รหัสพัสดุ" value="<?= $row['code'] ?>" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="request_date" class="form-label ps-3">วันที่แจ้ง</label>
                                            <input type="date" class="form-control" name="request_date" placeholder="วันที่แจ้ง" value="<?= $row['request_date'] ?>" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="helpdesk_type_id" class="form-label ps-3">ประเภทงาน</label>
                                            <select class="form-select" name="helpdesk_type_id" value="<?= $row['helpdesk_type_id'] ?>" required>
                                                <?php
                                                foreach ($types as $key1 => $row1) {  ?>
                                                    <option value="<?= $row1['id'] ?>" <?= $key1 == 0 ? 'selected' : '' ?>><?= $row1['name'] ?></option>
                                                <?php } ?>
                                            </select>

                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="detail" class="form-label ps-3">ปัญหา/อาการ</label>
                                            <textarea name="detail" class="form-control" rows="2" required><?= $row['detail'] ?></textarea>
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
                                        <label for="name" class="form-label">ชื่อ</label>
                                        <input type="text" class="form-control" name="name" placeholder="ชื่อประเภท" value="<?= $row['name']; ?>" disabled>
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