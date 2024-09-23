<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Add New Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="type_id" class="form-label">ประเภท</label>
                        <select class="form-select" name="type_id" required>
                            <?php
                            $types = find_all_lms_type();
                            foreach ($types as $key => $row) {  ?>
                                <option value="<?= $row['id'] ?>" <?= $key == 0 ? 'selected' : '' ?>><?= $row['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_create" class="form-label">Date Created</label>
                        <input type="date" name="date_create" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="detail" class="form-label">Detail</label>
                        <textarea name="detail" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Image</label>
                        <input type="file" name="img" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="create">Save Record</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="card p-4 border-0 shadow">
    <div class="row mb-4">
        <div class="col-md-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-plus-circle me-2'></i> เพิ่มข้อมูล
                </div>
            </button>
        </div>
    </div>

    <table class="table table-hover " id="teble_data">
        <thead>
            <tr>
                <th style="max-width: 50px;" class="text-center">รูป</th>
                <th class="text-center">ชื่อ</th>
                <th class="text-center">รายละเอียด</th>
                <th class="text-center">วันที่สร้าง</th>
                <th class="text-center">ประเภท</th>
                <th class="text-center">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $lmss = find_all_lms();
            foreach ($lmss as $row) { ?>
                <tr>
                    <td class="">
                        <div class="d-flex align-items-end justify-content-center">
                            <img src="uploads/lms/<?= $row['img'] ?>" alt="Image" style="width: 50px; height: 50px;">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#updateImg<?= $row['id'] ?>" class="btn rounded-circle text-info"><i class='bx bxs-cloud-upload fs-3'></i></button>
                        </div>
                    </td>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= htmlspecialchars($row['detail']) ?></td>
                    <td class="text-center"><?= convertToDMYThai(htmlspecialchars($row['date_create'])) ?></td>
                    <td class="text-center">
                        <?php if ($row['name']): ?>
                            <?= htmlspecialchars($row['name']) ?>
                        <?php else: ?>
                            ไม่ได้กำหนด
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal"
                            data-id="<?= $row['id'] ?>"
                            data-type_id="<?= $row['type_id'] ?>"
                            data-title="<?= htmlspecialchars($row['title']) ?>"
                            data-date_create="<?= htmlspecialchars($row['date_create']) ?>"
                            data-detail="<?= htmlspecialchars($row['detail']) ?>">แก้ไข</button>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#delete<?= $row['id'] ?>" class="btn btn-danger btn-sm">ลบ</button>
                    </td>
                </tr>

                <div class="modal fade" id="updateImg<?= $row['id'] ?>" tabindex="-1" aria-labelledby="updateImgLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateImgLabel">Edit Img</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <img src="uploads/lms/<?= $row['img'] ?>" alt="Image" style="width: 150px; height: 150px;">
                                    </div>
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <div class="mb-3">
                                        <label for="img" class="form-label">รูปใหม่</label>
                                        <input type="file" name="img" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="img" class="btn btn-primary">บันทึก</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="delete<?= $row['id'] ?>" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteLabel">ลบข้อมูล</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <div>
                                            <img src="uploads/lms/<?= $row['img'] ?>" alt="Image" style="width: 150px; height: 150px;">
                                        </div>
                                        <p class="text-danger mt-4">ยืนยันการลบข้อมูล</p>

                                    </div>
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="delete" class="btn btn-primary">บันทึก</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </tbody>
    </table>
</div>


<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Edit Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="update-id">
                    <div class="mb-3">
                        <label for="update-type_id" class="form-label">ประเภท</label>
                        <select class="form-select" name="type_id" id="update-type_id" required>
                            <?php
                            $types = find_all_lms_type();
                            foreach ($types as $key => $row) {  ?>
                                <option value="<?= $row['id'] ?>" <?= $key == 0 ? 'selected' : '' ?>><?= $row['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="update-title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_create" class="form-label">Date Created</label>
                        <input type="date" name="date_create" id="update-date_create" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="detail" class="form-label">Detail</label>
                        <textarea name="detail" id="update-detail" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="update" class="btn btn-primary">Update Record</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var updateModal = document.getElementById('updateModal');
        updateModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var type_id = button.getAttribute('data-type_id');
            var title = button.getAttribute('data-title');
            var date_create = button.getAttribute('data-date_create');
            var detail = button.getAttribute('data-detail');

            // Update form inputs
            document.getElementById('update-id').value = id;
            document.getElementById('update-type_id').value = type_id;
            document.getElementById('update-title').value = title;
            document.getElementById('update-date_create').value = date_create;
            document.getElementById('update-detail').value = detail;
        });
    });
</script>