<?php
include "nav.php";
?>

<head>
    <link rel="stylesheet" href="view/assets/login.css">
</head>
<div class="container1">
    <form action="">
        <div class="login-title">
            <h1>Đăng nhập với</h1>
        </div>
        <div class="login-social-media">
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
        <div class="login-separator">
            <p>Hoặc</p>
        </div>
        <div class="login-input">
            <div class="input-group">
                <label for="phone">Số điện thoại</label>
                <input
                    type="tel"
                    id="phone"
                    name="user"
                    placeholder="Nhập số điện thoại"
                    required />
            </div>
            <div class="input-group">
                <label for="password">Mật khẩu</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Nhập mật khẩu"
                    required />
            </div>
            <a href="#" class="forgot-password">Quên mật khẩu?</a>
            <div class="login-submit">
                <button type="submit">Đăng nhập</button>
            </div>
            <div class="register-link">
                <p>Bạn chưa có tài khoản?</p>
                <a href="?client=register"> Đăng ký ngay</a>
            </div>
            <div class="preferential-policy">
                <a href="#">Xem chính sách ưu đãi Smember</a>
            </div>
        </div>
    </form>
</div>