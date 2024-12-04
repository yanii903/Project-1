<?php


include 'view/client/profile/profile.php';
?>

<article>
    <h2>Đơn hàng đã giao</h2>
    <div class="order-full">
        <?php foreach ($list_order as $order): extract($order);
            if ($_GET['iduser'] == $id_tk) {
                foreach ($listAll_product as $product): extract($product);
                    if ($id_sp == $sp_id) {
                        if ($dh_status == 'Đã nhận hàng') {
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
                                    <p class="product-status">Trạng thái: <span class="status-label">Đã nhận hàng</span></p>
                                </div>
                                <div class="danhgia">
                                    <form action="" method="get"> -->
                                        <input type="text" name="" id="value">
                                        <a id="href" href="?client=addComment&iduser=<?= $_GET['iduser'] ?>&idsp<?= $sp_id ?>"><button>Đánh giá</button></a>
                                        <!-- </form>
                                    <input type="text" id="userInput" placeholder="Nhập đánh giá">
                                    <a href="" id="submitLink">
                                        <button type="button">Đánh giá</button>
                                    </a>
                                    <script>
                                        // Lấy các phần tử cần thiết
                                        const inputField = document.getElementById('userInput');
                                        const submitLink = document.getElementById('submitLink');

                                        // Lắng nghe sự kiện khi người dùng nhập vào ô input
                                        inputField.addEventListener('input', function() {
                                            // Lấy giá trị người dùng nhập
                                            const userInput = encodeURIComponent(this.value); // Mã hóa giá trị để đảm bảo an toàn trong URL

                                            // Cập nhật href của thẻ <a>
                                            submitLink.href = `?client=addComment&iduser=<?= $_GET['iduser'] ?>&idsp=<?= $sp_id ?>&comment=${userInput}`;
                                        });
                                    </script>

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