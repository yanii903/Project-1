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
        $productIds = []; // Mảng lưu tất cả ID sản phẩm
        $cartdetailIds = []; // Mảng lưu tất cả ID cartdetail
        $quantities = []; // Mảng lưu tất cả số lượng sản phẩm
        $totalQuantity = 0; // Tổng số lượng sản phẩm trong giỏ hàng

        foreach ($list_cart as $cart) :
            extract($cart);
            if ($id_tk == $_GET['iduser']) {
        ?>
                <div>
                    <div class="cart-word-big">
                        <h2>Giỏ hàng của <?= htmlspecialchars($id_tk) ?></h2>
                        <div>Có <?= htmlspecialchars($gh_quantity) ?> sản phẩm trong giỏ hàng</div>
                    </div>
                    <div class="box-cart">
                        <div class="box-cart-big">
                            <?php
                            $totalAmount = 0; // Tổng tiền toàn bộ giỏ hàng

                            foreach ($list_cartDetail as $cartDetail):
                                extract($cartDetail);
                                if ($gh_id == $id_gh) {
                                    foreach ($listAll_product as $product):
                                        extract($product);
                                        if ($sp_id == $id_sp) {
                                            $itemTotal = $sp_price * $cd_quantity; // Tổng tiền của sản phẩm
                                            $totalAmount += $itemTotal;
                                            $totalQuantity += $cd_quantity;
                                            // Lưu ID sản phẩm và số lượng vào mảng
                                            $productIds[] = $sp_id;
                                            $quantities[] = $cd_quantity;
                                            $cartdetailIds[] = $cd_id
                            ?>
                                            <div class="box-cart-big-child">
                                                <div class="box-cart-big-img">
                                                    <img src="<?= htmlspecialchars($sp_image) ?>" alt="">
                                                </div>
                                                <div class="box-cart-big-word">
                                                    <div>
                                                        <h3><?= htmlspecialchars($sp_name) ?></h3>
                                                    </div>
                                                    <div>
                                                        <h4>Dung lượng: <?=  ?></h4>
                                                    </div>
                                                    <div>
                                                        <h4>Màu: <?= $_GET['colorOption'] ?></h4>
                                                    </div>
                                                    <div class="word-left-bottom">
                                                        <div><?= printPrice($sp_price) ?></div>
                                                        <div class="button-quantity">
                                                            <?php if ($cd_quantity <= 0) { ?>
                                                                <a href=""><button class="plus">-</button></a>
                                                            <?php } else { ?>
                                                                <a href="?client=Cartdetailoss&idcd=<?= $cd_id ?>&idgh=<?= $gh_id ?>"><button class="plus">-</button></a>
                                                            <?php } ?>
                                                            <input class="one" value="<?= htmlspecialchars($cd_quantity) ?>"></input>
                                                            <a href="?client=Cartdetailadd&idcd=<?= $cd_id ?>&idgh=<?= $gh_id ?>"><button class="plus">+</button></a>
                                                        </div>
                                                    </div>
                                                    <div class="multiple">
                                                        <a style="color: black;" href="?client=cartdelete&id=<?= $cd_id ?>&idgh=<?= $gh_id  ?>">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </a>
                                                    </div>
                                                    <div class="price-right-bottom">
                                                        <?= printPrice($itemTotal) ?>
                                                    </div>
                                                </div>
                                            </div>
                            <?php }
                                    endforeach;
                                }
                            endforeach; ?>
                        </div>
                        <div class="box-cart-small">
                            <div class="box-cart-infomation">
                                <h2>Thông tin đơn hàng</h2>
                                <div class="horizontal-lines"></div>
                                <div class="total-amount">
                                    <div style="color: rgb(156, 156, 156);">Tổng Tiền:</div>
                                    <div class="price-total-amount"><?= printPrice($totalAmount) ?></div>
                                </div>
                                <br>
                                <div class="total-amount">
                                    <div style="color: rgb(156, 156, 156);">Tổng Số Lượng:</div>
                                    <div class="price-total-amount"><?= $totalQuantity ?></div>
                                </div>

                                <div class="horizontal-lines"></div>
                                <div class="shipping-fee">
                                    <p>Phí vận chuyển sẽ được tính ở trang thanh toán.</p>
                                    <p>Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
                                </div>
                                <!-- Nút thanh toán -->
                                <button class="pay">
                                    <a href="?client=pay&spid=<?= implode(',', $productIds) ?>&quantity=<?= implode(',', $quantities) ?>&iduser=<?= $id_tk ?>&totalamount=<?= $totalAmount ?>&totalquantity=<?= $totalQuantity ?>&cartdetailid=<?= implode(',', $cartdetailIds) ?>">THANH TOÁN</a>
                                </button>
                                <div class="continue-shopping">
                                    <span><i class="fa-solid fa-arrow-left"></i></span>
                                    <span>Tiếp Tục Mua Hàng</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        endforeach; ?>
    <?php } ?>
</div>