<?php
include "nav.php";
?>

<head>
    <link rel="stylesheet" href="view/assets/register.css">
</head>
<div class="container">
    <form action="">
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
                <label for="name">Họ và tên</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Nhập họ và tên"
                    required />
            </div>
            <div class="input-group">
                <label for="phone">Số điện thoại</label>
                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    placeholder="Nhập số điện thoại"
                    required />
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Nhập email(không bắt buộc)" />
                <p>Hóa đơn VAT khi mua hàng sẽ được gửi qua email này</p>
            </div>
            <div class="input-group">
                <label for="date">Ngày sinh</label>
                <input type="date" id="date" name="date" required />
            </div>
            <div class="input-group">
                <label for="password">Mật khẩu</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Nhập mật khẩu"
                    required />
                <p>
                    (*) Mật khẩu tối thiểu 6 ký tự, có ít nhất 1 chữ và 1 số. (VD:
                    12345a)
                </p>
            </div>
            <div class="input-group">
                <label for="confirm-password">Nhập lại mật khẩu</label>
                <input
                    type="confirm-password"
                    id="confirm-password"
                    name="confirm-password"
                    placeholder="Nhập lại mật khẩu"
                    required />
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
            <div class="register-submit">
                <button type="submit">Đăng ký</button>
            </div>

            <div class="login-link">
                <p>Bạn đã có tài khoản?</p>
                <a href="login.html"> Đăng nhập ngay</a>
            </div>
        </div>
    </form>
</div>