<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="?s=<?= defending($_GET['s']) ?>&p=<?= defending($_GET['p']) ?>">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="addModalLabel">
                        <div class="d-flex align-items-center"><i class='bx bxs-plus-circle me-2'></i> เพิ่มข้อมูล</div>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-0">
                    <!-- Add inputs for each field in the 'cars_bookings' table -->
                    <div class="mb-3">
                        <label for="car_id" class="form-label">รถยนต์</label>
                        <select class="form-select" name="car_id" required>
                            <option value="">เลือกรถยนต์</option>
                            <?php
                            // Fetch all cars from 'cars_car'
                            $cars = fetch_all_cars(); // This should be a function to fetch cars
                            foreach ($cars as $car) {
                                echo "<option value=\"{$car['id']}\">{$car['car_name']} - {$car['plate_number']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="z_user" class="form-label">ผู้จอง</label>
                        <select class="form-select" name="z_user" required>
                            <option value="">เลือกผู้จอง</option>
                            <?php
                            // Fetch all users from 'user'
                            $users = fetch_all_users(); // This should be a function to fetch users
                            foreach ($users as $user) {
                                echo "<option value=\"{$user['id']}\">{$user['user_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="z_organization" class="form-label">หน่วยงาน</label>
                        <input type="text" class="form-control" name="z_organization" placeholder="หน่วยงาน" required>
                    </div>
                    <div class="mb-3">
                        <label for="start_datetime" class="form-label">วันเริ่มต้น</label>
                        <input type="datetime-local" class="form-control" name="start_datetime" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_datetime" class="form-label">วันสิ้นสุด</label>
                        <input type="datetime-local" class="form-control" name="end_datetime" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">สถานะ</label>
                        <input type="text" class="form-control" name="status" placeholder="สถานะการจอง" required>
                    </div>
                    <div class="mb-3">
                        <label for="reason" class="form-label">หมายเหตุ</label>
                        <textarea class="form-control" name="reason" rows="3"></textarea>
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

<!-- Main Content -->
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
                <th class="text-center">รหัส</th>
                <th class="text-center">รถยนต์</th>
                <th class="text-center">ผู้จอง</th>
                <th class="text-center">หน่วยงาน</th>
                <th class="text-center">วันเริ่มต้น</th>
                <th class="text-center">วันสิ้นสุด</th>
                <th class="text-center">สถานะ</th>
                <th class="text-center">หมายเหตุ</th>
                <th class="text-center">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $records = find_all_records(); // A function to fetch all bookings
            foreach ($records as $row) { ?>
                <tr>
                    <td class="text-center"><?= $row['id']; ?></td>
                    <td class="text-start"><?= $row['car_id']; ?></td>
                    <td class="text-start"><?= $row['z_user']; ?></td>
                    <td class="text-start"><?= $row['z_organization']; ?></td>
                    <td class="text-center"><?= $row['start_datetime']; ?></td>
                    <td class="text-center"><?= $row['end_datetime']; ?></td>
                    <td class="text-center"><?= $row['status']; ?></td>
                    <td class="text-start"><?= $row['reason']; ?></td>
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
                                        <div class="d-flex align-items-center"><i class='bx bxs-edit me-2'></i> แก้ไขข้อมูล</div>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body border-0">
                                    <!-- Edit fields for each column -->
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <div class="mb-3">
                                        <label for="car_id" class="form-label">รถยนต์</label>
                                        <select class="form-select" name="car_id" required>
                                            <?php
                                            foreach ($cars as $car) {
                                                $selected = ($row['car_id'] == $car['id']) ? "selected" : "";
                                                echo "<option value=\"{$car['id']}\" $selected>{$car['car_name']} - {$car['plate_number']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="z_user" class="form-label">ผู้จอง</label>
                                        <select class="form-select" name="z_user" required>
                                            <?php
                                            foreach ($users as $user) {
                                                $selected = ($row['z_user'] == $user['id']) ? "selected" : "";
                                                echo "<option value=\"{$user['id']}\" $selected>{$user['user_name']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="z_organization" class="form-label">หน่วยงาน</label>
                                        <input type="text" class="form-control" name="z_organization" value="<?= $row['z_organization']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="start_datetime" class="form-label">วันเริ่มต้น</label>
                                        <input type="datetime-local" class="form-control" name="start_datetime" value="<?= date('Y-m-d\TH:i', strtotime($row['start_datetime'])); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="end_datetime" class="form-label">วันสิ้นสุด</label>
                                        <input type="datetime-local" class="form-control" name="end_datetime" value="<?= date('Y-m-d\TH:i', strtotime($row['end_datetime'])); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">สถานะ</label>
                                        <input type="text" class="form-control" name="status" value="<?= $row['status']; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="reason" class="form-label">หมายเหตุ</label>
                                        <textarea class="form-control" name="reason" rows="3"><?= $row['reason']; ?></textarea>
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
                                        <div class="d-flex align-items-center"><i class='bx bx-trash me-2'></i> ลบข้อมูล</div>
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body border-0">
                                    คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลการจองสำหรับรถยนต์ <?= $row['car_name']; ?>?
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
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
