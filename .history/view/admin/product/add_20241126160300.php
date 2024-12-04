<?php
include 'view/admin/nav.php';
?>
<style>
    .container-add {
        max-width: 600px;
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
    <h1>Thêm Sản Phẩm</h1>
    <form action="" method="POST">
        <label for="">Nhập Tên:</label>
        <input type="text" name="name" id=""> <span><?= $thongBaoLoiTen ?></span>
        <br>
        <label for="">Nhập Ảnh</label>
        <input type="text" name="image"> <span><?= $thongBaoLoiAnh ?></span>
        <br>
        <label for="">Nhập Giá:</label>
        <input type="number" name="price"><span> <?= $thongBaoLoiGia ?></span>
        <br>
        <label for="">Nhập Số Lượng</label>
        <input type="number" name="quantity"> <span><?= $thongBaoLoiSoLuong ?></span>
        <br>
        <label for="">Nhập Mô Tả:</label>
        <input type="text" name="describe"> <span><?= $thongBaoLoiMoTa ?></span>
        <br>
        <label for="">Nhập Mô Tả:</label>
        <input type="text" name="describe"> <span><?= $thongBaoLoiMoTa ?></span>
        <br>
        <label for="">Nhập Danh Mục</label>
        <select name="dm_id" id=""><span> <?= $thongBaoLoiDM ?></span>
            <option value="">Chọn danh mục</option>
            <?php foreach ($list_category as $danhmuc):  extract($danhmuc) ?>


                <option value="<?= $dm_id ?>"><?= $dm_name ?></option>
            <?php endforeach ?>

        </select>
        <button name="submit" type="submit">Thêm SP</button>
    </form>
    <?= $thongBao ?>
</div>