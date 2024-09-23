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
                    <div class="mb-3">
                        <label for="title" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" name="title" placeholder="ชื่อกิจกรรม" required>
                    </div>
                    <div class="mb-3">
                        <label for="start" class="form-label">วันเริ่มต้น</label>
                        <input type="datetime-local" class="form-control" name="start" required>
                    </div>
                    <div class="mb-3">
                        <label for="end" class="form-label">วันสิ้นสุด</label>
                        <input type="datetime-local" class="form-control" name="end" required>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">สี</label>
                        <input type="color" class="form-control form-control-color" name="color" required>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary" name="create">บันทึก</button>
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

    <table class="table table-hover" id="table_data">
        <thead>
            <tr>
                <th class="text-center" style="max-width: 3rem;">รหัส</th>
                <th class="text-center">ชื่อ</th>
                <th class="text-center" style="min-width: 10rem;">วันเริ่มต้น</th>
                <th class="text-center" style="min-width: 10rem;">วันสิ้นสุด</th>
                <th class="text-center" style="max-width: 5rem;">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $records = find_all_records();
            foreach ($records as $row) { ?>
                <tr>
                    <td class="text-center"><?= $row['id']; ?></td>
                    <td class="text-start"><?= $row['title']; ?></td>
                    <td class="text-center"><?= $row['start']; ?></td>
                    <td class="text-center"><?= $row['end']; ?></td>
                    <td class="text-center">
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id']; ?>"><i class='bx bxs-edit me-2'></i>แก้ไข</button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id']; ?>"><i class='bx bx-trash me-2'></i>ลบ</button>
                    </td>
                </tr>
                <!-- Edit Modal -->
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
                                    <div class="mb-3">
                                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                        <label for="title" class="form-label">ชื่อ</label>
                                        <input type="text" class="form-control" name="title" placeholder="ชื่อกิจกรรม" value="<?= $row['title']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="start" class="form-label">วันเริ่มต้น</label>
                                        <input type="datetime-local" class="form-control" name="start" value="<?= $row['start']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="end" class="form-label">วันสิ้นสุด</label>
                                        <input type="datetime-local" class="form-control" name="end" value="<?= $row['end']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="color" class="form-label">สี</label>
                                        <input type="color" class="form-control form-control-color" name="color" value="<?= $row['color']; ?>" required>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                    <button type="submit" class="btn btn-primary" name="update">บันทึก</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
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
                                    <div class="mb-3">
                                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                        <label for="title" class="form-label">ชื่อ</label>
                                        <input type="text" class="form-control" name="title" placeholder="ชื่อกิจกรรม" value="<?= $row['title']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                    <button type="submit" class="btn btn-primary" name="delete">บันทึก</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </tbody>
    </table>
</div>
