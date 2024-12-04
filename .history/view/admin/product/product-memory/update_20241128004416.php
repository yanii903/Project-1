<?php
include 'view/admin/nav.php';
?>
<div class="container-add">
    <h1>Sửa Bộ Nhớ Sản Phẩm</h1>
    <form action="" method="POST">
        <label for="">Nhập Tên:</label>
        <input type="text" name="name" id="" value="<?= $pm_name ?>"> <span><?= $thongBaoLoiTen ?></span>
        <br>


        <label for="">Nhập Sản Phẩm</label>
        <select name="id_sp" id=""><span> <?= $thongBaoLoiSP ?></span>
            <?php foreach ($list_product as $product) { ?>


                <option value="<?= $product['sp_id'] ?>" <?= ($product['sp_id'] == $id_sp) ? 'selected' : '' ?>>
                    <?= $product['sp_name'] ?>
                </option>

            <?php } ?>
        </select>
        <button name="submit" type="submit">Sửa SP</button>
    </form>
    <?= $thongBao ?>
</div>