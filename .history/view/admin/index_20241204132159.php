<?php
session_start();
include_once './query/danh-muc.php';
include_once './query/san-pham.php';
include_once './query/tai-khoan.php';
include_once './query/binh-luan.php';
include_once './query/don-hang.php';
include_once './query/pdo.php';
include_once './query/thong-ke.php';
include_once './query/tong-doanh-thu.php';
include_once './query/gio-hang.php';
$admin = $_GET['admin'] ?? 'home';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

switch ($admin) {
    case 'home':
        $count_product = count_product();
        $count_category = count_category();
        $count_order = count_order();
        $count_account = count_account();
        $count_profit = count_profit();

        $count_iphone = count_iphone();
        $count_samsung = count_samsung();
        $count_oppo = count_oppo();

        $top_selling = top_product_selling();
        $report_totalamount = report_totalamount();
        // Gọi các hàm lấy doanh thu theo tháng
        $thang_1 = thang_1();
        $thang_2 = thang_2();
        $thang_3 = thang_3();
        $thang_4 = thang_4();
        $thang_5 = thang_5();
        $thang_6 = thang_6();
        $thang_7 = thang_7();
        $thang_8 = thang_8();
        $thang_9 = thang_9();
        $thang_10 = thang_10();
        $thang_11 = thang_11();
        $thang_12 = thang_12();

        // Tránh lỗi khi mảng không có phần tử
        $doanh_thu_thang_1 = isset($thang_1[0]['tong_doanh_thu']) ? (float)$thang_1[0]['tong_doanh_thu'] : 0;
        $doanh_thu_thang_2 = isset($thang_2[0]['tong_doanh_thu']) ? (float)$thang_2[0]['tong_doanh_thu'] : 0;
        $doanh_thu_thang_3 = isset($thang_3[0]['tong_doanh_thu']) ? (float)$thang_3[0]['tong_doanh_thu'] : 0;
        $doanh_thu_thang_4 = isset($thang_4[0]['tong_doanh_thu']) ? (float)$thang_4[0]['tong_doanh_thu'] : 0;
        $doanh_thu_thang_5 = isset($thang_5[0]['tong_doanh_thu']) ? (float)$thang_5[0]['tong_doanh_thu'] : 0;
        $doanh_thu_thang_6 = isset($thang_6[0]['tong_doanh_thu']) ? (float)$thang_6[0]['tong_doanh_thu'] : 0;
        $doanh_thu_thang_7 = isset($thang_7[0]['tong_doanh_thu']) ? (float)$thang_7[0]['tong_doanh_thu'] : 0;
        $doanh_thu_thang_8 = isset($thang_8[0]['tong_doanh_thu']) ? (float)$thang_8[0]['tong_doanh_thu'] : 0;
        $doanh_thu_thang_9 = isset($thang_9[0]['tong_doanh_thu']) ? (float)$thang_9[0]['tong_doanh_thu'] : 0;
        $doanh_thu_thang_10 = isset($thang_10[0]['tong_doanh_thu']) ? (float)$thang_10[0]['tong_doanh_thu'] : 0;
        $doanh_thu_thang_11 = isset($thang_11[0]['tong_doanh_thu']) ? (float)$thang_11[0]['tong_doanh_thu'] : 0;
        $doanh_thu_thang_12 = isset($thang_12[0]['tong_doanh_thu']) ? (float)$thang_12[0]['tong_doanh_thu'] : 0;

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
        $resultProduct = [];

        if (isset($_POST['btnSearch'], $_POST['inputSearch'])) {
            $inputSearch = trim(strtolower($_POST['inputSearch']));

            foreach ($list_product as $value) {
                $nameProduct = strtolower($value['sp_name']);
                $priceProduct = strtolower($value['sp_price']);

                if (strpos($nameProduct, $inputSearch) !== false || strpos($priceProduct, $inputSearch) !== false) {
                    array_push($resultProduct, $value);
                }
            }
        }
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
        $thongBaoLoiSP = '';
        $thongBaoLoiMau = '';
        $thongBaoLoiBoNho = '';
        $thongBaoLoiTenBN = '';
        $thongBaoLoiTenMau = '';

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
                $sp_ma = 'SP_' . mt_rand(100000, 999999);
                insert_product($name, $image, $price, $quantity, $describe, $id_dm, $sp_ma, $sp_pricedel);
                $thongBao = "Thêm mới thành công";
            }
        }

        $list_product = load_all_product();
        $list_product_color = load_all_product_color();
        $list_category = load_all_category();
        if (isset($_POST["submit_color"])) {
            $name = trim($_POST['name_color']);

            $id_sp = trim($_POST['id_sp_c']);

            if ($name === '') {
                $thongBaoLoiTenMau = 'Vui lòng nhập Tên!';
            } elseif (strlen($name) < 5) {
                $thongBaoLoiTenMau = 'Tên đăng nhập phải có ít nhất 5 ký tự.';
            }


            if ($id_sp === '' || $id_sp === '0') {
                $thongBaoLoiMau = 'Vui lòng chọn sản phẩm!';
            }


            if (
                empty($thongBaoLoiTenMau) &&  empty($thongBaoLoiMau)
            ) {
                insert_product_color($name, $id_sp);
                $thongBao = "Thêm thành công";
            }
        }

        $list_product = load_all_product();
        $list_product_memory = load_all_product_memory();
        $list_category = load_all_category();
        if (isset($_POST["submit_memory"])) {
            $name = trim($_POST['name_memory']);

            $id_sp = trim($_POST['id_sp_m']);

            if ($name === '') {
                $thongBaoLoiTenBN = 'Vui lòng nhập Tên!';
            } elseif (strlen($name) < 5) {
                $thongBaoLoiTenBN = 'Tên đăng nhập phải có ít nhất 5 ký tự.';
            }


            if ($id_sp === '' || $id_sp === '0') {
                $thongBaoLoiBoNho = 'Vui lòng chọn sản phẩm!';
            }


            if (
                empty($thongBaoLoiTen) &&  empty($thongBaoLoiBoNho)
            ) {
                insert_product_memory($name, $id_sp);
                $thongBao = "Thêm thành công";
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
        $list_product_color = load_all_product_color();
        $list_product_memory = load_all_product_memory();


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
    case 'productDetail':

        $id = $_GET['id'] ?? '';
        $list_product = load_all_product();
        $list_category = load_all_category();

        $thongBaoLoiSP = '';
        $thongBaoLoiMau = '';
        $thongBaoLoiBoNho = '';
        $thongBaoLoiTenBN = '';
        $thongBaoLoiTenMau = '';
        $thongBaoMau = '';
        $thongBaoBN = '';

        $product = load_one_product($id);
        $sp_id = $product['sp_id'];
        $sp_name = $product['sp_name'];
        $sp_image = $product['sp_image'];
        $sp_price = $product['sp_price'];
        $sp_quantity = $product['sp_quantity'];
        $sp_describe = $product['sp_describe'];
        $id_dm = $product['id_dm'];
        $sp_pricedel = $product['sp_pricedel'];
        if (isset($_POST["submit_color"])) {
            $name = trim($_POST['name_color']);

            $id_sp = $_GET["id"];

            if ($name === '') {
                $thongBaoLoiTenMau = 'Vui lòng nhập Tên!';
            }





            if (
                empty($thongBaoLoiTenMau) &&  empty($thongBaoLoiSP)
            ) {
                insert_product_color($name, $id_sp);
                $thongBaoMau = "Thêm thành công";
            }
        }
        if (isset($_POST["submit_memory"])) {
            $name = trim($_POST['name_memory']);

            $id_sp = $_GET["id"];

            if ($name === '') {
                $thongBaoLoiTenBN = 'Vui lòng nhập Tên!';
            }





            if (
                empty($thongBaoLoiTenBN) &&  empty($thongBaoLoiSP)
            ) {
                insert_product_memory($name, $id_sp);
                $thongBaoBN = "Thêm thành công";
            }
        }

        include "product/detail.php";
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

            $id_sp = trim($_POST['id_sp']);

            if ($name === '') {
                $thongBaoLoiTen = 'Vui lòng nhập Tên!';
            } elseif (strlen($name) < 5) {
                $thongBaoLoiTen = 'Tên đăng nhập phải có ít nhất 5 ký tự.';
            }


            if ($id_sp === '' || $id_sp === '0') {
                $thongBaoLoiSP = 'Vui lòng chọn danh mục!';
            }


            if (
                empty($thongBaoLoiTen) &&  empty($thongBaoLoiSP)
            ) {
                insert_product_color($name, $id_sp);
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

        $product_color = load_one_product_color($id);
        $list_category = load_all_category();
        $pc_id = $product_color['pc_id'];
        $pc_name = $product_color['pc_name'];



        // $name = load_one_product($id);
        if (isset($_POST["submit"])) {
            $name = trim($_POST['name']);
            $id_sp = $_GET["idsp"];





            if (
                empty($thongBaoLoiTen) &&  empty($thongBaoLoiSP)
            ) {
                update_product_color($id, $name, $id_sp);

                $thongBao = "Sửa thành công";
            }
        }
        include 'product/product-color/update.php';
        break;
    case 'productColor-Delete':



        $id_sp = $_GET['idsp'];
        $pc_id = $_GET['id'];

        delete_product_color($id);
        header("Location: ?act=admin&admin=productUpdate&id=$id_sp&idcolor=$pc_id");

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

            $id_sp = trim($_POST['id_sp']);

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
                insert_product_memory($name, $id_sp);
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

        $id_sp = $product['id_sp'];

        // $name = load_one_product($id);
        if (isset($_POST["submit"])) {
            $name = trim($_POST['name']);

            $id_sp = $_GET["idsp"];

            if (
                empty($thongBaoLoiTen) &&  empty($thongBaoLoiSP)
            ) {
                update_product_memory($id, $name, $id_sp);
                $thongBao = "Sửa thành công";
            }
        }
        include 'product/product-memory/update.php';
        break;


    case 'productMemory-Delete':

        $id_sp = $_GET['idsp'];
        $pm_id = $_GET['id'];
        delete_product_memory($id);


        header("Location: ?act=admin&admin=productUpdate&id=$id_sp&idmemory=$pm_id");
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
        $resultOrder = [];
        if (isset($_POST['btnSearch'], $_POST['inputSearch'])) {
            $inputSearch = trim(strtolower($_POST['inputSearch']));
            foreach ($list_order as $value) {
                $dh_nameUser = strtolower($value['dh_nameUser']);
                $dh_emailUser = strtolower($value['dh_emailUser']);

                if (strpos($dh_nameUser, $inputSearch) !== false || strpos($dh_emailUser, $inputSearch) !== false) {
                    array_push($resultOrder, $value);
                }
            }
        }
        include 'order/list.php';
        break;
    case 'orderDetail':
        $list_order = load_all_order();
        $list_orderdetail = load_all_orderdetail();
        $listAll_product = load_all_product();
        $list_account = load_all_account(); // Lấy dữ liệu từ CSDL
        $list_cart = load_all_cart();
        $list_cartDetail = load_all_cartDetail();
        $list_category = load_all_category();
        $list_order = load_all_order();
        $resultOrder = [];

        include 'order/oderdetail.php';
        break;
    case 'orderDelete':
        $dh_id = isset($_GET['dhid']) ? intval($_GET['dhid']) : 0;
        delete_order($dh_id);
        header("Location: ?act=admin&admin=orderList");
        include 'order/list.php';
        break;
    case 'orderUpdate':
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
