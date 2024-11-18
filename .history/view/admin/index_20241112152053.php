<?php
$admin = $_GET['admin'] ?? 'home';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

switch ($admin) {
    case 'home':
        include 'home.php';
        break;
    case 'category':
        include 'nav.php';
        break;
    default:
        echo "Trang không tồn tại!";
        break;
}
