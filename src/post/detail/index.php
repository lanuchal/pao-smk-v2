<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>pao</title>

    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="../../assets/fonts/Kanit.css">

    <link rel="stylesheet" href="../../assets/css/bs-theme-overrides.css">

    <link rel="stylesheet" href="../../assets/css/aos.min.css">

    <link rel="stylesheet" href="../../assets/css/Sidebar-Menu-sidebar.css">

    <link rel="stylesheet" href="../../assets/css/Sidebar-Menu.css">

    <link rel="stylesheet" href="../../assets/css/styles.css">

    <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap5.css">

    <link rel="stylesheet" href="../../assets/icon/css/boxicons.min.css">

    <link rel="stylesheet" href="../../assets/fullcalendar-3.6.2/fullcalendar.min.css">
</head>

<body>

<nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3 navbar-light" id="mainNav">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
            <span>Brand</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="features.html">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="integrations.html">Integrations</a></li>
                    <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" href="contacts.html">Contacts</a></li>
                </ul>
                <a class="btn btn-primary shadow" role="button" href="signup.html">Sign up</a>
            </div>
        </div>
    </nav>

    <div class="d-flex justify-content-center align-items-center" style="width: 100%;height: 100vh;">
        <?php

        includeIfExists('systems/' . $system . '/view/' . $route . '.php');
        ?>

    </div>
    <?php
    include '../../common/script.php';
    ?>
</body>

</html>