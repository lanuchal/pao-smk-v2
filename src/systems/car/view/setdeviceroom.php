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
                        <label for="name_equipment" class="form-label">รายละเอียด</label>
                        <input type="text" class="form-control" name="name_equipment" placeholder="รายละเอียดอุปกรณ์" required>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">ลำดับ</label>
                        <input type="number" class="form-control" name="position" placeholder="ลำดับ" required>
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
                <th class="text-center">รายละเอียด</th>
                <th class="text-center">ลำดับ</th>
                <th class="text-center" style="max-width: 5rem;">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $records = find_all_equipment();
            foreach ($records as $row) { ?>
                <tr>
                    <td class="text-center"><?= $row['id_equipment']; ?></td>
                    <td class="text-start"><?= $row['name_equipment']; ?></td>
                    <td class="text-center"><?= $row['position']; ?></td>
                    <td class="text-center">
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id_equipment']; ?>"><i class='bx bxs-edit me-2'></i>แก้ไข</button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id_equipment']; ?>"><i class='bx bx-trash me-2'></i>ลบ</button>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal<?= $row['id_equipment']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $row['id_equipment']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form method="POST" action="?s=<?= defending($_GET['s']) ?>&p=<?= defending($_GET['p']) ?>">
                                <div class="modal-header border-0">
                                    <h1 class="modal-title fs-5" id="editModalLabel<?= $row['id_equipment']; ?>">
                                        <div class="d-flex align-items-center"> <i class='bx bxs-edit me-2'></i> แก้ไขข้อมูล </div>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body border-0">
                                    <div class="mb-3">
                                        <input type="hidden" name="id_equipment" value="<?= $row['id_equipment']; ?>">
                                        <label for="name_equipment" class="form-label">รายละเอียด</label>
                                        <input type="text" class="form-control" name="name_equipment" placeholder="รายละเอียดอุปกรณ์" value="<?= $row['name_equipment']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="position" class="form-label">ลำดับ</label>
                                        <input type="number" class="form-control" name="position" placeholder="ลำดับ" value="<?= $row['position']; ?>" required>
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
                <div class="modal fade" id="deleteModal<?= $row['id_equipment']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $row['id_equipment']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form method="POST" action="?s=<?= defending($_GET['s']) ?>&p=<?= defending($_GET['p']) ?>">
                                <div class="modal-header border-0">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel<?= $row['id_equipment']; ?>">
                                        <div class="d-flex align-items-center"> <i class='bx bx-trash me-2'></i> ลบข้อมูล </div>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body border-0">
                                    <div class="mb-3">
                                        <input type="hidden" name="id_equipment" value="<?= $row['id_equipment']; ?>">
                                        <label for="name_equipment" class="form-label">รายละเอียด</label>
                                        <input type="text" class="form-control" name="name_equipment" placeholder="รายละเอียดอุปกรณ์" value="<?= $row['name_equipment']; ?>" disabled>
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
