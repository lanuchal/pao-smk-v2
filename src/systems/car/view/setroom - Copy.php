<div class="modal fade" id="roomModal" tabindex="-1" aria-labelledby="roomModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data" action="?s=<?= defending($_GET['s']) ?>&p=<?= defending($_GET['p']) ?>">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="roomModalLabel">
                        <div class="d-flex align-items-center">
                            <i class='bx bxs-plus-circle me-2'></i> 
                            <?= isset($record) ? 'แก้ไขห้องประชุม' : 'เพิ่มห้องประชุม' ?>
                        </div>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
<div class="modal-body border-0">
    <input type="hidden" name="id_rooms" value="<?= isset($record['id_rooms']) ? $record['id_rooms'] : '' ?>">
    <input type="hidden" name="existing_image_rooms" value="<?= isset($record['image_rooms']) ? $record['image_rooms'] : '' ?>">

    <!-- Room Name -->
    <div class="mb-3">
        <label for="name_rooms" class="form-label">ชื่อห้องประชุม</label>
        <input type="text" class="form-control" name="name_rooms" value="<?= isset($record['name_rooms']) ? $record['name_rooms'] : '' ?>" required>
    </div>

    <!-- Room Capacity -->
    <div class="mb-3">
        <label for="people_rooms" class="form-label">จำนวนที่รับรอง</label>
        <input type="number" class="form-control" name="people_rooms" value="<?= isset($record['people_rooms']) ? $record['people_rooms'] : '' ?>" required>
    </div>
</div>


<!-- Room Color -->
<div class="mb-3">
    <label for="color_rooms" class="form-label">สีของห้อง</label>
    <input type="text" class="form-control" name="color_rooms" value="<?= isset($record['color_rooms']) ? $record['color_rooms'] : '' ?>" required>
</div>

                    <!-- Room Image -->
                    <div class="mb-3">
                        <label for="image_rooms" class="form-label">รูปภาพห้อง</label>
                        <input type="file" class="form-control" name="image_rooms">
                        <?php if (!empty($record['image_rooms'])): ?>
                            <div class="mt-2">
                                <img src="uploads/<?= $record['image_rooms'] ?>" alt="Room Image" width="100" height="100" class="img-thumbnail">
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Room Details -->
<div class="mb-3">
    <label for="detail_rooms" class="form-label">รายละเอียด</label>
    <textarea class="form-control" name="detail_rooms" rows="4" required><?= isset($record['detail_rooms']) ? $record['detail_rooms'] : '' ?></textarea>
</div>

                    <!-- Room Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label">สถานะ</label>
                        <select class="form-select" name="status" required>
                            <option value="available" <?= isset($record['status']) && $record['status'] == 'available' ? 'selected' : '' ?>>Available</option>
                            <option value="unavailable" <?= isset($record['status']) && $record['status'] == 'unavailable' ? 'selected' : '' ?>>Unavailable</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary" name="<?= isset($record) ? 'update' : 'create' ?>"><?= isset($record) ? 'บันทึกการเปลี่ยนแปลง' : 'บันทึก' ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="card p-4 border-0 shadow">
    <div class="row mb-4">
        <div class="col-md-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#roomModal">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-plus-circle me-2'></i> เพิ่มห้องประชุม
                </div>
            </button>
        </div>
    </div>

    <table class="table table-hover" id="table_data">
        <thead>
            <tr>
                <th class="text-center">รหัสห้อง</th>
                <th class="text-center">ชื่อห้องประชุม</th>
                <th class="text-center">จำนวนที่รับรอง</th>
                <th class="text-center">สีของห้อง</th>
                <th class="text-center">รูปภาพ</th>
                <th class="text-center">รายละเอียด</th>
                <th class="text-center">สถานะ</th>
                <th class="text-center">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $records = find_all_rooms();
            foreach ($records as $row) { ?>
                <tr>
                    <td class="text-center"><?= $row['id_rooms']; ?></td>
                    <td class="text-start"><?= $row['name_rooms']; ?></td>
                    <td class="text-center"><?= $row['people_rooms']; ?></td>
                    <td class="text-center">
                        <div style="background-color: <?= $row['color_rooms']; ?>; width: 20px; height: 20px; border-radius: 50%; margin: 0 auto;"></div>
                    </td>
                    <td class="text-center">
                        <?php if (!empty($row['image_rooms'])): ?>
                            <img src="uploads/<?= $row['image_rooms']; ?>" alt="Room Image" width="50" height="50" class="img-thumbnail">
                        <?php endif; ?>
                    </td>
                    <td class="text-start"><?= $row['detail_rooms']; ?></td>
                    <td class="text-center"><?= $row['status'] == 'available' ? 'Available' : 'Unavailable'; ?></td>
                    <td class="text-center">
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#roomModal" onclick="populateRoomForm(<?= $row['id_rooms']; ?>)"><i class='bx bxs-edit me-2'></i>แก้ไข</button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['id_rooms']; ?>"><i class='bx bx-trash me-2'></i>ลบ</button>
                    </td>
                </tr>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal<?= $row['id_rooms']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $row['id_rooms']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form method="POST" action="?s=<?= defending($_GET['s']) ?>&p=<?= defending($_GET['p']) ?>">
                                <div class="modal-header border-0">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel<?= $row['id_rooms']; ?>">
                                        <div class="d-flex align-items-center"> <i class='bx bx-trash me-2'></i> ลบห้องประชุม </div>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body border-0">
                                    <input type="hidden" name="id_rooms" value="<?= $row['id_rooms']; ?>">
                                    <p>คุณแน่ใจหรือว่าต้องการลบห้องประชุม <strong><?= $row['name_rooms']; ?></strong> นี้?</p>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                    <button type="submit" class="btn btn-danger" name="delete">ลบ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </tbody>
    </table>
</div>
