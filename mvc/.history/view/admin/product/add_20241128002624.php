<?php
include 'view/admin/nav.php';
?>
<article>
    <h1>Thêm Sản Phẩm</h1>
    <div class="container-add">
        <form action="" method="POST">
            <label for="name">Nhập Tên:</label>
            <input type="text" class="form-control" name="name" id="name">
            <span class="error-message"><?= $thongBaoLoiTen ?></span>

            <label for="image">Nhập Ảnh:</label>
            <input type="text" class="form-control" name="image" id="image">
            <span class="error-message"><?= $thongBaoLoiAnh ?></span>

            <label for="price">Nhập Giá:</label>
            <input type="number" class="form-control" name="price" id="price">
            <span class="error-message"><?= $thongBaoLoiGia ?></span>

            <label for="quantity">Nhập Số Lượng:</label>
            <input type="number" class="form-control" name="quantity" id="quantity">
            <span class="error-message"><?= $thongBaoLoiSoLuong ?></span>

            <label for="describe">Nhập Mô Tả:</label>
            <input type="text" class="form-control" name="describe" id="describe">
            <span class="error-message"><?= $thongBaoLoiMoTa ?></span>

            <label for="sp_pricedel">Nhập giá biến thể:</label>
            <input type="text" class="form-control" name="sp_pricedel" id="sp_pricedel">
            <span class="error-message"><?= $thongBaoLoiMoTa ?></span>

            <label for="dm_id">Nhập Danh Mục:</label>
            <select class="form-control" name="dm_id" id="dm_id">
                <option value="">Chọn danh mục</option>
                <?php foreach ($list_category as $danhmuc): extract($danhmuc) ?>
                    <option value="<?= $dm_id ?>"><?= $dm_name ?></option>
                <?php endforeach ?>
            </select>
            <span class="error-message"><?= $thongBaoLoiDM ?></span>

            <button name="submit" type="submit" class="btn btn-primary">Thêm SP</button>
        </form>
        <div class="mt-3">
            <?= $thongBao ?>
        </div>
    </div>
</article>