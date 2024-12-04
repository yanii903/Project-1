<?php
include 'view/admin/nav.php';
?>
<div class="container-add">
    <h1>Thêm Sản Phẩm</h1>
    <form action="" method="POST">
        <label for="">Nhập Tên:</label>
        <input type="text" name="name" id="" value="<?= $_POST['name'] ?? "" ?>"> <span><?= $thongBaoLoiTen ?></span>
        <br>
        <label for="">Nhập Ảnh</label>
        <input type="text" name="image" value="<?= $_POST['image'] ?? "" ?>"> <span><?= $thongBaoLoiAnh ?></span>
        <br>
        <label for="">Nhập Giá:</label>
        <input type="number" name="price" value="<?= $_POST['price'] ?? "" ?>"><span> <?= $thongBaoLoiGia ?></span>
        <br>
        <label for="">Nhập Số Lượng</label>
        <input type="number" name="quantity" value="<?= $_POST['quantity'] ?? "" ?>"> <span><?= $thongBaoLoiSoLuong ?></span>
        <br>
        <label for="">Nhập Giá</label>
        <input type="number" name="sp_pricedel" value="<?= $_POST['sp_pricedel'] ?? "" ?>"> <span><?= $thongBaoLoiSoLuong ?></span>
        <br>
        <label for="">Nhập Mô Tả:</label>
        <input type="text" name="describe" value="<?= $_POST['describe'] ?? "" ?>"> <span><?= $thongBaoLoiMoTa ?></span>
        <br>
        <label for="">Nhập Danh Mục</label>
        <select name="dm_id" id=""><span> <?= $thongBaoLoiDM ?></span>
            <option value="<?= $_POST['dm_id'] ?? "" ?>">Chọn danh mục</option>
            <?php foreach ($list_category as $danhmuc):  extract($danhmuc) ?>


                <option value="<?= $dm_id ?>"><?= $dm_name ?></option>
            <?php endforeach ?>

        </select>
        <button name="submit" type="submit">Thêm SP</button>
    </form>
    <?= $thongBao ?>


</div>