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
        $option = $_GET['option'];
        $colorOption  = $_GET['colorOption'];
        // echo $option;
        insert_cartDetail($idgh, $idsp, $option, $colorOption);
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
        // Lấy dữ liệu từ URL
        $listAll_product = load_all_product();
        $spids = isset($_GET['spid']) ? explode(',', $_GET['spid']) : []; // Tách ID sản phẩm thành mảng
        $id_cd = isset($_GET['cartdetailid']) ? explode(',', $_GET['cartdetailid']) : []; // Tách ID sản phẩm thành mảng
        $id_tk = isset($_GET['iduser']) ? intval($_GET['iduser']) : null; // ID tài khoản người dùng
        $dh_totalamount = isset($_GET['totalamount']) ? floatval($_GET['totalamount']) : 0; // Tổng tiền
        // Load danh mục và tài khoản
        $list_category = load_all_category(); // Load danh mục
        $list_cartDetail = load_all_cartDetail(); // Load danh mục
        $list_account = load_all_account(); // Load tài khoản
        $list_products = []; // Mảng lưu sản phẩm
        $totalAmount = 0; // Tổng số tiền đơn hàng
        foreach ($spids as $index => $spid) {
            $product = load_one_product(intval($spid)); // Hàm truy vấn sản phẩm theo ID

            $quantities = isset($_SESSION['quantity']) ? explode(',', $_GET['quantity']) : [];
            $quantity = isset($quantities[$index]) ? $quantities[$index] : 0; // Số lượng của sản phẩm

            if ($product) {
                $product['quantity'] = $quantity; // Thêm thông tin số lượng vào sản phẩm
                $list_products[] = $product; // Thêm sản phẩm vào danh sách
                $totalAmount += $product['sp_price'] * $quantity; // Cộng dồn tổng tiền (giá * số lượng)
            }
        }
        $mess = "";
        $messNamePay = $messEmailPay = $messPhonePay = $messAddressPay = $messCountryPay = "";
        $messCityPay = $messDistrictPay = $messCommunePay = "";

        if (isset($_POST['btnPay'])) {
            // Lấy dữ liệu từ form thanh toán
            $namePay = trim($_POST['namePay']);
            $emailPay = trim($_POST['emailPay']);
            $phonePay = trim($_POST['phonePay']);
            $addressPay = trim($_POST['addressPay']);
            $countryPay = trim($_POST['countryPay']);
            $cityPay = trim($_POST['cityPay']);
            $districtPay = trim($_POST['districtPay']);
            $communePay = trim($_POST['communePay']);
            $messagePay = trim($_POST['messagePay']);
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
                $messPhonePay = "SĐT không được để trống!";
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
                $messDistrictPay = "Quận / Huyện không được trống!";
                $check_valid_order = false;
            }
            if (empty($communePay)) {
                $messCommunePay = "Xã / Phường không được trống!";
                $check_valid_order = false;
            }


            // Nếu hợp lệ, thêm thông tin đơn hàng
            if ($check_valid_order) {
                // Trạng thái đơn hàng (chờ xác nhận)
                $dh_status = "chờ xác nhận";
                $sp_quantity = $_GET['totalquantity'];
                $dh_ma = 'FS_' . mt_rand(100000, 999999);
                // Lặp qua từng sản phẩm trong giỏ hàng

                // Gọi hàm insert_order để lưu đơn hàng vào cơ sở dữ liệu
                $id_dh = insert_order(
                    $namePay,
                    $emailPay,
                    $phonePay,
                    $addressPay,
                    $countryPay,
                    $cityPay,
                    $districtPay,
                    $communePay,
                    $messagePay,
                    $dh_status,
                    $dh_totalamount,
                    $id_tk,
                    $sp_quantity,
                    $dh_ma
                );
                foreach ($list_products as $product) {
                    // Lấy ID sản phẩm từ URL
                    foreach($list_cartDetail as $item) : extract($item);
                    if($product['sp_id'] == $id_sp){

                    // $sp_id = $product['sp_id']; // ID sản phẩm trong mảng $product
                    insert_orderdetail(
                        $id_dh,
                        $product['sp_id'],
                        $product['quantity'],
                    );
                    }
                    endforeach

                }
                // Thông báo đơn hàng đã được đặt thành công
                header("location: ?client=payProfile&iduser=$id_tk");
            }
            if (isset($_GET['cartdetailid'])) {
                // Lấy giá trị từ tham số cartdetailid
                $cartDetailIdString = $_GET['cartdetailid'];

                // Chuyển chuỗi thành mảng sử dụng explode
                $cartDetailIds = explode(',', $cartDetailIdString);
                foreach ($cartDetailIds as $value) {
                    delete_cartdetail($value);
                }
            }
            // delete_cartdetail()
        }
        // Hiển thị giao diện form thanh toán
        include 'pay.php';
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
        $list_orderdetail = load_all_orderdetail();
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
        $list_orderdetail = load_all_orderdetail();
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

        header("location: ?client=payfinal&iduser=$idtk");
        break;
    case 'addComment':
        $thongBao = '';
        $id_tk = $_GET['iduser'];
        $id_sp = $_GET['idsp'];
        $bl_content = $_GET['comment'];
        if ($_GET['comment'] == '') {
            header("location: ?client=payfinal&iduser=$id_tk");
            $thongBao = 'Vui lòng nhập đánh giá !';
            // echo `<script>alert('Vui lòng điền đánh giá!')</script>`;
        } else {
            insert_comment($bl_content, $id_tk, $id_sp);
            header("location: ?client=detail&iduser=$id_tk&id=$id_sp");
        }
        break;
    case 'categoryShow':
        $list_account = load_all_account(); // Lấy dữ liệu từ CSDL
        $list_category = load_all_category();
        $listAll_product = load_all_product();
        $list_cart = load_all_cart();

        include 'category.php';
        break;
    case 'search':
        $list_category = load_all_category();

        $list_account = load_all_account(); // Lấy dữ liệu từ CSDL
        $productTM = [];
        $listAll_product = load_all_product();
        foreach ($listAll_product as $name) {
            extract($name);
            if (stripos(strtolower($sp_name), strtolower($_GET['search'])) !== false) {
                $productTM[] = $name;
            }
        }
        include 'homeSearch.php';
        break;
}
