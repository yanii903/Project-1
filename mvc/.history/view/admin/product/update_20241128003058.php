<?php
include 'view/admin/nav.php';
?>
<div class="container-add">
    <h1>Sửa Sản Phẩm</h1>
    <form action="" method="POST">
        <input type="text" name="name" id="" value="<?= $sp_name ?>">
        <!-- if((!isset($sp_name))){ echo $thongBaoLoiTen;} else{ echo $sp_name; }  -->
        <input type="text" name="image" id="" value="<?= $sp_image ?>"> <?= $thongBaoLoiAnh ?>
        <input type="number" name="price" id="" value="<?= $sp_price ?>"> <?= $thongBaoLoiGia ?>
        <input type="text" name="quantity" id="" value="<?= $sp_quantity ?>"> <?= $thongBaoLoiSoLuong ?>
        <input type="text" name="describe" id="" value="<?= $sp_describe ?>"> <?= $thongBaoLoiMoTa ?>
        <input type="text" name="sp_pricedel" id="" value="<?= $sp_pricedel ?>"> <?= $thongBaoLoiMoTa ?>
        <select name="dm_id" required> <?= $thongBaoLoiDM  ?>

            <?php foreach ($list_category as $category) { ?>

                <option value="<?= $category['dm_id'] ?>" <?= ($category['dm_id'] == $id_dm) ? 'selected' : '' ?>>
                    <?= $category['dm_name'] ?>
                </option>
            <?php } ?>
        </select>

        <button name="submit" type="submit">Sửa Sản Phẩm</button>
    </form>
    <?= $thongBao ?>


</div>