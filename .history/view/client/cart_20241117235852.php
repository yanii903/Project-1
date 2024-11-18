<?php
include "nav.php";
?>
<link rel="stylesheet" href="view/assets/cart.css">

<div class="layout-cart">

    <?php if (!isset($_SESSION['login'])) { ?>
        <div class="box-fmember">
            <h3>Fmember</h3>
            <div class="image-fmember">
                <img src="https://cdn2.cellphones.com.vn/insecure/rs:fill:0:80/q:90/plain/https://cellphones.com.vn/media/wysiwyg/chibi2.png" height="80" alt="cps-smember-icon">
            </div>
            <div>Vui lòng đăng nhập tài khoản Fmember để xem ưu đãi và thanh toán dễ dàng hơn</div>
            <div class="button-fmember">
                <div><a href="?client=register"><button class="dangki">Đăng ký</button></a></div>
                <div><a href="?client=login"><button class="dangnhap">Đăng nhập</button></a></div>
            </div>
        </div>
    <?php } else { ?>
        <?php
        // foreach ($list_account as $account): extract($account);
        //     if ($tk_user == $_SESSION['login']) {
        foreach ($list_cart as $cart) : extract($cart);
            if ($id_tk == $_GET['id']) {
        ?>
                <div>
                    <div class="cart-word-big">
                        <h2>Giỏ hàng của bạn</h2>
                        <div>Có sản phẩn trong giỏ hàng</div>
                    </div>
                    <div class="box-cart">
                        <div class="box-cart-big">
                            <div class="box-cart-big-child">
                                <div class="box-cart-big-img">
                                    <img src="https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-16-pro-max.png" alt="">

                                </div>
                                <div class="box-cart-big-word">

                                    <div>
                                        <h3>Iphone 15 ProMax 512GB</h3>
                                    </div>
                                    <div class="word-left-bottom">
                                        <div>299.000đ</div>
                                        <div class="button-quantity">
                                            <button class="plus">-</button>
                                            <button class="one">1</button>
                                            <button class="plus">+</button>
                                        </div>
                                    </div>
                                    <div class="multiple">
                                        <i class="fa-solid fa-xmark"></i>
                                    </div>
                                    <div class="price-right-bottom">
                                        299.000đ
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-cart-small">
                            <div class="box-cart-infomation">
                                <h2>Thông tin đơn hàng </h2>
                                <div class="horizontal-lines"></div>
                                <div class="total-amount">
                                    <div style="color:  rgb(156, 156, 156);">Tổng Tiền:</div>
                                    <div class="price-total-amount">40.000.000vnđ</div>
                                </div>
                                <div class="horizontal-lines"></div>
                                <div class="shipping-fee">
                                    <p>Phí vận chuyển sẽ được tính ở trang thanh toán.</p>
                                    <p>Bạn cũng có thể nhập mã giảm giá ở trang thanh toán </p>
                                </div>
                                <button class="pay">THANH TOÁN</button>
                                <div class="continue-shopping">
                                    <span><i class="fa-solid fa-arrow-left"></i></span>
                                    <span>Tiếp Tục Mua Hàng</span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <?php
                // }
                // endforeach 
                ?>
        <?php }
        endforeach ?>
    <?php } ?>
</div>