<?php


include 'view/client/profile/profile.php';
?>

<article>
    <h2>Đơn hàng đã giao</h2>
    <div class="order-full">
        <?php foreach ($list_order as $order): extract($order);
            if ($_GET['iduser'] == $id_tk) {
                if ($dh_status == 'Đã nhận hàng') { ?>
                    <div class="order-item">
                        <?php foreach ($list_orderdetail as $orderdetail) : extract($orderdetail);
                            if ($id_dh == $dh_id) {
                                foreach ($listAll_product as $product): extract($product);
                                    if ($id_sp == $sp_id) {
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
                                        </div>
                                <?php }
                                endforeach ?>
                        <?php }
                        endforeach ?>
                        <div class="oder-status-comment">
                            <div>
                                <p class="product-status">Trạng thái: <span class="status-label">Đã nhận được hàng</span></p>
                            </div>
                            <div class="danhgia">
                                <form method="GET" action="">
                                    <input type="hidden" name="client" value="addComment">
                                    <input type="hidden" name="iduser" value="<?= $_GET['iduser'] ?>">
                                    <input type="hidden" name="idsp" value="<?= $sp_id ?>">
                                    <input type="text" name="comment" id="userInput" placeholder="Nhập đánh giá">
                                    <button type="submit">Đánh giá</button>
                                </form>
                            </div>
                        </div>
                        <p>Thành tiền: <?= printPrice($dh_totalamount) ?></p>
                    </div>
        <?php   }
            }
        endforeach ?>
    </div>
</article>

</div>