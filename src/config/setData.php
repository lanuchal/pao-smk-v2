<?php

$route = empty($_GET['p']) ? "login" : defending($_GET['p']);
$system = empty($_GET['s']) ? "login" : defending($_GET['s']);


// echo $system;
