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
        if (isset($_POST['submit']) && $_POST['submit']) {
            $name = trim($_POST['name'])
        }
        include 'category/add.php';
        break;
    default:
        echo "Trang không tồn tại!";
        break;
}
