<?php
include 'view/admin/nav.php';
?>
<div class="container-add">
    <h1>Thêm Bộ Nhớ Sản Phẩm</h1>
    <form action="" method="POST">
        <label for="">Nhập Tên:</label>
        <input type="text" name="name" id=""> <span><?= $thongBaoLoiTen ?></span>
        <br>



        <label for="">Nhập Sản Phẩm</label>
        <select name="id_sp" id=""><span> <?= $thongBaoLoiSP ?></span>
            <option value="">Chọn sản phẩm</option>
            <?php foreach ($list_product as $product):  extract($product) ?>


                <option value="<?= $sp_id ?>"><?= $sp_name ?></option>
            <?php endforeach ?>

        </select>
        <button name="submit" type="submit">Thêm SP</button>
    </form>
    <?= $thongBao ?>
</div>