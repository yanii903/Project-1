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
        $thongBao = '';
        if (isset($_POST['submit'])) {
            $name = trim($_POST['name']);
            if ($name == '') {
                $thongBao = 'vui lòng điền tên danh mục!';
            } else {
                insert_category($name);
                $thongBao = "thêm thành công!";
            }
        }
        include 'category/add.php';
        break;
    case 'categoryDelete':
        delete_category($id);
        header("location: ?act=admin&admin=categoryList");
        break;
    case 'categoryUpdate':
        $thongBao = '';
        if (isset($_POST['submit'])) {
            $name = trim($_POST['name']);
            if ($name == '') {
                $thongBao = 'vui lòng điền tên danh mục!';
            } else {
                update_category($dm_id, $dm_name)
                $thongBao = "thêm thành công!";
            }
        }
        header("location: ?act=admin&admin=categoryList");
        break;
    default:
        echo "Trang không tồn tại!";
        break;
}
