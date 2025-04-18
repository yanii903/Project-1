<?php

// if (!isset($_SESSION['login'])) {
//     header("Location: ?client=login");
//     exit();
// }

include 'view/client/profile/profile.php';
?>

<article>
    <h2>Đơn mua hàng</h2>
    <div class="order-full">
        <?php foreach ($list_order as $order): extract($order);
            if ($_GET['iduser'] == $id_tk) {
                foreach ($listAll_product as $product): extract($product);
                    if ($id_sp == $sp_id) {
                        if ($dh_status !== 'Đã nhận hàng') {
        ?>
                            <div class="order-item">
                                <div class="oder-info">
                                    <img src="<?= $sp_image ?>" alt="Ảnh sản phẩm" class="product-image">
                                    <div class="product-details">
                                        <h3 class="product-name"><?= $sp_name ?></h3>
                                        <p class="product-category">Phân loại: 256GB + Màu hồng</p>
                                        <p class="product-quantity">Số lượng: 2</p>
                                        <p class="product-price">Thành tiền: <?= printPrice($sp_price) ?>đ</p>
                                    </div>
                                </div>
                                <div class="oder-status-comment">
                                    <div>
                                        <p class="product-status">Trạng thái: <span class="status-label"><?= $dh_status ?></span></p>
                                    </div>
                                    <?php if ($dh_status == 'Giao Hàng Thành Công') { ?>
                                        <div class="final">
                                            <a href=""><button class="review-btn">Liên hệ</button></a>
                                            <a href="?client=payfinal&id<?= $id_dh ?>"><button class="review-btn">Xác Nhận</button></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                <?php }
                    }
                endforeach ?>
        <?php }
        endforeach ?>
    </div>
</article>

</div>