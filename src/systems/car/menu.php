<div class="bg-dark overflow-hidden" id="sidebar-wrapper">
    <div
        class="text-center d-block d-xl-flex align-items-center justify-content-xl-center align-items-xl-center py-3">
        <img class="me-3" src="assets/img/calendar_8922255.png" height="30" />
        <h5 class="fw-bold text-light mt-2">ระบบจองห้องประขุม</h5>
    </div>
    <ul class="sidebar-nav overflow-auto" style="margin-top: 80px; max-height: 90vh; padding-bottom: 30px">
        <li class="text-light-emphasis">แจ้งงาน</li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'table') ? "active" : "" ?> " href="?s=<?= defending($_GET['s']); ?>&p=table">
                <div class="d-flex align-items-center">
                    <i class='bx bx-table'></i>
                    <span class="">ตารางจองห้องประชุม</span>
                </div>
            </a>

            <a class="rounded <?= (defending($_GET['p']) == 'type') ? "active" : "" ?> " href="?s=<?= defending($_GET['s']) ?>&p=type">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-layer'></i>
                    <span class="">เพิ่มการจองห้องประชุม</span>
                </div>
            </a>
            <a class="rounded <?= (defending($_GET['p']) == 'setcar') ? "active" : "" ?> " href="?s=<?= defending($_GET['s']) ?>&p=setcar">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-layer'></i>
                    <span class="">ตั้งค่ารถ</span>
                </div>
            </a>
            <a class="rounded <?= (defending($_GET['p']) == 'formatcar') ? "active" : "" ?> " href="?s=<?= defending($_GET['s']) ?>&p=formatcar">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-layer'></i>
                    <span class="">ตั้งค่าประเภทรถ</span>
                </div>
            </a>
        </li>
    </ul>
</div>