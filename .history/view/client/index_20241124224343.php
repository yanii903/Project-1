<?php
session_start();
include_once './query/san-pham.php';
include_once './query/gio-hang.php';
include_once './query/danh-muc.php';
include_once './query/tai-khoan.php';
include_once './query/don-hang.php';
include_once './query/binh-luan.php';
include_once './query/pdo.php';
$client = $_GET['client'] ?? 'home';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
if (isset($_GET["iduser"])) {
    $id = $_GET["iduser"];
}

// Kiểm tra xem session có tồn tại hay không

switch ($client) {
    case 'home':
        if (isset($_SESSION['login'])) {
            // Nếu session tồn tại nhưng URL không có 'iduser'
            if (!isset($_GET['iduser'])) {
                // Chuyển hướng đến trang đăng xuất hoặc trang xử lý lỗi
                header("Location: ?act=logout");
                exit();
            }
        }
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
                            $_SESSION['user_id'] = $tk_id; //lưu id người dùng
                            header("Location: ?act=admin");
                            exit();
                        } else if ($id_role == 2) {
                            $_SESSION['login'] = $user;
                            $_SESSION['user_id'] = $tk_id; //lưu id người dùng
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
        $list_cartDetail = load_all_cartDetail();
        $list_comment = load_all_comment();
        $list_category = load_all_category();
        $listAll_product = load_all_product();
        $list_account = load_all_account(); // Lấy dữ liệu từ CSDL
        $list_cart = load_all_cart();
        $list_product_color = load_all_product_color();
        $list_product_memory = load_all_product_memory();
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
        $list_cart = load_all_cart();
        $idsp = $_GET['id'];
        $idgh = $_GET['idgh'];
        insert_cartDetail($idgh, $idsp);
        // addOneCart($idgh);
        $idtk = 0;
        foreach ($list_cart as $cart) {
            extract($cart);
            if ($idgh == $gh_id) {
                $idtk = $id_tk;
                break;
            }
        }
        header("Location: ?client=cart&iduser=$idtk");
        break;
    case 'Cartdetailadd':
        $idcd = $_GET['idcd'];
        $idgh = $_GET['idgh'];
        addOneCartdetail($idcd);
        $list_cart = load_all_cart();
        // addOneCart($idgh);
        $idtk = 0;
        foreach ($list_cart as $cart) {
            extract($cart);
            if ($idgh == $gh_id) {
                $idtk = $id_tk;
                break;
            }
        }
        header("Location: ?client=cart&iduser=$idtk");
        break;
    case 'Cartdetailoss':
        $idcd = $_GET['idcd'];
        $idgh = $_GET['idgh'];
        lossOneCartdetail($idcd);
        $list_cart = load_all_cart();
        // addOneCart($idgh);
        $idtk = 0;
        foreach ($list_cart as $cart) {
            extract($cart);
            if ($idgh == $gh_id) {
                $idtk = $id_tk;
                break;
            }
        }
        header("Location: ?client=cart&iduser=$idtk");
        break;
    case 'cartdelete':
        $list_cart = load_all_cart();
        $id = $_GET['id'];
        // $idsp = $_GET['id'];
        $idgh = $_GET['idgh'];
        delete_cartdetail($id);
        $idtk = 0;
        foreach ($list_cart as $cart) {
            extract($cart);
            if ($idgh == $gh_id) {
                $idtk = $id_tk;
                break;
            }
        }
        header("Location: ?client=cart&iduser=$idtk");
        break;
    case 'pay':
        // Load danh sách các danh mục và tài khoản (nếu cần thiết)
        $list_category = load_all_category();
        $list_account = load_all_account();
        $list_cart = load_all_cart(); // Lấy dữ liệu giỏ hàng của người dùng

        $sp_id = isset($_GET['spid']) ? intval($_GET['spid']) : 0;
        $load_one_product = load_one_product($sp_id);

        if ($load_one_product) {
            extract($load_one_product); // Giải nén mảng để lấy thông tin sản phẩm
            $price = $sp_price; // Giá sản phẩm

            // Lấy số lượng từ form (nếu có)
            // $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

            // Tính tổng tiền
            $dh_totalamount = $price;
        } else {
            $mess = "Sản phẩm không tồn tại!";
            $dh_totalamount = 0; // Nếu không có sản phẩm, tổng tiền là 0
        }

        $mess = "";
        $messNamePay = $messEmailPay = $messPhonePay = $messAddressPay = $messCountryPay = "";
        $messCityPay = $messDistrictPay = $messCommunePay = "";

        if (isset($_POST['btnPay'])) {
            // Lấy dữ liệu từ form
            $namePay = trim($_POST['namePay']);
            $emailPay = trim($_POST['emailPay']);
            $phonePay = trim($_POST['phonePay']);
            $addressPay = trim($_POST['addressPay']);
            $countryPay = trim($_POST['countryPay']);
            $cityPay = trim($_POST['cityPay']);
            $districtPay = trim($_POST['districtPay']);
            $communePay = trim($_POST['communePay']);
            $messagePay = trim($_POST['messagePay']);

            // Biến kiểm tra tính hợp lệ
            $check_valid_order = true;

            // Kiểm tra từng trường dữ liệu
            if (empty($namePay)) {
                $messNamePay = "Tên không được trống!";
                $check_valid_order = false;
            }

            if (empty($emailPay)) {
                $messEmailPay = "Email không được để trống!";
                $check_valid_order = false;
            } elseif (!filter_var($emailPay, FILTER_VALIDATE_EMAIL)) {
                $messEmailPay = "Địa chỉ email không hợp lệ!";
                $check_valid_order = false;
            }

            if (empty($phonePay)) {
                $messPhonePay = "SĐT trống!";
                $check_valid_order = false;
            } elseif (!preg_match('/^[0-9]{10,11}$/', $phonePay)) {
                $messPhonePay = "SĐT không hợp lệ!";
                $check_valid_order = false;
            }

            if (empty($addressPay)) {
                $messAddressPay = "Địa chỉ không được trống!";
                $check_valid_order = false;
            }

            if (empty($countryPay)) {
                $messCountryPay = "Quốc gia không được trống!";
                $check_valid_order = false;
            }

            if (empty($cityPay)) {
                $messCityPay = "Thành phố không được trống!";
                $check_valid_order = false;
            }

            if (empty($districtPay)) {
                $messDistrictPay = "Huyện không được trống!";
                $check_valid_order = false;
            }

            if (empty($communePay)) {
                $messCommunePay = "Xã / Phường không được trống!";
                $check_valid_order = false;
            }

            // Nếu dữ liệu hợp lệ, tiến hành thêm đơn hàng
            if ($check_valid_order) {
                $dh_status = "chờ Xác Nhận"; // Trạng thái đơn hàng ban đầu
                $id_tk = $_GET['iduser'] ?? null; // ID tài khoản từ phiên đăng nhập
                insert_order($namePay, $emailPay, $phonePay, $addressPay, $countryPay, $cityPay, $districtPay, $communePay, $messagePay, $dh_status, $dh_totalamount, $id_tk, $sp_id);
                $mess = "Mua hàng thành công!";
                // header("Refresh: 1.5; url='?act=client'");
            }
        }

        include 'pay.php'; // Gửi thông báo lỗi hoặc thành công về form
        break;
    case 'profile':
        $list_account = load_all_account(); // Lấy dữ liệu từ CSDL
        include 'profile/profile.php';
        break;
    case 'detailProfile':
        $list_category = load_all_category();
        $listAll_product = load_all_product();
        $list_account = load_all_account(); // Lấy dữ liệu từ CSDL        
        include 'profile/profile-detail.php';
        break;
    case 'payProfile':
        $listAll_product = load_all_product();
        $list_account = load_all_account(); // Lấy dữ liệu từ CSDL
        $list_cart = load_all_cart();
        $list_cartDetail = load_all_cartDetail();
        $list_category = load_all_category();
        $list_order = load_all_order();
        include 'profile/profile-pay.php';
        break;
    case 'payfinal':
        $listAll_product = load_all_product();
        $list_account = load_all_account(); // Lấy dữ liệu từ CSDL
        $list_cart = load_all_cart();
        $list_cartDetail = load_all_cartDetail();
        $list_category = load_all_category();
        $list_order = load_all_order();
        include 'profile/profile-payfinal.php';
        break;
    case 'finaldh':
        $idtk = $_GET['idtk'];
        $iddh = $_GET['id'];
        $value = $_GET['value'];
        update_order($iddh, $value);
        // header("Location: ?client=cart&iduser=$idtk");

        header("location: ?client=payfinal&iduser=<?= $idtk ?>");
        break;
}
