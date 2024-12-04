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
        foreach ($list_cart as $cart) : extract($cart);
            if ($id_tk == $_GET['iduser']) {
        ?>
                <div>
                    <div class="cart-word-big">
                        <h2>Giỏ hàng của <?= $id_tk ?></h2>
                        <div>Có <?=
                                $gh_quantity    ?> sản phẩn trong giỏ hàng</div>
                    </div>
                    <div class="box-cart">
                        <div class="box-cart-big">
                            <?php foreach ($list_cartDetail as $cartDetail): extract($cartDetail);
                                if ($gh_id == $id_gh) {
                                    foreach ($listAll_product as $product): extract($product);
                                        if ($sp_id == $id_sp) {
                            ?>
                                            <div class="box-cart-big-child">
                                                <div class="box-cart-big-img">
                                                    <img src="<?= $sp_image ?>" alt="">
                                                </div>
                                                <div class="box-cart-big-word">
                                                    <div>
                                                        <h3><?= $sp_name ?></h3>
                                                    </div>
                                                    <div class="word-left-bottom">
                                                        <div><?= printPrice($sp_price) ?></div>
                                                        <div class="button-quantity">
                                                            <?php if ($cd_quantity <= 0) { ?>
                                                                <a href=""><button class="plus">-</button></a>
                                                            <?php } else { ?>
                                                                <a href="?client=Cartdetailoss&idcd=<?= $cd_id ?>&idgh=<?= $gh_id ?>"><button class="plus">-</button></a>
                                                            <?php } ?>
                                                            <!-- <form action=""> -->
                                                            <input class="one" value="<?= $cd_quantity ?>"></input>
                                                            <!-- </form> -->
                                                            <a href="?client=Cartdetailadd&idcd=<?= $cd_id ?>&idgh=<?= $gh_id ?>"><button class="plus">+</button></a>
                                                        </div>
                                                        <!-- <script>
                                                            const handelClickAdd = () => {
                                                                let one = document.querySelector(".one");
                                                                let value = parseInt(one.value);
                                                                one.value = value + 1;
                                                            }
                                                            const handelClickMinus = () => {
                                                                let one = document.querySelector(".one");
                                                                let value = parseInt(one.value);
                                                                if (value <= 0) return;
                                                                one.value = value - 1;
                                                            }
                                                        </script> -->
                                                    </div>
                                                    <div class="multiple">
                                                        <a style="color: black;" href="?client=cartdelete&id=<?= $cd_id ?>&idgh=<?= $gh_id  ?>">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </a>
                                                    </div>
                                                    <div class="price-right-bottom">
                                                        <?= printPrice($cd_totalamount = $sp_price * $cd_quantity) ?>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php }
                                    endforeach ?>
                            <?php }
                            endforeach ?>
                        </div>
                        <div class="box-cart-small">
                            <div class="box-cart-infomation">
                                <h2>Thông tin đơn hàng </h2>
                                <div class="horizontal-lines"></div>
                                <div class="total-amount">
                                    <div style="color:  rgb(156, 156, 156);">Tổng Tiền:</div>
                                    <div class="price-total-amount"><?= $gh_totalamount = $cd_totalamount  ?>đ</div>
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