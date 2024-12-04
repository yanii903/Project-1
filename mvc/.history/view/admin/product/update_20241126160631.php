<?php
include 'view/admin/nav.php';
?>
<style>
    .container-add {
        max-width: 400px;
        margin: auto;
        padding: 20px;
    }

    .container-add h1 {
        text-align: center;
        font-size: 20px;
    }

    .container-add label {
        font-size: 14px;
        margin-top: 10px;
    }

    .container-add input,
    .container-add select,
    .container-add button {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid;
        border-radius: 5px;
    }

    .container-add button {
        background-color: black;
        color: white;
        border: none;
        cursor: pointer;
    }

    span {
        color: red;
    }
</style>
<div class="container-add">
    <h1>Sửa Sản Phẩm</h1>
    <form action="" method="POST">
        <input type="text" name="name" id="" value="<?= $sp_name ?>">
        <!-- if((!isset($sp_name))){ echo $thongBaoLoiTen;} else{ echo $sp_name; }  -->
        <input type="text" name="image" id="" value="<?= $sp_image ?>"> <?= $thongBaoLoiAnh ?>
        <input type="number" name="price" id="" value="<?= $sp_price ?>"> <?= $thongBaoLoiGia ?>
        <input type="text" name="quantity" id="" value="<?= $sp_quantity ?>"> <?= $thongBaoLoiSoLuong ?>
        <input type="text" name="describe" id="" value="<?= $sp_describe ?>"> <?= $thongBaoLoiMoTa ?>
        <input type="text" name="sp_pricedel" id="" value="<?= $sp_describe ?>"> <?= $thongBaoLoiMoTa ?>
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