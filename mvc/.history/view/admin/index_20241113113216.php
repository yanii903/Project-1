<?php
include_once './query/danh-muc.php';
include_once './query/san-pham.php';
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
        $list_category = load_all_category();

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
            $id_dm = trim($_POST['dm_id']);

            if ($name === '' || $image === '' || $price === '' || $title === '' || $quantity === '' || $describe === '') {
                $thongBao = 'Vui lòng nhập đầy đủ thông tin !';
            }
            if ($name !== "") {
                insert_product($name, $image, $price, $title, $quantity, $describe, $id_dm);
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
        $id_dm = $product['dm_id'];

        $name = load_one_product($id);
        if (isset($_POST["submit"])) {
            $name = trim($_POST['name']);
            $image = trim($_POST["image"]);
            $price = trim($_POST["price"]);
            $title = trim($_POST["title"]);
            $quantity = trim($_POST["quantity"]);
            $describe = trim($_POST['describe']);
            $id_dm = trim($_POST['dm_id']);

            if ($name === '' || $image === '' || $price === '' || $title === '' || $quantity === '' || $describe === '') {
                $thongBao = 'Vui lòng nhập đầy đủ thông tin !';
            }
            if ($name !== "") {
                update_product($id, $name, $image, $price, $title, $quantity, $describe, $id_dm);
                $thongBao = "Thêm mới thành công";
            }
        }
        include "product/update.php";
        break;
    case 'productDelete':
        delete_product($id);
        header("Location: ?act=admin&admin=productList");
        break;
    case 'accountList':
        $list_account = load_all_account();
        include 'account/list.php';
        break;
    case 'accountAdd':
        $list_account = load_all_account();
        $list_role = load_all_role();

        $thongBao = '';
        if (isset($_POST['submit'])) {
            $user = trim($_POST['user']);
            $pass = trim($_POST['pass']);
            $email = trim($_POST['email']);
            $address = trim($_POST['address']);
            $role_id = trim($_POST['role_id']);

            if ($user == '') {
                $thongBao = 'Vui lòng điền tên tài khoản!';
            } elseif ($pass == '') {
                $thongBao = 'Vui lòng điền mật khẩu!';
            } elseif ($email == '') {
                $thongBao = 'Vui lòng điền email!';
            } elseif ($address == '') {
                $thongBao = 'Vui lòng điền địa chỉ!';
            } elseif ($role_id == '') {
                $thongBao = 'Vui lòng chọn role cho tài khoản!';
            } else {
                insert_account($user, $pass, $email, $address, $role_id);
                $thongBao = "Thêm thành công!";
            }
        }
        include 'account/add.php';
        break;
    case 'accountUpdate':
        $list_role =
            load_all_role();
        $id = $_GET['id'] ?? '';

        $account = load_one_account($id);
        $tk_user = $account['tk_user'];
        $tk_password = $account['tk_password'];
        $tk_email = $account['tk_email'];
        $tk_address = $account['tk_address'];
        $role_id = $account['role_id'];

        $list_account = load_all_account();
        $thongBao = '';
        $name = load_one_account($id);
        if (isset($_POST['submit'])) {
            $user = trim($_POST['user']);
            $pass = trim($_POST['pass']);
            $email = trim($_POST['email']);
            $address = trim($_POST['address']);
            $role_id = trim($_POST['role_id']);
            if ($user == '') {
                $thongBao = 'Vui lòng điền tên tài khoản!';
            } elseif ($pass == '') {
                $thongBao = 'Vui lòng điền mật khẩu!';
            } elseif ($email == '') {
                $thongBao = 'Vui lòng điền email!';
            } elseif ($address == '') {
                $thongBao = 'Vui lòng điền địa chỉ!';
            } elseif ($role_id == '') {
                $thongBao = 'Vui lòng chọn role cho tài khoản!';
            } else {
                update_account($id, $user, $pass, $email, $address, $role_id);
                $thongBao = "Sửa thành công!";
            }
        }
        include 'account/update.php';
        // header("location: ?act=admin&admin=categoryList");
        break;
    case 'accountDelete':
        delete_account($id);
        header("location: ?act=admin&admin=accountList");
        break;
    default:
        echo "Trang không tồn tại!";
        break;
}
