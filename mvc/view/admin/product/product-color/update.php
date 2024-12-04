<?php
include 'view/admin/nav.php';
?>
<article>
    <div class="container-add">
        <h1>Sửa Màu Sản Phẩm</h1>
        <form action="" method="POST">
            <label for="name">Nhập Tên:</label>
            <input type="text" name="name" id="name" value="<?= $pc_name ?>">
            <span class="error-message"><?= $thongBaoLoiTen ?></span>

            <label for="id_sp">Nhập Sản Phẩm:</label>
            <select name="id_sp" id="id_sp">
                <?php foreach ($list_product as $product): ?>
                    <option value="<?= $product['sp_id'] ?>" <?= ($product['sp_id'] == $id_sp) ? 'selected' : '' ?>>
                        <?= $product['sp_name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <span class="error-message"><?= $thongBaoLoiSP ?></span>

            <button name="submit" type="submit" class="btn btn-primary">Sửa SP</button>
        </form>

        <div class="mt-3">
            <?= $thongBao ?>
        </div>
    </div>
</article>