<div class="bg-dark overflow-hidden" id="sidebar-wrapper">
    <div
        class="text-center d-block d-xl-flex align-items-center justify-content-xl-center align-items-xl-center py-3">
        <img class="ms-3" src="assets/img/computer_1865273.png" height="30" width="30" />
        <b class="fw-bold text-light mt-2">ระบบบันทึกครุภัณฑ์คอมพิวเตอร์</b>
    </div>
    <ul class="sidebar-nav overflow-auto" style="margin-top: 80px; max-height: 90vh; padding-bottom: 30px">

        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'list') ? "active" : "" ?> " href="?s=<?= defending($_GET['s']); ?>&p=list">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-mouse-alt'></i>
                    <span class="">อุปกรณ์</span>
                </div>
            </a>
        </li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'band') ? "active" : "" ?> " href="?s=<?= defending($_GET['s']) ?>&p=band">
                <div class="d-flex align-items-center">
                    <i class='bx bx-list-ol'></i>
                    <span class="">ยี่ห้อ</span>
                </div>
            </a>
        </li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'model') ? "active" : "" ?> " href="?s=<?= defending($_GET['s']) ?>&p=model">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-layer'></i>
                    <span class="">รุ่น</span>
                </div>
            </a>
        </li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'status') ? "active" : "" ?> " href="?s=<?= defending($_GET['s']) ?>&p=status">
                <div class="d-flex align-items-center">
                    <i class='bx bx-list-ol'></i>
                    <span class="">สถานะ</span>
                </div>
            </a>
        </li>
    </ul>
</div>