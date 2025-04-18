<?php
session_start();
include_once './query/san-pham.php';
include_once './query/tai-khoan.php';
include_once './query/pdo.php';
$client = $_GET['client'] ?? 'home';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}


switch ($client) {
    case 'home':
        $listAll_product = load_all_product();
        include 'home.php';
        break;
    case 'login':
        if (isset($_POST['btn-login'], $_POST['user'], $_POST['password'])) {
            $user = trim($_POST['user']);
            $password = trim($_POST['password']);
            $mess = "";

            if ($user == "" || $password == "") {
                $mess = "Tài Khoản Hoặc Mật Khẩu Không Được Để Trống";
            } else if (strlen($password) < 6) {
                $mess = "Mật Khẩu Tối Thiểu 6 Ký Tự";
            } else {
                // Tải danh sách tài khoản từ cơ sở dữ liệu
                $account = load_all_account(); //lấy dữ liệu từ csdl
                $is_valid_login = true; //boolean

                foreach ($account as $value) {
                    extract($value); // Lấy các biến từ mảng $value (ví dụ: $tk_user, $tk_password)

                    // Kiểm tra tài khoản và mật khẩu
                    if ($user == $tk_user && $password == $tk_password) {
                        $is_valid_login = true;

                        // Phân quyền và chuyển hướng
                        if ($role_id == 1) {
                            $_SESSION['login'] = $user;
                            header("Location: ?act=admin");
                            exit();
                        } else if ($role_id == 2) {
                            $_SESSION['login'] = $user;
                            header("Location: ?act=client");
                            exit();
                        }
                    } else {
                        $mess = "Tài Khoản Hoặc Mật Khẩu Sai!"; //Nếu không có tài khoản nào khớp, đặt thông báo lỗi
                    }
                }
                // hoặc dùng cách này để in ra lỗi
                // if (!$is_valid_login) {
                //     $mess = "Tài Khoản Hoặc Mật Khẩu Sai!";
                // }
            }
        }

        include 'login.php';
        break;
    case 'detail':
        include 'productDetail.php';
        break;
    case 'register':
        if (isset($_POST['btn-register'], $_POST['name'], $_POST['address'], $_POST['emailRegister'], $_POST['password'], $_POST['confirmPassword'])) {
            $name = trim($_POST['name']);
            $address = trim($_POST['address']);
            $emailRegister = trim($_POST['emailRegister']);
            $password = trim($_POST['password']);
            $confirmPassword = trim($_POST['confirmPassword']);
            $role_id = 2;
            $mess = "";

            $check_valid = true;

            if ($name == "" || $address == "" || $emailRegister == "" || $password == "" || $confirmPassword == "") {
                $check_valid = false;
                $mess = "Dữ Liệu Không Được Để Trống!";
            } elseif ($password !== $confirmPassword) {
                $check_valid = false;
                $mess = "Mật Khẩu Không Khớp!";
            } elseif (strlen($password) < 6) {
                $check_valid = false;
                $mess = "Mật Khẩu Tối Thiểu 6 Ký Tự!";
            }

            // Kiểm tra tài khoản đã tồn tại trong cơ sở dữ liệu chưa
            if ($check_valid) {
                $account = load_all_account(); // Lấy dữ liệu từ cơ sở dữ liệu
                foreach ($account as $value) {
                    extract($value); // Lấy các biến từ mảng $value (ví dụ: $tk_user, $tk_password)

                    if ($name == $tk_user) {
                        $check_valid = false;
                        $mess = "Tài Khoản Đã Tồn Tại!";
                        break; // Ngừng vòng lặp nếu tìm thấy tài khoản đã tồn tại
                    } else if ($emailRegister == $tk_email) {
                        $check_valid = false;
                        $mess = "Email Đã Tồn Tại!";
                    }
                }
            }
            //có thể ghép 2 đoạn if này vào đoạn if else phía trên
            // Nếu dữ liệu hợp lệ và tài khoản chưa tồn tại, tiến hành đăng ký
            if ($check_valid) {
                insert_account($name, $password, $emailRegister, $address, $role_id);
                // $mess = "Đăng Ký Thành Công!";
                header("Location: ?client=login");
            }
        }
        include 'register.php';
        break;
}
