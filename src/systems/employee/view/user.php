<?php

?>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
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
                        <div class="col-md-6 mb-3 ">
                            <label for="user_code" class="form-label ps-3">รหัสพนักงาน</label>
                            <input type="text" class="form-control" name="user_code" placeholder="รหัสพนักงาน" required>
                        </div>
                        <div class="col-md-6 mb-3 ">
                            <label for="user_name" class="form-label ps-3">ชื่อ</label>
                            <input type="text" class="form-control" name="user_name" placeholder="ชื่อ - นามสกุล" required>
                        </div>
                        <div class="col-md-6 mb-3 ">
                            <label for="user_pass" class="form-label ps-3">รหัสผ่าน</label>
                            <input type="password" class="form-control" name="user_pass" placeholder="รหัสผ่าน" required>
                        </div>
                        <div class="col-md-6 mb-3 ">
                            <label for="cc_user_code" class="form-label ps-3">ยืนยันรหัสผ่าน</label>
                            <input type="password" class="form-control" name="cc_user_code" placeholder="ยืนยันรหัสผ่าน" required>
                        </div>

                        <div class="col-md-6 mb-3 ">
                            <label for="organization_id" class="form-label ps-3">หน่วยงาน</label>
                            <select class="form-select" name="organization_id">
                                <?php
                                $organizations = find_all_organization();
                                foreach ($organizations as $key1 => $row1) {  ?>
                                    <option value="<?= $row1['id'] ?>" <?= $key1 == 0 ? 'selected' : '' ?>><?= $row1['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3 ">
                            <label for="affiliation_id" class="form-label ps-3">สังกัด</label>
                            <select class="form-select" name="affiliation_id">
                                <?php
                                $affiliations = find_all_affiliation();
                                foreach ($affiliations as $key2 => $row2) {  ?>
                                    <option value="<?= $row2['id'] ?>" <?= $key2 == 0 ? 'selected' : '' ?>><?= $row2['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3 ">
                            <label for="division_id" class="form-label ps-3">ฝ่าย</label>
                            <select class="form-select" name="division_id">
                                <?php
                                $divisions = find_all_division();
                                foreach ($divisions as $key3 => $row3) {  ?>
                                    <option value="<?= $row3['id'] ?>" <?= $key3 == 0 ? 'selected' : '' ?>><?= $row3['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3 ">
                            <label for="position_id" class="form-label ps-3">ตำแหน่ง</label>
                            <select class="form-select" name="position_id">
                                <?php
                                $positions = find_all_position();
                                foreach ($positions as $key4 => $row4) {  ?>
                                    <option value="<?= $row4['id'] ?>" <?= $key4 == 0 ? 'selected' : '' ?>><?= $row4['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3 ">
                            <label for="permission_id" class="form-label ps-3">สิทธิ์การใช้งาน</label>
                            <select class="form-select" name="permission_id">
                                <?php
                                $permissions = find_all_permission();
                                foreach ($permissions as $key5 => $row5) {  ?>
                                    <option value="<?= $row5['id'] ?>" <?= $key5 == 0 ? 'selected' : '' ?>><?= $row5['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary" name="create">บักทึก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="card p-4 border-0 shadow">

    <div class="row mb-4">
        <div class="col-md-6">
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
                <th class="text-center" style="min-width: 10rem;">รหัสพนักงาน</th>
                <th class="text-center" style="min-width: 15rem;">ชื่อ</th>
                <th class="text-center">หน่วยงาน</th>
                <th class="text-center">ตำแหน่ง</th>
                <th class="text-center" style="min-width: 10rem;">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $users = find_all_user();
            foreach ($users as $row) {
            ?>
                <tr>
                    <td class="text-center"><?= $row['user_code']; ?></td>
                    <td class="text-start"><?= $row['user_name']; ?></td>
                    <td class="text-center"><?= $row['or_name']; ?></td>
                    <td class="text-center"><?= $row['ps_name']; ?></td>
                    <td class="text-center">
                        <div class="dropdown dropstart">
                            <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                จัดการ
                            </button>
                            <ul class="dropdown-menu border-0 shadow">
                                <li>
                                    <button
                                        class="dropdown-item"
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal"
                                        data-user_id="<?= $row['user_id']; ?>"
                                        data-user_code="<?= $row['user_code']; ?>"
                                        data-user_name="<?= $row['user_name']; ?>"
                                        data-organization_id="<?= $row['organization_id']; ?>"
                                        data-affiliation_id="<?= $row['affiliation_id']; ?>"
                                        data-position_id="<?= $row['position_id']; ?>"
                                        data-division_id="<?= $row['division_id']; ?>"
                                        data-permission_id="<?= $row['permission_id']; ?>">
                                        <i class='bx bxs-edit me-2'></i>แก้ไข
                                    </button>
                                </li>
                                <li>
                                    <button
                                        class="dropdown-item"
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        data-user_id="<?= $row['user_id']; ?>"
                                        data-user_name="<?= $row['user_name']; ?>">
                                        <i class='bx bx-trash me-2'></i>ลบ
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form method="POST" action="?s=<?= defending($_GET['s']) ?>&p=<?= defending($_GET['p']) ?>">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="editModalLabel">
                        <div class="d-flex align-items-center"> <i class='bx bxs-edit me-2'></i> แก้ไขข้อมูล </div>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-0">
                    <div class="row">
                        <div class="col-md-6 mb-3 ">
                            <input type="hidden" name="user_id" id="edit-user_id">
                            <label for="user_code" class="form-label ps-3">รหัสพนักงาน</label>
                            <input type="text" class="form-control" name="user_code" id="edit-user_code" placeholder="รหัสพนักงาน" required>
                        </div>
                        <div class="col-md-6 mb-3 ">
                            <label for="user_name" class="form-label ps-3">ชื่อ</label>
                            <input type="text" class="form-control" name="user_name" id="edit-user_name" placeholder="ชื่อ - นามสกุล" required>
                        </div>
                        <div class="col-md-6 mb-3 ">
                            <label for="organization_id" class="form-label ps-3">หน่วยงาน</label>
                            <select class="form-select" name="organization_id" id="edit-organization_id">
                                <?php
                                foreach ($organizations as $key1 => $row1) {  ?>
                                    <option value="<?= $row1['id'] ?>" <?= $key1 == 0 ? 'selected' : '' ?>><?= $row1['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3 ">
                            <label for="affiliation_id" class="form-label ps-3">สังกัด</label>
                            <select class="form-select" name="affiliation_id" id="edit-affiliation_id">
                                <?php
                                foreach ($affiliations as $key2 => $row2) {  ?>
                                    <option value="<?= $row2['id'] ?>" <?= $key2 == 0 ? 'selected' : '' ?>><?= $row2['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3 ">
                            <label for="division_id" class="form-label ps-3">ฝ่าย</label>
                            <select class="form-select" name="division_id" id="edit-division_id">
                                <?php
                                foreach ($divisions as $key3 => $row3) {  ?>
                                    <option value="<?= $row3['id'] ?>" <?= $key3 == 0 ? 'selected' : '' ?>><?= $row3['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3 ">
                            <label for="position_id" class="form-label ps-3">ตำแหน่ง</label>
                            <select class="form-select" name="position_id" id="edit-position_id">
                                <?php
                                foreach ($positions as $key4 => $row4) {  ?>
                                    <option value="<?= $row4['id'] ?>" <?= $key4 == 0 ? 'selected' : '' ?>><?= $row4['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3 ">
                            <label for="permission_id" class="form-label ps-3">สิทธิ์การใช้งาน</label>
                            <select class="form-select" name="permission_id" id="edit-permission_id">
                                <?php
                                foreach ($permissions as $key5 => $row5) {  ?>
                                    <option value="<?= $row5['id'] ?>" <?= $key5 == 0 ? 'selected' : '' ?>><?= $row5['name'] ?></option>
                                <?php } ?>
                            </select>
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


<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="?s=<?= defending($_GET['s']) ?>&p=<?= defending($_GET['p']) ?>">
                <div class="modal-header border-0">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">
                        <div class="d-flex align-items-center"> <i class='bx bx-trash me-2'></i> ลบข้อมูล </div>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-0">
                    <div class="mb-3 text-center">
                        <input type="hidden" name="user_id" id="delete-user_id">
                        <label for="delete-user_id" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" name="user_name" id="delete-user_name">
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

<script>
    var editModal = document.getElementById("editModal");
    editModal.addEventListener("show.bs.modal", function(event) {
        var button = event.relatedTarget;
        var user_id = button.getAttribute("data-user_id");
        var user_code = button.getAttribute("data-user_code");
        var user_name = button.getAttribute("data-user_name");
        var organization_id = button.getAttribute("data-organization_id");
        var affiliation_id = button.getAttribute("data-affiliation_id");
        var position_id = button.getAttribute("data-position_id");
        var division_id = button.getAttribute("data-division_id");
        var permission_id = button.getAttribute("data-permission_id");

        var modal = this;
        modal.querySelector("#edit-user_id").value = user_id;
        modal.querySelector("#edit-user_code").value = user_code;
        modal.querySelector("#edit-user_code").disabled = true;
        modal.querySelector("#edit-user_name").value = user_name;
        modal.querySelector("#edit-organization_id").value = organization_id;
        modal.querySelector("#edit-affiliation_id").value = affiliation_id;
        modal.querySelector("#edit-position_id").value = position_id;
        modal.querySelector("#edit-division_id").value = division_id;
        modal.querySelector("#edit-permission_id").value = permission_id;
    });

    var deleteModal = document.getElementById("deleteModal");
    deleteModal.addEventListener("show.bs.modal", function(event) {
        var button = event.relatedTarget;
        var user_id = button.getAttribute("data-user_id");
        var user_name = button.getAttribute("data-user_name");
        var modal = this;
        modal.querySelector("#delete-user_id").value = user_id;
        modal.querySelector("#delete-user_name").value = user_name;
        modal.querySelector("#delete-user_name").disabled = true;
    });
</script>