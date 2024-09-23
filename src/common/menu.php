<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img
                    src="assets/img/kaiadmin/logo_light.svg"
                    alt="navbar brand"
                    class="navbar-brand"
                    height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <?php if ($permission_set->report == 1) { ?>
                    <li class="nav-item <?= ($_GET['p'] == "report" ? 'active' : "") ?>">
                        <a class="collapsed" href="?p=report">
                            <i class="fa fa-sticky-note"></i>
                            <p>รายงาน</p>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($permission_set->import == 1) { ?>
                    <li class="nav-item <?= ($_GET['p'] == "import" ? 'active' : "") ?>">
                        <a class="collapsed " href="?p=import">
                            <i class="fa fa-upload"></i>
                            <p>นำเข้าข้อมูล</p>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($permission_set->student == 1) { ?>
                    <li class="nav-item <?= ($_GET['p'] == "student" ? 'active' : "") ?>">
                        <a class="collapsed " href="?p=student">
                            <i class="fa fa-graduation-cap"></i>
                            <p>ข้อมูลนักเรียน</p>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($permission_set->teacher == 1) { ?>
                    <li class="nav-item <?= ($_GET['p'] == "teacher" ? 'active' : "") ?>">
                        <a class="collapsed " href="?p=teacher">
                            <i class="fa fa-user"></i>
                            <p>ข้อมูลครู</p>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($permission_set->permission == 1) { ?>
                    <li class="nav-item <?= ($_GET['p'] == "permission" ? 'active' : "") ?>">
                        <a class="collapsed " href="?p=permission">
                            <i class="fa fa-unlock-alt"></i>
                            <p>สิทธิ์การใช้งาน</p>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>