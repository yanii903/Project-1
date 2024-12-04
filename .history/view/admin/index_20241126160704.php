<?php
include_once './query/danh-muc.php';
include_once './query/san-pham.php';
include_once './query/tai-khoan.php';
include_once './query/binh-luan.php';
include_once './query/don-hang.php';
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
        $list_category = load_all_category();
        include "product/list.php";
        break;
    case 'productAdd':
        $list_category = load_all_category();
        $thongBao = '';
        $thongBaoLoiTen = '';
        $thongBaoLoiAnh = '';
        $thongBaoLoiGia = '';
        $thongBaoLoiSoLuong = '';
        $thongBaoLoiMoTa = '';
        $thongBaoLoiDM = '';
        if (isset($_POST["submit"])) {
            $name = trim($_POST['name']);
            $image = trim($_POST["image"]);
            $price = trim($_POST["price"]);
            $quantity = trim($_POST["quantity"]);
            $describe = trim($_POST['describe']);
            $id_dm = trim($_POST['dm_id']);
            $sp_pricedel = trim($_POST['sp_pricedel']);

            if ($name === '') {
                $thongBaoLoiTen = 'Vui lòng nhập Tên!';
            } elseif (strlen($name) < 5) {
                $thongBaoLoiTen = 'Tên đăng nhập phải có ít nhất 5 ký tự.';
            }
            if ($image === '') {
                $thongBaoLoiAnh = 'Vui lòng nhập đường dẫn ảnh!';
            }
            if ($price === '') {
                $thongBaoLoiGia = 'Vui lòng nhập Giá!';
            } elseif (!is_numeric($price)) {
                $thongBaoLoiGia = 'Giá phải là một số.';
            }
            if ($quantity === '') {
                $thongBaoLoiSoLuong = 'Vui lòng nhập Số Lượng!';
            }
            if ($describe === '') {
                $thongBaoLoiMoTa = 'Vui lòng nhập Mô tả!';
            }
            if ($id_dm === '') {
                $thongBaoLoiDM = 'Vui lòng chọn danh mục!';
            }
            if (
                empty($thongBaoLoiTen) && empty($thongBaoLoiAnh) && empty($thongBaoLoiGia) &&
                empty($thongBaoLoiTieuDe) && empty($thongBaoLoiSoLuong) &&
                empty($thongBaoLoiMoTa) && empty($thongBaoLoiDM)
            ) {
                insert_product($name, $image, $price, $quantity, $describe, $id_dm, $sp_pricedel);
                $thongBao = "Thêm mới thành công";
            }
        }
        include "product/add.php";
        break;
    case 'productUpdate':
        $thongBao = "";
        $thongBaoLoi = "";
        $id = $_GET['id'] ?? '';
        $list_product = load_all_product();
        $list_category = load_all_category();
        $thongBaoLoiTen = '';
        $thongBaoLoiAnh = '';
        $thongBaoLoiGia = '';
        $thongBaoLoiSoLuong = '';
        $thongBaoLoiMoTa = '';
        $thongBaoLoiDM = '';

        $product = load_one_product($id);
        $sp_id = $product['sp_id'];
        $sp_name = $product['sp_name'];
        $sp_image = $product['sp_image'];
        $sp_price = $product['sp_price'];
        $sp_quantity = $product['sp_quantity'];
        $sp_describe = $product['sp_describe'];
        $id_dm = $product['id_dm'];
        $sp_pricedel = $product['sp_pricedel'];

        // $name = load_one_product($id);
        if (isset($_POST["submit"])) {
            $name = trim($_POST['name']);
            $image = trim($_POST["image"]);
            $price = trim($_POST["price"]);
            $quantity = trim($_POST["quantity"]);
            $describe = trim($_POST['describe']);
            $id_dm = trim($_POST['dm_id']);

            if ($name === '') {
                $thongBaoLoiTen = 'Vui lòng nhập Tên!';
            } elseif (strlen($name) < 5) {
                $thongBaoLoiTen = 'Tên đăng nhập phải có ít nhất 5 ký tự.';
            }

            if ($image === '') {
                $thongBaoLoiAnh = 'Vui lòng nhập đường dẫn ảnh!';
            }

            if ($price === '') {
                $thongBaoLoiGia = 'Vui lòng nhập Giá!';
            } elseif (!is_numeric($price)) {
                $thongBaoLoiGia = 'Giá phải là một số.';
            }

            if ($quantity === '') {
                $thongBaoLoiSoLuong = 'Vui lòng nhập Số Lượng!';
            }

            if ($describe === '') {
                $thongBaoLoiMoTa = 'Vui lòng nhập Mô tả!';
            }

            if ($id_dm === '' || $id_dm === '0') {
                $thongBaoLoiDM = 'Vui lòng chọn danh mục!';
            }


            if (
                empty($thongBaoLoiTen) && empty($thongBaoLoiAnh) && empty($thongBaoLoiGia) &&
                empty($thongBaoLoiTieuDe) && empty($thongBaoLoiSoLuong) &&
                empty($thongBaoLoiMoTa) && empty($thongBaoLoiDM)
            ) {
                update_product($sp_id, $name, $image, $price, $quantity, $describe, $id_dm, $sp_pricedel);
                $thongBao = "Sửa thành công";
            }
        }
        include "product/update.php";
        break;
    case 'productDelete':
        delete_product($id);
        header("Location: ?act=admin&admin=productList");
        break;
    case 'productColor-List':
        $list_product = load_all_product();
        $list_product_color = load_all_product_color();
        $list_category = load_all_category();
        include 'product/product-color/list.php';
        break;
    case 'productColor-Add':
        $thongBao = "";
        $thongBaoLoiTen = '';
        $thongBaoLoiSP = '';
        $list_product = load_all_product();
        $list_product_color = load_all_product_color();
        $list_category = load_all_category();
        if (isset($_POST["submit"])) {
            $name = trim($_POST['name']);

            $id_dm = trim($_POST['id_dm']);

            if ($name === '') {
                $thongBaoLoiTen = 'Vui lòng nhập Tên!';
            } elseif (strlen($name) < 5) {
                $thongBaoLoiTen = 'Tên đăng nhập phải có ít nhất 5 ký tự.';
            }


            if ($id_dm === '' || $id_dm === '0') {
                $thongBaoLoiSP = 'Vui lòng chọn danh mục!';
            }


            if (
                empty($thongBaoLoiTen) &&  empty($thongBaoLoiSP)
            ) {
                insert_product_color($name, $id_dm);
                $thongBao = "Thêm thành công";
            }
        }
        include 'product/product-color/add.php';
        break;

    case 'productColor-Update':
        $thongBao = "";
        $thongBaoLoiTen = '';
        $thongBaoLoiSP = '';
        $list_product = load_all_product();
        $list_product_color = load_all_product_color();
        $product = load_one_product_color($id);
        $list_category = load_all_category();
        $pc_id = $product['pc_id'];
        $pc_name = $product['pc_name'];

        $id_dm = $product['id_dm'];

        // $name = load_one_product($id);
        if (isset($_POST["submit"])) {
            $name = trim($_POST['name']);

            $id_dm = trim($_POST['id_dm']);

            if ($name === '') {
                $thongBaoLoiTen = 'Vui lòng nhập Tên!';
            } elseif (strlen($name) < 5) {
                $thongBaoLoiTen = 'Tên đăng nhập phải có ít nhất 5 ký tự.';
            }
            if ($id_sp_c === '' || $id_sp_c === '0') {
                $thongBaoLoiSP = 'Vui lòng chọn danh mục!';
            }
            if (
                empty($thongBaoLoiTen) &&  empty($thongBaoLoiSP)
            ) {
                update_product_color($id, $pc_name, $id_dm);
                $thongBao = "Sửa thành công";
            }
        }
        include 'product/product-color/update.php';
        break;
    case 'productColor-Delete':
        delete_product_color($id);
        header("Location: ?act=admin&admin=productColor-List");
        break;
    case 'productMemory-List':
        $list_product = load_all_product();
        $list_product_memory = load_all_product_memory();
        $list_category = load_all_category();
        include 'product/product-memory/list.php';
        break;
    case 'productMemory-Add':
        $thongBao = "";
        $thongBaoLoiTen = '';
        $thongBaoLoiSP = '';
        $list_product = load_all_product();
        $list_product_memory = load_all_product_memory();
        $list_category = load_all_category();
        if (isset($_POST["submit"])) {
            $name = trim($_POST['name']);

            $id_dm = trim($_POST['id_dm']);

            if ($name === '') {
                $thongBaoLoiTen = 'Vui lòng nhập Tên!';
            } elseif (strlen($name) < 5) {
                $thongBaoLoiTen = 'Tên đăng nhập phải có ít nhất 5 ký tự.';
            }


            if ($id_dm === '' || $id_dm === '0') {
                $thongBaoLoiSP = 'Vui lòng chọn danh mục!';
            }


            if (
                empty($thongBaoLoiTen) &&  empty($thongBaoLoiSP)
            ) {
                insert_product_memory($name, $id_dm);
                $thongBao = "Thêm thành công";
            }
        }

        include 'product/product-memory/add.php';
        break;
    case 'productMemory-Update':
        $thongBao = "";
        $thongBaoLoiTen = '';
        $thongBaoLoiSP = '';
        $list_product = load_all_product();
        $list_product_memory = load_all_product_memory();
        $product = load_one_product_memory($id);
        $list_category = load_all_category();
        $pm_id = $product['pm_id'];
        $pm_name = $product['pm_name'];

        $id_dm = $product['id_dm'];

        // $name = load_one_product($id);
        if (isset($_POST["submit"])) {
            $name = trim($_POST['name']);

            $id_dm = trim($_POST['id_dm']);

            if ($name === '') {
                $thongBaoLoiTen = 'Vui lòng nhập Tên!';
            } elseif (strlen($name) < 5) {
                $thongBaoLoiTen = 'Tên đăng nhập phải có ít nhất 5 ký tự.';
            }


            if ($id_dm === '' || $id_dm === '0') {
                $thongBaoLoiSP = 'Vui lòng chọn danh mục!';
            }


            if (
                empty($thongBaoLoiTen) &&  empty($thongBaoLoiSP)
            ) {
                update_product_memory($id, $pm_name, $id_dm);
                $thongBao = "Sửa thành công";
            }
        }
        include 'product/product-memory/update.php';
        break;


    case 'productMemory-Delete':
        delete_product_memory($id);
        header("Location: ?act=admin&admin=productMemory-List");
        break;

    case 'accountList':
        $list_account = load_all_account();
        include 'account/list.php';
        break;
    case 'accountAdd':
        $list_account = load_all_account();
        $list_role = load_all_role();

        $errors = [];
        $thongBao = '';

        if (isset($_POST['submit'])) {
            $user = trim($_POST['user']);
            $pass = trim($_POST['pass']);
            $email = trim($_POST['email']);
            $address = trim($_POST['address']);
            $id_role = trim($_POST['id_role']);

            if ($user == '') {
                $errors['user'] = 'Vui lòng điền tên tài khoản!';
            } elseif (check_duplicate_account($user)) {
                $errors['user'] = 'Tên tài khoản đã tồn tại!';
            } elseif (strlen($user) < 5) {
                $errors['user'] = 'Tên tài khoản phải dài ít nhất 5 ký tự!';
            }

            if ($pass == '') {
                $errors['pass'] = 'Vui lòng điền mật khẩu!';
            } elseif (strlen($pass) < 6) {
                $errors['pass'] = 'Mật khẩu phải dài ít nhất 6 ký tự!';
            }

            if ($email == '') {
                $errors['email'] = 'Vui lòng điền email!';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Địa chỉ email không hợp lệ!';
            }

            if ($address == '') {
                $errors['address'] = 'Vui lòng điền địa chỉ!';
            }

            if ($id_role == '') {
                $errors['id_role'] = 'Vui lòng chọn role cho tài khoản!';
            }

            if (empty($errors)) {
                insert_account($user, $pass, $email, $address, $id_role);
                $thongBao = "Thêm thành công!";
            }
        }
        include 'account/add.php';
        break;

    case 'accountUpdate':
        $list_role = load_all_role();
        $id = $_GET['id'] ?? '';

        $account = load_one_account($id);
        $tk_user = $account['tk_user'];
        $tk_password = $account['tk_password'];
        $tk_email = $account['tk_email'];
        $tk_address = $account['tk_address'];
        $id_role = $account['id_role'];

        $list_account = load_all_account();
        $thongBao = '';
        $errors = []; // Mảng lưu lỗi
        $name = load_one_account($id);
        if (isset($_POST['submit'])) {
            $user = trim($_POST['user']);
            $pass = trim($_POST['pass']);
            $email = trim($_POST['email']);
            $address = trim($_POST['address']);
            $id_role = trim($_POST['id_role']);
            if ($user == '') {
                $errors['user'] = 'Vui lòng điền tên tài khoản!';
            } elseif (check_duplicate_account($user)) {
                $errors['user'] = 'Tên tài khoản đã tồn tại!';
            } elseif (strlen($user) < 5) {
                $errors['user'] = 'Tên tài khoản phải dài ít nhất 5 ký tự!';
            }
            if ($pass == '') {
                $errors['pass'] = 'Vui lòng điền mật khẩu!';
            } elseif (strlen($pass) < 6) {
                $errors['pass'] = 'Mật khẩu phải dài ít nhất 6 ký tự!';
            }
            if ($email == '') {
                $errors['email'] = 'Vui lòng điền email!';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Địa chỉ email không hợp lệ!';
            }
            if ($address == '') {
                $errors['address'] = 'Vui lòng điền địa chỉ!';
            }
            if ($id_role == '') {
                $errors['id_role'] = 'Vui lòng chọn role cho tài khoản!';
            }
            if (empty($errors)) {
                update_account($id, $user, $pass, $email, $address, $id_role);
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
    case 'commentList':
        $list_comment = load_all_comment();
        include 'comment/list.php';
        break;
    case 'commentDelete':
        delete_comment($id);
        header("location: ?act=admin&admin=commentList");
        break;
    case 'orderList':
        $list_order = load_all_order();
        $list_orderdetail = load_all_orderdetail();
        include 'order/list.php';
        break;
    case 'orderDelete':
        $dh_id = isset($_GET['dhid']) ? intval($_GET['dhid']) : 0;
        delete_order($dh_id);
        header("Location: ?act=admin&admin=orderList");
        include 'order/list.php';
        break;
    case 'orderUpdate':
        $dh_id = isset($_GET['dhid']) ? intval($_GET['dhid']) : 0;
        $load_one_order = load_one_order($dh_id);

        $mess = "";

        if (isset($_POST['btnPayUpdate'])) {
            $statusPay = trim($_POST['statusPay']);

            // Biến kiểm tra tính hợp lệ
            $check_valid_order = true;

            // cập nhật trạng thái đơn hàng
            if ($check_valid_order) {
                update_order($dh_id, $statusPay);
                $mess = "Cập Nhật thành công!";
                header("Refresh: 1.5; url='?act=admin&admin=orderList'");
            }
        }

        include 'order/update.php';
        break;
    default:
        echo "Trang không tồn tại!";
        break;
}