<?php

includeIfExists('systems/' . $system . '/model/' . $route . '.php');
includeIfExists('systems/' . $system . '/controller/' . $route . '.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'common/header.php';
    ?>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center" style="width: 100%;height: 100vh;">
        <?php

        includeIfExists('systems/' . $system . '/view/' . $route . '.php');
        ?>

    </div>
    <?php
    include 'common/script.php';
    ?>
</body>

</html>