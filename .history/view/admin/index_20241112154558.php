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
        $list_category = load_all_category();
        include 'category/list.php';
        break;
    default:
        echo "Trang không tồn tại!";
        break;
}
