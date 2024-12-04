<?php
include "nav.php";
?>

<head>
    <link rel="stylesheet" href="view/assets/register.css">
</head>
<div class="container1">
    <form action="" method="POST">
        <div class="register-title">
            <h1>Đăng ký với</h1>
        </div>
        <div class="register-social-media">
            <div class="icon-google">
                <a href="#">
                    <img
                        src="https://cdn3.iconfinder.com/data/icons/logos-brands-3/24/logo_brand_brands_logos_google-1024.png"
                        alt="" />
                    <p>Google</p>
                </a>
            </div>
            <div class="icon-facebook">
                <a href="#">
                    <img
                        src="https://cdn3.iconfinder.com/data/icons/2018-social-media-logotypes/1000/2018_social_media_popular_app_logo_facebook-512.png"
                        alt="" />
                    <p>Facebook</p>
                </a>
            </div>
        </div>
        <div class="register-separator">
            <p>Hoặc</p>
        </div>
        <div class="register-input">
            <div class="input-group">

                <label for="name">Tên Đăng Nhập*</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Nhập Tên Đăng Nhập"
                    value="<?php if (isset($name) && !empty($name)) echo $name; ?>" />
                <?php if (!empty($messName)): ?>
                    <i style="color: red;"><?php echo $messName; ?></i>
                <?php endif; ?>
            </div>
            <div class="input-group">

                <label for="phone">Địa Chỉ*</label>
                <input
                    type="tel"
                    id="phone"
                    name="address"
                    placeholder="Nhập Địa Chỉ"
                    value="<?php if (isset($address) && !empty($address)) echo $address; ?>" />
                <?php if (!empty($messAddress)): ?>
                    <i style="color: red;"><?php echo $messAddress; ?></i>
                <?php endif; ?>
            </div>

            <div class="input-group">

                <label for="email">Email*</label>
                <input
                    type="text"
                    id="email"
                    name="emailRegister"
                    placeholder="Nhập email"
                    value="<?php if (isset($emailRegister) && !empty($emailRegister)) echo $emailRegister; ?>" />
                <p>Hóa đơn VAT khi mua hàng sẽ được gửi qua email này</p>
                <?php if (!empty($messEmailRegister)): ?>
                    <i style="color: red;"><?php echo $messEmailRegister; ?></i>
                <?php endif; ?>
            </div>

            <div class="input-group">

                <label for="password">Mật khẩu*</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Nhập mật khẩu"
                    value="<?php if (isset($password) && !empty($password)) echo $password; ?>" />
                <p>
                    (*) Mật khẩu tối thiểu 6 ký tự
                </p>
                <?php if (!empty($messPassword)): ?>
                    <i style="color: red;"><?php echo $messPassword; ?></i>
                <?php endif; ?>
            </div>

            <div class="input-group">

                <label for="confirm-password">Nhập lại mật khẩu</label>
                <input
                    type="password"
                    id="confirm-password"
                    name="confirmPassword"
                    placeholder="Nhập lại mật khẩu"
                    value="<?php if (isset($confirmPassword) && !empty($confirmPassword)) echo $confirmPassword; ?>" />
                <?php if (!empty($messConfirmPassword)): ?>
                    <i style="color: red;"><?php echo $messConfirmPassword; ?></i>
                <?php endif; ?>
            </div>
            <div class="checkbox-row">
                <label>
                    <input type="checkbox" name="option3" />
                    Đăng ký nhận bản tin khuyến mãi từ FourSmart
                </label>
                <label>
                    <input type="checkbox" name="option4" />
                    Tôi đồng ý với các điều khoản bảo mật cá nhân
                </label>
            </div>
            <br>
            <?php if (!empty($mess)): ?>
                <p style="color: red;"><?php echo $mess; ?></p>
            <?php endif; ?>

            <div class="register-submit">
                <button name="btn-register" type="submit">Đăng ký</button>
            </div>

            <div class="login-link">
                <p>Bạn đã có tài khoản?</p>
                <a href="login.html"> Đăng nhập ngay</a>
            </div>
        </div>
    </form>
</div>