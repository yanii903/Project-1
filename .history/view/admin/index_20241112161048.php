<?php
include_once './query/danh-muc.php';
include_once './query/pdo.php';
$admin = $_GET['admin'] ?? 'home';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

switch ($admin) {
    case 'home':
        include 'home.php';
        break;
    case 'categoryList':
        $list_category = load_all_category();
        include 'category/list.php';
        break;
    case 'categoryAdd':
        $list_category = load_all_category();
        include 'category/list.php';
        break;
    default:
        echo "Trang không tồn tại!";
        break;
}
