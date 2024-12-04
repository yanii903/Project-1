<?php
$admin = $_GET['act'] ?? 'admin';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

switch ($admin) {
    case 'admin':
        include 'home.php';
        break;
    case 'category':
        include 'nav.php';
        break;
    default:
        echo "Trang không tồn tại!";
        break;
}
