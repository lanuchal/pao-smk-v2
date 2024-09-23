<div class="bg-dark overflow-hidden" id="sidebar-wrapper">
    <div
        class="text-center d-block d-xl-flex align-items-center justify-content-xl-center align-items-xl-center py-3">
        <img class="me-3" src="assets/img/teamwork_1256650.png" height="30" />
        <h5 class="fw-bold text-light mt-2">จัดการผู้ใช้งาน</h5>
    </div>
    <ul class="sidebar-nav overflow-auto" style="margin-top: 80px; max-height: 90vh; padding-bottom: 30px">
        
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'user') ? "active" : "" ?> " href="?s=<?= defending($_GET['s']); ?>&p=user">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-user-detail'></i>
                    <span class="">ผู้ใช้งาน</span>
                </div>
            </a>
        </li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'affiliation') ? "active" : "" ?> " href="?s=<?= defending($_GET['s']); ?>&p=affiliation">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-share-alt'></i>
                    <span class="">สังกัด</span>
                </div>
            </a>
        </li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'division') ? "active" : "" ?> " href="?s=<?= defending($_GET['s']) ?>&p=division">
                <div class="d-flex align-items-center">
                    <i class='bx bx-list-ul'></i>
                    <span class="">ฝ่าย</span>
                </div>
            </a>
        </li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'organization') ? "active" : "" ?> " href="?s=<?= defending($_GET['s']) ?>&p=organization">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-business'></i>
                    <span class="">หน่วยงาน</span>
                </div>
            </a>
        </li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'position') ? "active" : "" ?> " href="?s=<?= defending($_GET['s']) ?>&p=position">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-layer'></i>
                    <span class="">ตำแหน่ง</span>
                </div>
            </a>
        </li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'permission') ? "active" : "" ?> " href="?s=<?= defending($_GET['s']) ?>&p=permission">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-lock-open'></i>
                    <span class="">สิทธิ์การใช้งาน</span>
                </div>
            </a>
        </li>
    </ul>
</div>