<?php
$act = $_GET['act'] ?? 'client';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
switch ($act) {
    case 'client':
        include 'view/client/index.php';
        break;
}
// include 'view/client/home.php'
