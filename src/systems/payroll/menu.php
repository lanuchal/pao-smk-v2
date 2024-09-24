<div class="bg-dark overflow-hidden" id="sidebar-wrapper">
    <div class="text-center d-block d-xl-flex align-items-center justify-content-xl-center align-items-xl-center py-3">
        <img class="me-3" src="assets/img/income-statement_10434265.png" height="30" />
        <h5 class="fw-bold text-light mt-2">สลิปเงินเดือน</h5>
    </div>
    <ul class="sidebar-nav overflow-auto" style="margin-top: 80px; max-height: 90vh; padding-bottom: 30px">
        <li class="text-light-emphasis">นำเข้าข้อมูล</li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'importPao') ? "active" : "" ?> "
                href="?s=<?= defending($_GET['s']); ?>&p=importPao">
                <div class="d-flex align-items-center">
                    <i class='bx bx-import'></i>
                    <span class="">เงินเดือน (อบจ.)</span>
                </div>
            </a>
        </li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'importSchool') ? "active" : "" ?> "
                href="?s=<?= defending($_GET['s']); ?>&p=importSchool">
                <div class="d-flex align-items-center">
                    <i class='bx bx-import'></i>
                    <span class="">เงินเดือน (รร.)</span>
                </div>
            </a>
        </li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'importHph') ? "active" : "" ?> "
                href="?s=<?= defending($_GET['s']); ?>&p=importHph">
                <div class="d-flex align-items-center">
                    <i class='bx bx-import'></i>
                    <span class="">เงินเดือน (รพ.สต.)</span>
                </div>
            </a>
        </li>
        <li class="text-light-emphasis">ตารางเงินเดือน</li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'listPao') ? "active" : "" ?> "
                href="?s=<?= defending($_GET['s']); ?>&p=listPao">
                <div class="d-flex align-items-center">
                    <i class='bx bx-list-check' ></i>
                    <span class="">เงินเดือน (อบจ.)</span>
                </div>
            </a>
        </li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'listSchool') ? "active" : "" ?> "
                href="?s=<?= defending($_GET['s']); ?>&p=listSchool">
                <div class="d-flex align-items-center">
                    <i class='bx bx-list-check' ></i>
                    <span class="">เงินเดือน (รร.)</span>
                </div>
            </a>
        </li>
        <li class="px-2">
            <a class="rounded <?= (defending($_GET['p']) == 'listHph') ? "active" : "" ?> "
                href="?s=<?= defending($_GET['s']); ?>&p=listHph">
                <div class="d-flex align-items-center">
                    <i class='bx bx-list-check' ></i>
                    <span class="">เงินเดือน (รพ.สต.)</span>
                </div>
            </a>
        </li>
        
    </ul>
</div>