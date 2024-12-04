<?php
session_start();
include_once './query/san-pham.php';
include_once './query/gio-hang.php';
include_once './query/danh-muc.php';
include_once './query/tai-khoan.php';
include_once './query/pdo.php';
$client = $_GET['client'] ?? 'home';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
if (isset($_GET["iduser"])) {
    $id = $_GET["iduser"];
}
switch ($client) {
    case 'home':
        $list_account = load_all_account(); // Lấy dữ liệu từ CSDL
        $list_category = load_all_category();
        $listAll_product = load_all_product();
        $list_cart = load_all_cart();


        include 'home.php';
        break;
    case 'login':
        $list_account = load_all_account(); // Lấy dữ liệu từ CSDL
        $list_cart = load_all_cart();
        $list_category = load_all_category();
        if (isset($_POST['btn-login'], $_POST['user'], $_POST['password'])) {
            $user = trim($_POST['user']);
            $password = trim($_POST['password']);
            $messtk = "";
            $messmk = "";
            $mess = "";
            // Kiểm tra tên đăng nhập
            if ($user == "") {
                $messtk = "Tài Khoản Không Được Để Trống";
            }
            // Kiểm tra mật khẩu
            if ($password == "") {
                $messmk = "Mật Khẩu Không Được Để Trống";
            } else if (strlen($password) < 6) {
                $messmk = "Mật Khẩu Tối Thiểu 6 Ký Tự";
            }
            // Nếu không có lỗi trong tên đăng nhập và mật khẩu
            if (empty($messtk) && empty($messmk)) {
                $account = load_all_account(); // Lấy dữ liệu từ CSDL
                $is_valid_login = false; // Đặt ban đầu là false

                foreach ($account as $value) {
                    extract($value); // Lấy các biến từ mảng $value, ví dụ $tk_user, $tk_password

                    // Kiểm tra tài khoản và mật khẩu
                    if ($user == $tk_user && $password == $tk_password) {
                        $is_valid_login = true;

                        // Phân quyền và chuyển hướng
                        if ($id_role == 1) {
                            $_SESSION['login'] = $user;
                            header("Location: ?act=admin");
                            exit();
                        } else if ($id_role == 2) {
                            $_SESSION['login'] = $user;
                            header("Location: ?act=client&iduser=$tk_id");

                            exit();
                        }
                    } else {
                        $mess = "Tài Khoản Hoặc Mật Khẩu Sai!";
                    }
                }
            }
        }
        include 'login/login.php';
        break;
    case 'detail':
        $list_category = load_all_category();
        $listAll_product = load_all_product();
        $list_account = load_all_account(); // Lấy dữ liệu từ CSDL
        $list_cart = load_all_cart();
        include 'productDetail.php';
        break;
    case 'register':
        $list_category = load_all_category();
        $list_account = load_all_account(); // Lấy dữ liệu từ CSDL
        $list_cart = load_all_cart();
        if (isset($_POST['btn-register'], $_POST['name'], $_POST['address'], $_POST['emailRegister'], $_POST['password'], $_POST['confirmPassword'])) {
            $name = trim($_POST['name']);
            $address = trim($_POST['address']);
            $emailRegister = trim($_POST['emailRegister']);
            $password = trim($_POST['password']);
            $confirmPassword = trim($_POST['confirmPassword']);
            $id_role = 2;

            // Khởi tạo thông báo lỗi cho từng trường
            $messName = $messAddress = $messEmailRegister = $messPassword = $messConfirmPassword = "";
            $check_valid = true;

            // Kiểm tra tên đăng nhập
            if ($name == "") {
                $check_valid = false;
                $messName = "Tên đăng nhập không được để trống!";
            }

            // Kiểm tra địa chỉ
            if ($address == "") {
                $check_valid = false;
                $messAddress = "Địa chỉ không được để trống!";
            }

            // Kiểm tra email
            if ($emailRegister == "") {
                $check_valid = false;
                $messEmailRegister = "Email không được để trống!";
            } elseif (!filter_var($emailRegister, FILTER_VALIDATE_EMAIL)) {
                $check_valid = false;
                $messEmailRegister = "Địa chỉ email không hợp lệ!";
            }

            // Kiểm tra mật khẩu
            if ($password == "") {
                $check_valid = false;
                $messPassword = "Mật khẩu không được để trống!";
            } elseif (strlen($password) < 6) {
                $check_valid = false;
                $messPassword = "Mật khẩu tối thiểu 6 ký tự!";
            }

            // Kiểm tra xác nhận mật khẩu
            if ($confirmPassword == "") {
                $check_valid = false;
                $messConfirmPassword = "Vui lòng xác nhận mật khẩu!";
            } elseif ($password !== $confirmPassword) {
                $check_valid = false;
                $messConfirmPassword = "Mật khẩu không khớp!";
            }

            // Kiểm tra tài khoản và email đã tồn tại
            if ($check_valid) {
                $account = load_all_account(); // Lấy dữ liệu từ cơ sở dữ liệu
                foreach ($account as $value) {
                    extract($value); // Tạo các biến $tk_user và $tk_email từ mảng $value

                    if ($name == $tk_user) { //kiểm tra dữ liệu đã tồn tại chưa
                        $check_valid = false;
                        $mess = "Tên đăng nhập đã tồn tại!";
                        break;
                    } elseif ($emailRegister == $tk_email) {
                        $check_valid = false;
                        $mess = "Email đã tồn tại!";
                        break;
                    }
                }
            }
            // Nếu không có lỗi, thực hiện đăng ký
            if ($check_valid) {
                insert_account($name, $password, $emailRegister, $address, $id_role);
                $mess = "Đăng Ký Thành Công!";
            }
        }
        include 'login/register.php';
        break;
    case 'cart':
        $listAll_product = load_all_product();
        $list_account = load_all_account(); // Lấy dữ liệu từ CSDL
        $list_cart = load_all_cart();
        $list_cartDetail = load_all_cartDetail();
        $list_category = load_all_category();
        include 'cart.php';
        break;
    case 'cartdetail':
        $idsp = $_GET['id'];
        $idgh = $_GET['idgh'];
        insert_cartDetail($idgh, $idsp);
        header('location: ?client=cart')
        break;
    case 'pay':
        $list_category = load_all_category();
        $list_account = load_all_account(); // Lấy dữ liệu từ CSDL
        $list_cart = load_all_cart();
        include 'pay.php';
        break;
}
