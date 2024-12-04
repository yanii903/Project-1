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
            if ($_GET['iduser'] == $id_tk) { ?>

                <div class="order-item">
                    <?php foreach ($list_orderdetail as $orderdetail) : extract($orderdetail);
                        if ($id_dh == $dh_id) {
                            foreach ($listAll_product as $product): extract($product);
                                if ($id_sp == $sp_id) {
                                    if ($dh_status !== 'Đã nhận hàng') {
                    ?>
                                        <div class="order-box">
                                            <div class="oder-info">
                                                <img src="<?= $sp_image ?>" alt="Ảnh sản phẩm" class="product-image">
                                                <div class="product-details">
                                                    <h3 class="product-name"><?= $sp_name ?></h3>
                                                    <p class="product-category">Phân loại: 256GB + Màu hồng</p>
                                                    <p class="product-quantity">Số lượng: <?= $orderdetail['ct_quantity'] ?></p>

                                                </div>
                                            </div>
                                            <div class="oder-status-comment">
                                                <div>
                                                    <p class="product-status">Trạng thái: <span class="status-label"><?= $dh_status ?></span></p>
                                                </div>
                                                <?php if ($dh_status == 'Giao Hàng Thành Công') { ?>
                                                    <div class="final">
                                                        <a href=""><button class="review-btn">Liên hệ</button></a>
                                                        <a href="?client=finaldh&id=<?= $dh_id ?>&value=Đã nhận hàng&idtk=<?= $id_tk ?>"><button class="review-btn">Xác Nhận</button></a>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <p>Thành tiền: <?= $dh_totalamount ?></p>
                                        </div>

                            <?php }
                                }
                            endforeach ?>
                    <?php }
                    endforeach ?>
                </div>
        <?php }
        endforeach ?>
    </div>
</article>

</div>