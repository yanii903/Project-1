<?php
include_once './query/san-pham.php';
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
                            header("Location: ./view/admin");
                            exit();
                        } else if ($role_id == 2) {
                            $_SESSION['login'] = $user;
                            header("Location: ./view/client/index.php");
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
        include 'register.php';
        break;
}
