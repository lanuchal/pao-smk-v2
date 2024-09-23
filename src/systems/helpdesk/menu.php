<div class="bg-dark overflow-hidden" id="sidebar-wrapper">
    <div
        class="text-center d-block d-xl-flex align-items-center justify-content-xl-center align-items-xl-center py-3">
        <img class="me-3" src="assets/img/crossed-hammers_11034266.png" height="30" />
        <h5 class="fw-bold text-light mt-2">ระบบแจ้งซ่อม</h5>
    </div>
    <ul class="sidebar-nav overflow-auto" style="margin-top: 80px; max-height: 90vh; padding-bottom: 30px">
        <li class="text-light-emphasis">ผู้แจ้งงาน</li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'request') ? "active" : "" ?> " href="?s=<?= defending($_GET['s']); ?>&p=request">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-inbox'></i>
                    <span class="">แจ้งงาน</span>
                </div>
            </a>
        </li>
        <li class="text-light-emphasis">ผู้รับแจ้งงาน</li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'list') ? "active" : "" ?> " href="?s=<?= defending($_GET['s']) ?>&p=list">
                <div class="d-flex align-items-center">
                    <i class='bx bx-list-ol'></i>
                    <span class="">รายการแจ้งงาน</span>
                </div>
            </a>
        </li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'type') ? "active" : "" ?> " href="?s=<?= defending($_GET['s']) ?>&p=type">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-layer'></i>
                    <span class="">ประเภทงาน</span>
                </div>
            </a>
        </li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'status') ? "active" : "" ?> " href="?s=<?= defending($_GET['s']) ?>&p=status">
                <div class="d-flex align-items-center">
                    <i class='bx bxs-share-alt'></i>
                    <span class="">สถานะงาน</span>
                </div>
            </a>

        </li>
    </ul>
</div>