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
                    <!-- Add inputs for each field -->
                    <div class="mb-3">
                        <label for="title" class="form-label">ชื่อกิจกรรม</label>
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
                    <div class="mb-3">
                        <label for="rooms" class="form-label">ห้อง</label>
                        <input type="text" class="form-control" name="rooms" placeholder="ห้องที่ใช้">
                    </div>
                    <div class="mb-3">
                        <label for="equipment" class="form-label">อุปกรณ์</label>
                        <input type="text" class="form-control" name="equipment" placeholder="อุปกรณ์ที่ใช้">
                    </div>
                    <div class="mb-3">
                        <label for="member" class="form-label">สมาชิก</label>
                        <input type="text" class="form-control" name="member" placeholder="ชื่อสมาชิก">
                    </div>
                    <div class="mb-3">
                        <label for="division" class="form-label">หน่วยงาน</label>
                        <input type="text" class="form-control" name="division" placeholder="หน่วยงาน">
                    </div>
                    <div class="mb-3">
                        <label for="people" class="form-label">จำนวนคน</label>
                        <input type="number" class="form-control" name="people" placeholder="จำนวนคน">
                    </div>
                    <div class="mb-3">
                        <label for="style" class="form-label">สไตล์</label>
                        <input type="text" class="form-control" name="style" placeholder="สไตล์">
                    </div>
                    <div class="mb-3">
                        <label for="etc" class="form-label">อื่นๆ</label>
                        <textarea class="form-control" name="etc" rows="3"></textarea>
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
                <th class="text-center">รหัส</th>
                <th class="text-center">ชื่อกิจกรรม</th>
                <th class="text-center">วันเริ่มต้น</th>
                <th class="text-center">วันสิ้นสุด</th>
                <th class="text-center">สี</th>
                <th class="text-center">ห้อง</th>
                <th class="text-center">หน่วยงาน</th>
                <th class="text-center">จำนวนคน</th>
                <th class="text-center">สไตล์</th>
                <th class="text-center">อุปกรณ์</th>
                <th class="text-center">สมาชิก</th>
                <th class="text-center">อื่นๆ</th>
                <th class="text-center">จัดการ</th>
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
                        <div style="background-color: <?= $row['color']; ?>; width: 20px; height: 20px; border-radius: 50%; margin: 0 auto;"></div>
                    </td>
                    <td class="text-center"><?= $row['rooms']; ?></td>
                    <td class="text-center"><?= $row['division']; ?></td>
                    <td class="text-center"><?= $row['people']; ?></td>
                    <td class="text-center"><?= $row['style']; ?></td>
                    <td class="text-center"><?= $row['equipment']; ?></td>
                    <td class="text-center"><?= $row['member']; ?></td>
                    <td class="text-start"><?= $row['etc']; ?></td>
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
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">ชื่อกิจกรรม</label>
                                        <input type="text" class="form-control" name="title" value="<?= $row['title']; ?>" required>
                                    </div>
<?php
if ($row) {
    $start = date('Y-m-d\TH:i', strtotime($row['start']));
    $end = date('Y-m-d\TH:i', strtotime($row['end']));
}
?>									
									
                                    <div class="mb-3">
                                        <label for="start" class="form-label">วันเริ่มต้น</label>
                                        <input type="datetime-local" class="form-control" name="start" value="<?= $start; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="end" class="form-label">วันสิ้นสุด</label>
                                        <input type="datetime-local" class="form-control" name="end" value="<?= $end; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="color" class="form-label">สี</label>
                                        <input type="color" class="form-control form-control-color" name="color" value="<?= $row['color']; ?>" required>
                                    </div>
                                    <div class="mb-3">
									 <input type="text" class="form-control" name="rooms" value="<?= $row['rooms']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="equipment" class="form-label">อุปกรณ์</label>
                                        <input type="text" class="form-control" name="equipment" value="<?= $row['equipment']; ?>">
                                    </div>
                                    <div class="mb-3">
									<label for="member" class="form-label">สมาชิก</label>
									<select class="form-select" name="member" required>
    								<option value="">เลือกสมาชิก</option>
    <?php
    // Fetch all users from the database
    $sql = "SELECT user_code, user_name FROM user";  // Replace 'user' with the actual table name
    $result = mysqli_query($GLOBALS['CON'], $sql);

    if ($result) {
        // Iterate over each user and create an option element
        while ($user = mysqli_fetch_assoc($result)) {
            // Check if this user should be selected (for edit modal)
            $selected = ($row['member'] == $user['user_code']) ? 'selected' : '';
            echo "<option value=\"{$user['user_code']}\" $selected>{$user['user_name']}</option>";
        }
    } else {
        echo "<option value=\"\">ไม่พบสมาชิก</option>";
    }
    ?>
</select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="division" class="form-label">หน่วยงาน</label>
                                        <input type="text" class="form-control" name="division" value="<?= $row['division']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="people" class="form-label">จำนวนคน</label>
                                        <input type="number" class="form-control" name="people" value="<?= $row['people']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="style" class="form-label">สไตล์</label>
                                        <input type="text" class="form-control" name="style" value="<?= $row['style']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="etc" class="form-label">อื่นๆ</label>
                                        <textarea class="form-control" name="etc" rows="3"><?= $row['etc']; ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                    <button type="submit" class="btn btn-primary" name="update">บันทึกการเปลี่ยนแปลง</button>
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
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <p>คุณแน่ใจหรือว่าต้องการลบกิจกรรม <strong><?= $row['title']; ?></strong> นี้?</p>
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

