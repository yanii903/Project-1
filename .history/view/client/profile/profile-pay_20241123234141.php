<?php

// if (!isset($_SESSION['login'])) {
//     header("Location: ?client=login");
//     exit();
// }

include 'view/client/profile/profile.php';
?>

<article>
    <h2>Đơn mua hàng</h2>

    <div class="order-item">
        <?php foreach ($list_order as $order): extract($order);
            if ($_GET['iduser'] == $id_tk) {
                foreach ($listAll_product as $product): extract($product);
                    if ($id_sp == $sp_id) {

        ?>
                        <div class="oder-info">
                            <img src="https://cdn2.cellphones.com.vn/358x/media/catalog/product/h/_/h_ng_4.jpg" alt="Ảnh sản phẩm" class="product-image">
                            <div class="product-details">
                                <h3 class="product-name">Tên sản phẩm</h3>
                                <p class="product-category">Phân loại: 256GB + Màu hồng</p>
                                <p class="product-quantity">Số lượng: 2</p>
                                <p class="product-price">Thành tiền: 200.000đ</p>
                            </div>
                        </div>
                        <div class="oder-status-comment">
                            <p class="product-status">Trạng thái: <span class="status-label">Đang giao</span></p>
                            <button class="review-btn">Đánh giá</button>
                        </div>
                <?php }
                endforeach ?>
        <?php }
        endforeach ?>
    </div>


</article>

</div>