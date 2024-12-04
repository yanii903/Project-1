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
        $name = load_one_category($id);
        if (isset($_POST['submit'])) {
            $name = trim($_POST['name']);
            if ($name == '') {
                $thongBao = 'vui lòng điền tên danh mục!';
            } else {
                update_category($id, $name);
                $thongBao = "Sửa thành công!";
            }
        }
        include 'category/update.php';
        // header("location: ?act=admin&admin=categoryList");
        break;
    case 'productList':
        $list_product = load_all_product();
        include "product/list.php";
        break;
    case 'productAdd':
        $list_category = load_all_category();

        // $add_product=insert_product($);

        $thongBao = '';
        if (isset($_POST["submit"])) {
            $name = trim($_POST['name']);
            $image = trim($_POST["image"]);
            $price = trim($_POST["price"]);
            $title = trim($_POST["title"]);
            $quantity = trim($_POST["quantity"]);
            $describe = trim($_POST['describe']);
            $dm_id = trim($_POST['dm_id']);

            if ($name === '' || $image === '' || $price === '' || $title === '' || $quantity === '' || $describe === '') {
                $thongBao = 'Vui lòng nhập đầy đủ thông tin !';
            }
            if ($name !== "") {
                insert_product($name, $image, $price, $title, $quantity, $describe, $dm_id);
                $thongBao = "Thêm mới thành công";
            }
        }
        include "product/add.php";
        break;
    case 'productUpdate':
        $thongBao = "";
        $id = $_GET['id'] ?? '';


        $product = load_one_product($id);
        $sp_name = $product['sp_name'];
        $sp_image = $product['sp_image'];
        $sp_price = $product['sp_price'];
        $sp_title = $product['sp_title'];
        $sp_quantity = $product['sp_quantity'];
        $sp_describe = $product['sp_describe'];
        $dm_id = $product['dm_id'];

        $name = load_one_product($id);
        if (isset($_POST["submit"])) {
            $name = trim($_POST['name']);
            $image = trim($_POST["image"]);
            $price = trim($_POST["price"]);
            $title = trim($_POST["title"]);
            $quantity = trim($_POST["quantity"]);
            $describe = trim($_POST['describe']);
            $dm_id = trim($_POST['dm_id']);

            if ($name === '' || $image === '' || $price === '' || $title === '' || $quantity === '' || $describe === '') {
                $thongBao = 'Vui lòng nhập đầy đủ thông tin !';
            }
            if ($name !== "") {
                update_product($id, $name, $image, $price, $title, $quantity, $describe, $dm_id);
                $thongBao = "Thêm mới thành công";
            }
        }
        include "product/update.php";
        break;
    case 'productDelete':
        delete_product($id);
        header("Location: ?act=admin&admin=productList");
        break;

    default:
        echo "Trang không tồn tại!";
        break;
}
