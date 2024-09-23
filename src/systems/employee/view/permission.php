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
                    <div class="mb-3 text-center">
                        <label for="name" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" name="name" placeholder="ชื่อสิทธิ์การใช้งาน">
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
                <th class="text-center" style="max-width: 5rem;">รหัส</th>
                <th class="text-center">ชื่อ</th>
                <th class="text-center" style="min-width: 10rem;">วันที่</th>
                <th class="text-center" style="max-width: 5rem;">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $permissions = find_all_permission();
            foreach ($permissions as $row) { ?>
                <tr>
                    <td class="text-center"><?= $row['id']; ?></td>
                    <td class="text-start"><?= $row['name']; ?></td>
                    <td class="text-center"><?= $row['update_time']; ?></td>
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
                                    <div class="mb-3 text-center">
                                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                        <label for="name" class="form-label">ชื่อ</label>
                                        <input type="text" class="form-control" name="name" placeholder="ชื่อสิทธิ์การใช้งาน" value="<?= $row['name']; ?>">
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
                                        <input type="text" class="form-control" name="name" placeholder="ชื่อสิทธิ์การใช้งาน" value="<?= $row['name']; ?>" disabled>
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