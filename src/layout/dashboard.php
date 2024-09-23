<?php
includeIfExists('systems/' . $system . '/model/' . $route . '.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php includeIfExists('common/header.php'); ?>
</head>

<body>


    <div id="wrapper">
        <?php includeIfExists('systems/' . $system . '/menu.php'); ?>
        <div
            class="bg-body-secondary page-content-wrapper position-relative"
            style="min-height: 100vh">
            <?php
            includeIfExists('common/navbar.php');

            ?>
            <div class="px-3 pb-5 position-relative">



                <?php
                includeIfExists('systems/' . $system . '/controller/' . $route . '.php');
                includeIfExists('systems/' . $system . '/view/' . $route . '.php');
                ?>
            </div>
            <br>
            <br>
            <?php
            includeIfExists('common/footer.php');
            ?>
        </div>
    </div>




    <?php includeIfExists('common/script.php'); ?>
</body>

</html>