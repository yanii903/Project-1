<?php
include 'view/admin/nav.php';
?>
<div class="container-add">
    <h1>Thêm Sản Phẩm</h1>
    <form action="" method="POST">
        <label for="name">Nhập Tên:</label>
        <input type="text" name="name" id="name" value="<?= $_POST['name'] ?? "" ?>">
        <span class="error-message"><?= $thongBaoLoiTen ?></span>

        <label for="image">Nhập Ảnh</label>
        <input type="text" name="image" id="image" value="<?= $_POST['image'] ?? "" ?>">
        <span class="error-message"><?= $thongBaoLoiAnh ?></span>

        <label for="price">Nhập Giá:</label>
        <input type="number" name="price" id="price" value="<?= $_POST['price'] ?? "" ?>">
        <span class="error-message"><?= $thongBaoLoiGia ?></span>

        <label for="quantity">Nhập Số Lượng:</label>
        <input type="number" name="quantity" id="quantity" value="<?= $_POST['quantity'] ?? "" ?>">
        <span class="error-message"><?= $thongBaoLoiSoLuong ?></span>

        <label for="sp_pricedel">Nhập Giá:</label>
        <input type="number" name="sp_pricedel" id="sp_pricedel" value="<?= $_POST['sp_pricedel'] ?? "" ?>">
        <span class="error-message"><?= $thongBaoLoiSoLuong ?></span>

        <label for="describe">Nhập Mô Tả:</label>
        <input type="text" name="describe" id="describe" value="<?= $_POST['describe'] ?? "" ?>">
        <span class="error-message"><?= $thongBaoLoiMoTa ?></span>

        <label for="dm_id">Nhập Danh Mục:</label>
        <select name="dm_id" id="dm_id">
            <option value="<?= $_POST['dm_id'] ?? "" ?>">Chọn danh mục</option>
            <?php foreach ($list_category as $danhmuc): extract($danhmuc); ?>
                <option value="<?= $dm_id ?>"><?= $dm_name ?></option>
            <?php endforeach; ?>
        </select>
        <span class="error-message"><?= $thongBaoLoiDM ?></span>

        <button name="submit" type="submit">Thêm SP</button>
    </form>
    <div class="success-message"><?= $thongBao ?></div>
</div>