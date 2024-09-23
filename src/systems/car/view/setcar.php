<!-- Add Modal for adding new car -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="?s=<?= defending($_GET['s']) ?>&p=<?= defending($_GET['p']) ?>" enctype="multipart/form-data">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="addModalLabel">
                        <div class="d-flex align-items-center"> <i class='bx bxs-plus-circle me-2'></i> เพิ่มข้อมูลรถ </div>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-0">
                    <div class="mb-3">
                        <label for="car_name" class="form-label">ชื่อรถ</label>
                        <input type="text" class="form-control" name="car_name" placeholder="ชื่อรถ" required>
                    </div>
                    <div class="mb-3">
                        <label for="car_type" class="form-label">ประเภท</label>
                        <input type="text" class="form-control" name="car_type" placeholder="ประเภท" required>
                    </div>
                    <div class="mb-3">
                        <label for="plate_number" class="form-label">หมายเลขทะเบียน</label>
                        <input type="text" class="form-control" name="plate_number" placeholder="หมายเลขทะเบียน" required>
                    </div>
                    <div class="mb-3">
                        <label for="capacity" class="form-label">ความจุ</label>
                        <input type="number" class="form-control" name="capacity" placeholder="จำนวนคน" required>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">สีรถ</label>
                        <input type="color" class="form-control form-control-color" name="color" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">รูปภาพ</label>
                        <input type="file" class="form-control" name="image" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">สถานะรถ</label>
                        <select class="form-control" name="status" required>
                            <option value="ว่าง">ว่าง</option>
                            <option value="ไม่ว่าง">ไม่ว่าง</option>
                        </select>
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

<!-- Car Data Table -->
<div class="card p-4 border-0 shadow">
    <div class="row mb-4">
        <div class="col-md-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-plus-circle me-2'></i> เพิ่มข้อมูลรถ
                </div>
            </button>
        </div>
    </div>

    <table class="table table-hover" id="table_data">
        <thead>
            <tr>
                <th class="text-center">รหัสรถ</th>
                <th class="text-center">ชื่อรถ</th>
                <th class="text-center">ประเภท</th>
                <th class="text-center">หมายเลขทะเบียน</th>
                <th class="text-center">ความจุ</th>
                <th class="text-center">สีรถ</th>
                <th class="text-center">รูปภาพ</th>
                <th class="text-center">สถานะ</th>
                <th class="text-center">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cars = find_all_records();
            foreach ($cars as $car) { ?>
                <tr>
                    <td class="text-center"><?= $car['id']; ?></td>
                    <td class="text-start"><?= $car['car_name']; ?></td>
                    <td class="text-center"><?= $car['car_type']; ?></td>
                    <td class="text-center"><?= $car['plate_number']; ?></td>
                    <td class="text-center"><?= $car['capacity']; ?></td>
                    <td class="text-center">
                        <div style="background-color:<?= htmlspecialchars($car['color']); ?>; width: 30px; height: 30px; border-radius: 50%;"></div>
                    </td>
                    <td class="text-center">
                        <img src="/uploads/car/<?= htmlspecialchars($car['image']); ?>" alt="<?= htmlspecialchars($car['car_name']); ?>" style="width: 80px; height: 80px;">
                    </td>
                    <td class="text-center"><?= htmlspecialchars($car['status']); ?></td>
                    <td class="text-center">
                        <!-- Edit Button -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCarModal<?= $car['id']; ?>">
                            <i class='bx bxs-edit me-2'></i> แก้ไข
                        </button>
                        <!-- Delete Button -->
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteCarModal<?= $car['id']; ?>">
                            <i class='bx bx-trash me-2'></i> ลบ
                        </button>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editCarModal<?= $car['id']; ?>" tabindex="-1" aria-labelledby="editCarModalLabel<?= $car['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editCarModalLabel<?= $car['id']; ?>">แก้ไขข้อมูลรถยนต์</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?= $car['id']; ?>" />

                                    <div class="mb-3">
                                        <label for="editCarName<?= $car['id']; ?>" class="form-label">ชื่อรถยนต์</label>
                                        <input type="text" class="form-control" id="editCarName<?= $car['id']; ?>" name="car_name" value="<?= htmlspecialchars($car['car_name']); ?>" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="editCarType<?= $car['id']; ?>" class="form-label">ประเภท</label>
                                        <input type="text" class="form-control" id="editCarType<?= $car['id']; ?>" name="car_type" value="<?= htmlspecialchars($car['car_type']); ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="editPlateNumber<?= $car['id']; ?>" class="form-label">ป้ายทะเบียน</label>
                                        <input type="text" class="form-control" id="editPlateNumber<?= $car['id']; ?>" name="plate_number" value="<?= htmlspecialchars($car['plate_number']); ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="editCapacity<?= $car['id']; ?>" class="form-label">จำนวนที่นั่ง</label>
                                        <input type="number" class="form-control" id="editCapacity<?= $car['id']; ?>" name="capacity" value="<?= htmlspecialchars($car['capacity']); ?>" required>
                                    </div>
<!--
<div class="mb-3">
                        <label for="color" class="form-label">สีรถ</label>
                        <input type="color" class="form-control form-control-color" name="color" required>
                    </div>
-->
                                    <div class="mb-3">
                                        <label for="editColor<?= $car['id']; ?>" class="form-label">สี</label>
                                        <input type="color" class="form-control-color" id="editColor<?= $car['id']; ?>" name="color" value="<?= htmlspecialchars($car['color']); ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="editImage<?= $car['id']; ?>" class="form-label">รูปภาพ</label>
                                        <input type="file" class="form-control" id="editImage<?= $car['id']; ?>" name="image">
										 <?php if (!empty($car['image'])): ?>
                            <div class="mt-2">
                                <img src="uploads/car/<?= $car['image'] ?>" alt="Room Image" width="100" height="100" class="img-thumbnail">
                            </div>
                        <?php endif; ?>
                                        <small class="form-text text-muted">กรุณาเลือกภาพใหม่ถ้าต้องการเปลี่ยนภาพเดิม</small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="editStatus<?= $car['id']; ?>" class="form-label">สถานะ</label>
                                        <select class="form-control" id="editStatus<?= $car['id']; ?>" name="status" required>
                                            <option value="ว่าง" <?= $car['status'] === 'ว่าง' ? 'selected' : ''; ?>>ว่าง</option>
                                            <option value="ไม่ว่าง" <?= $car['status'] === 'ไม่ว่าง' ? 'selected' : ''; ?>>ไม่ว่าง</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                    <button type="submit" class="btn btn-primary" name="update">บันทึกการเปลี่ยนแปลง</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteCarModal<?= $car['id']; ?>" tabindex="-1" aria-labelledby="deleteCarModalLabel<?= $car['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteCarModalLabel<?= $car['id']; ?>">ยืนยันการลบ</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>คุณแน่ใจหรือไม่ว่าต้องการลบรถยนต์นี้?</p>
                                    <input type="hidden" name="id" value="<?= $car['id']; ?>" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                    <button type="submit" class="btn btn-danger" name="delete">ลบข้อมูล</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </tbody>
    </table>
</div>
