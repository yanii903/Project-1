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
                                    <form method="GET" action="">
                                        <!-- Ô input để nhập đánh giá -->

                                        <!-- Trường ẩn để gửi các tham số cần thiết -->
                                        <input type="hidden" name="client" value="addComment">
                                        <input type="hidden" name="iduser" value="<?= htmlspecialchars($_GET['iduser']) ?>">
                                        <input type="hidden" name="idsp" value="<?= $sp_id ?>">
                                        <input type="text" name="comment" id="userInput" placeholder="Nhập đánh giá">
                                        <!-- Nút submit -->
                                        <button type="submit">Đánh giá</button>
                                    </form>
                                    <!-- <input type="text" id="userInput" placeholder="Nhập đánh giá">
                                    <a href="" id="submitLink">
                                        <button type="button">Đánh giá</button>
                                    </a>
                                    <p id="error"></p>
                                    <script>
                                        // Lấy các phần tử cần thiết
                                        const inputField = document.getElementById('userInput');
                                        const submitLink = document.getElementById('submitLink');
                                        const error = document.getElementById('error');
                                        // Lắng nghe sự kiện khi người dùng nhập vào ô input
                                        inputField.addEventListener('input', function() {
                                            // Lấy giá trị người dùng nhập
                                            const userInput = encodeURIComponent(this.value); // Mã hóa giá trị để đảm bảo an toàn trong URL
                                            // Cập nhật href của thẻ <a>
                                            submitLink.href = `?client=addComment&iduser=<?= $_GET['iduser'] ?>&idsp=<?= $sp_id ?>&comment=${userInput}`;
                                        });
                                    </script> -->

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