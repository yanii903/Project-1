<?php
include 'view/admin/nav.php';
?>
<article>
    <div class="container-add">
        <h1>Sửa Bộ Nhớ Sản Phẩm</h1>
        <form action="" method="POST">
            <label for="name">Nhập Tên:</label>
            <input type="text" name="name" id="name" value="<?= $pm_name ?>">
            <span class="error-message"><?= $thongBaoLoiTen ?></span>

          

            <button name="submit" type="submit" class="btn btn-primary">Sửa SP</button>
        </form>

        <div class="mt-3">
            <?= $thongBao ?>
        </div>
    </div>
</article>