<?php

$bands = find_all_equipment_band();
$models = find_all_equipment_model();
$status = find_all_equipment_status();
$affiliations = find_all_affiliation();
?>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- เพิ่มคลาส modal-lg -->
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="addModalLabel">เพิ่มครุภัณฑ์</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="property_code" class="form-label">รหัสสินทรัพย์</label>
                            <input type="text" class="form-control" name="property_code" id="property_code" required>
                        </div>
                        <div class="col-md-6">
                            <label for="property_name" class="form-label">ชื่อสินทรัพย์</label>
                            <input type="text" class="form-control" name="property_name" id="property_name" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="equipment_band_id" class="form-label ps-3">ยี่ห้อ</label>
                            <select class="form-select" name="equipment_band_id">
                                <?php
                                foreach ($bands as $key3 => $row3) {  ?>
                                    <option value="<?= $row3['id'] ?>" <?= $key3 == 0 ? 'selected' : '' ?>><?= $row3['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="equipment_model_id" class="form-label ps-3">รุ่น</label>
                            <select class="form-select" name="equipment_model_id">
                                <?php
                                foreach ($models as $key3 => $row3) {  ?>
                                    <option value="<?= $row3['id'] ?>" <?= $key3 == 0 ? 'selected' : '' ?>><?= $row3['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="resive_date" class="form-label">วันที่ได้รับ</label>
                            <input type="date" class="form-control" name="resive_date" id="resive_date" required>
                        </div>
                        <div class="col-md-6">
                            <label for="sn" class="form-label">หมายเลข S/N</label>
                            <input type="text" class="form-control" name="sn" id="sn" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="price" class="form-label">ราคา</label>
                            <input type="number" step="0.01" class="form-control" name="price" id="price" required>
                        </div>
                        <div class="col-md-6">
                            <label for="equipment_status_id" class="form-label ps-3">รุ่น</label>
                            <select class="form-select" name="equipment_status_id">
                                <?php
                                foreach ($status as $key3 => $row3) {  ?>
                                    <option value="<?= $row3['id'] ?>" <?= $key3 == 0 ? 'selected' : '' ?>><?= $row3['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="form" class="form-label">ผู้ใช้งาน</label>
                            <input type="text" class="form-control" name="form" id="form" required>
                        </div>
                        <div class="col-md-6">
                            <label for="remark" class="form-label">หมายเหตุ</label>
                            <input type="text" class="form-control" name="remark" id="remark" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <!-- affiliations -->
                        <label for="z_affiliation_id" class="form-label ps-3">รุ่น</label>
                        <select class="form-select" name="z_affiliation_id">
                            <?php
                            foreach ($affiliations as $key3 => $row3) {  ?>
                                <option value="<?= $row3['id'] ?>" <?= $key3 == 0 ? 'selected' : '' ?>><?= $row3['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="text-end">
                        <button type="submit" name="create" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
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
    <!-- ตารางครุภัณฑ์ -->
    <table class="table table-hover " id="teble_data">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th style="width: 10%;">รหัสสินทรัพย์</th>
                <th>ชื่อสินทรัพย์</th>
                <th>ยี่ห้อ</th>
                <th style="width: 10%;">วันที่ได้รับ</th>
                <th>หน่วยงาน</th>
                <th>ผู้ใช้งาน</th>
                <th style="width: 10%;">การจัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $equipments = find_all_equipment();
            foreach ($equipments as $row) { ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['property_code']; ?></td>
                    <td><?= $row['property_name']; ?></td>
                    <td><?= $row['b_name']; ?></td>
                    <td><?= convertFullToYMD($row['resive_date']); ?></td>
                    <td><?= $row['a_name']; ?></td>
                    <td><?= $row['form']; ?></td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#editModal"
                            data-id="<?= $row['id']; ?>"
                            data-property_code="<?= $row['property_code']; ?>"
                            data-property_name="<?= $row['property_name']; ?>"
                            data-equipment_band_id="<?= $row['equipment_band_id']; ?>"
                            data-equipment_model_id="<?= $row['equipment_model_id']; ?>"
                            data-equipment_id="<?= $row['equipment_id']; ?>"
                            data-resive_date="<?= $row['resive_date']; ?>"
                            data-sn="<?= $row['sn']; ?>"
                            data-price="<?= $row['price']; ?>"
                            data-equipment_status_id="<?= $row['equipment_status_id']; ?>"
                            data-form="<?= $row['form']; ?>"
                            data-remark="<?= $row['remark']; ?>"
                            data-z_affiliation_id="<?= $row['z_affiliation_id']; ?>">แก้ไข</a>
                        <a href="#" class="btn btn-danger btn-sm delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal"
                            data-id="<?= $row['id']; ?>">ลบ</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- เพิ่มคลาส modal-lg -->
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="editModalLabel">แก้ไขครุภัณฑ์</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <input type="hidden" name="id" id="edit_id">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit_property_code" class="form-label">รหัสสินทรัพย์</label>
                            <input type="text" class="form-control" name="property_code" id="edit_property_code" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_property_name" class="form-label">ชื่อสินทรัพย์</label>
                            <input type="text" class="form-control" name="property_name" id="edit_property_name" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit_equipment_band_id" class="form-label ps-3">ยี่ห้อ</label>
                            <select class="form-select" name="equipment_band_id" id="edit_equipment_band_id">
                                <?php
                                foreach ($bands as $key3 => $row3) {  ?>
                                    <option value="<?= $row3['id'] ?>" <?= $key3 == 0 ? 'selected' : '' ?>><?= $row3['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_equipment_model_id" class="form-label ps-3">รุ่น</label>
                            <select class="form-select" name="equipment_model_id" id="edit_equipment_model_id">
                                <?php
                                foreach ($models as $key3 => $row3) {  ?>
                                    <option value="<?= $row3['id'] ?>" <?= $key3 == 0 ? 'selected' : '' ?>><?= $row3['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit_resive_date" class="form-label">วันที่ได้รับ</label>
                            <input type="date" class="form-control" name="resive_date" id="edit_resive_date" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_sn" class="form-label">หมายเลข S/N</label>
                            <input type="text" class="form-control" name="sn" id="edit_sn" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit_price" class="form-label">ราคา</label>
                            <input type="number" step="0.01" class="form-control" name="price" id="edit_price" required>
                        </div>
                        <div class="col-md-6">
                            <label for="equipment_status_id" class="form-label ps-3">รุ่น</label>
                            <select class="form-select" name="equipment_status_id" id="edit_equipment_status_id">
                                <?php
                                foreach ($status as $key3 => $row3) {  ?>
                                    <option value="<?= $row3['id'] ?>" <?= $key3 == 0 ? 'selected' : '' ?>><?= $row3['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edit_form" class="form-label">ผู้ใช้งาน</label>
                            <input type="text" class="form-control" name="form" id="edit_form" required>
                        </div>
                        <div class="col-md-6">
                            <label for="edit_remark" class="form-label">หมายเหตุ</label>
                            <input type="text" class="form-control" name="remark" id="edit_remark" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <!-- affiliations -->
                        <label for="edit_z_affiliation_id" class="form-label ps-3">รุ่น</label>
                        <select class="form-select" name="z_affiliation_id" id="edit_z_affiliation_id">
                            <?php
                            foreach ($affiliations as $key3 => $row3) {  ?>
                                <option value="<?= $row3['id'] ?>" <?= $key3 == 0 ? 'selected' : '' ?>><?= $row3['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="text-end">
                        <button type="submit" name="edit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"> <!-- เพิ่มคลาส modal-lg -->
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="deleteModalLabel">ลบครุภัณฑ์</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <input type="hidden" name="id" id="delete_id">
                    ยืนยะนการลบข้อมูล
                    <div class="text-end">
                        <button type="submit" name="delete" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // เติมข้อมูลในฟอร์มเวลาคลิกแก้ไข
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            document.getElementById('edit_id').value = this.dataset.id;
            document.getElementById('edit_property_code').value = this.dataset.property_code;
            document.getElementById('edit_property_name').value = this.dataset.property_name;
            document.getElementById('edit_equipment_band_id').value = this.dataset.equipment_band_id;
            document.getElementById('edit_equipment_model_id').value = this.dataset.equipment_model_id;
            document.getElementById('edit_resive_date').value = this.dataset.resive_date.split(' ')[0]; // แยกส่วนวันที่ออกจากเวลาจาก 
            document.getElementById('edit_sn').value = this.dataset.sn;
            document.getElementById('edit_price').value = this.dataset.price;
            document.getElementById('edit_equipment_status_id').value = this.dataset.equipment_status_id;
            document.getElementById('edit_form').value = this.dataset.form;
            document.getElementById('edit_remark').value = this.dataset.remark;
            document.getElementById('edit_z_affiliation_id').value = this.dataset.z_affiliation_id;
        });
    });


    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            document.getElementById('delete_id').value = this.dataset.id;
        });
    });
</script>