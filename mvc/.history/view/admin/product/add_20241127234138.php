<?php
include 'view/admin/nav.php';
?>
<article>
    <div class="container form-container">
        <h1>Thêm Sản Phẩm</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Nhập Tên:</label>
                <input type="text" class="form-control" name="name" id="name">
                <span class="text-danger"><?= $thongBaoLoiTen ?></span>
            </div>

            <div class="form-group">
                <label for="image">Nhập Ảnh:</label>
                <input type="text" class="form-control" name="image" id="image">
                <span class="text-danger"><?= $thongBaoLoiAnh ?></span>
            </div>

            <div class="form-group">
                <label for="price">Nhập Giá:</label>
                <input type="number" class="form-control" name="price" id="price">
                <span class="text-danger"><?= $thongBaoLoiGia ?></span>
            </div>

            <div class="form-group">
                <label for="quantity">Nhập Số Lượng:</label>
                <input type="number" class="form-control" name="quantity" id="quantity">
                <span class="text-danger"><?= $thongBaoLoiSoLuong ?></span>
            </div>

            <div class="form-group">
                <label for="describe">Nhập Mô Tả:</label>
                <input type="text" class="form-control" name="describe" id="describe">
                <span class="text-danger"><?= $thongBaoLoiMoTa ?></span>
            </div>

            <div class="form-group">
                <label for="sp_pricedel">Nhập giá biến thể:</label>
                <input type="text" class="form-control" name="sp_pricedel" id="sp_pricedel">
                <span class="text-danger"><?= $thongBaoLoiMoTa ?></span>
            </div>

            <div class="form-group">
                <label for="dm_id">Nhập Danh Mục:</label>
                <select class="form-control" name="dm_id" id="dm_id">
                    <option value="">Chọn danh mục</option>
                    <?php foreach ($list_category as $danhmuc): extract($danhmuc) ?>
                        <option value="<?= $dm_id ?>"><?= $dm_name ?></option>
                    <?php endforeach ?>
                </select>
                <span class="text-danger"><?= $thongBaoLoiDM ?></span>
            </div>

            <button name="submit" type="submit" class="btn btn-primary">Thêm SP</button>
        </form>
        <div class="mt-3">
            <?= $thongBao ?>
        </div>
    </div>
</article>