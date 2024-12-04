<?php
include 'view/admin/nav.php';
?>
<article>
    <div class="container-add">
        <h1>Sửa Sản Phẩm</h1>
        <form action="" method="POST">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" name="name" id="name" value="<?= $sp_name ?>">
            <span class="error-message"><?= $thongBaoLoiTen ?></span>

            <label for="image">Ảnh sản phẩm:</label>
            <input type="text" name="image" id="image" value="<?= $sp_image ?>">
            <span class="error-message"><?= $thongBaoLoiAnh ?></span>

            <label for="price">Giá sản phẩm:</label>
            <input type="number" name="price" id="price" value="<?= $sp_price ?>">
            <span class="error-message"><?= $thongBaoLoiGia ?></span>

            <label for="quantity">Số lượng:</label>
            <input type="text" name="quantity" id="quantity" value="<?= $sp_quantity ?>">
            <span class="error-message"><?= $thongBaoLoiSoLuong ?></span>

            <label for="describe">Mô tả:</label>
            <input type="text" name="describe" id="describe" value="<?= $sp_describe ?>">
            <span class="error-message"><?= $thongBaoLoiMoTa ?></span>

            <label for="sp_pricedel">Giá biến thể:</label>
            <input type="text" name="sp_pricedel" id="sp_pricedel" value="<?= $sp_pricedel ?>">
            <span class="error-message"><?= $thongBaoLoiMoTa ?></span>

            <label for="dm_id">Danh mục:</label>
            <select name="dm_id" id="dm_id" required>
                <?php foreach ($list_category as $category): ?>
                    <option value="<?= $category['dm_id'] ?>" <?= ($category['dm_id'] == $id_dm) ? 'selected' : '' ?>>
                        <?= $category['dm_name'] ?>
                    </option>
                <?php endforeach ?>
            </select>
            <span class="error-message"><?= $thongBaoLoiDM ?></span>

            <button name="submit" type="submit" class="btn btn-primary">Sửa Sản Phẩm</button>
        </form>

        <div class="mt-3">
            <?= $thongBao ?>
        </div>
    </div>
    <h1>Danh Sách Màu Sản Phẩm</h1>
    <div class="container-add">
        <form action="" enctype="multipart/form-data">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>STT</th>
                        <th>Màu</th>
                        <th>Sản Phẩm</th>
                        <th>Ảnh</th>
                        <th>Tác Vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_product_color as $index =>  $productcolor): extract($productcolor);
                        if ($_GET["id"] == $id_sp) { ?>
                            <tr>
                                <td><?= $pc_id ?></td>
                                <td><?= $pc_name ?></td>
                                <td>
                                    <?php foreach ($list_product as $product): extract($product); ?>
                                        <?php if ($id_sp == $sp_id): ?>
                                            <?= $sp_name ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php foreach ($list_product as $product): extract($product); ?>
                                        <?php if ($id_sp == $sp_id): ?>
                                            <img src="<?= $sp_image ?>" alt="">
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td class="action">
                                    <a href="?act=admin&admin=productColor-Update&id=<?= $pc_id ?>&idsp=<?= $id_sp ?>" class="update"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="?act=admin&admin=productColor-Delete&id=<?= $pc_id ?>&idsp=<?= $id_sp ?>" class="delete"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                    <?php }
                    endforeach; ?>
                </tbody>
            </table>
        </form>
    </div>
    <h1>Danh Sách Bộ Nhớ Sản Phẩm</h1>
    <div class="container-add">
        <form action="" enctype="multipart/form-data">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>STT</th>
                        <th>Bộ Nhớ</th>
                        <th>Sản Phẩm</th>
                        <th>Ảnh</th>
                        <th>Tác Vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_product_memory as $productmemory): extract($productmemory);
                        if ($_GET["id"] == $id_sp) { ?>
                            <tr>
                                <td><?= $pm_id ?></td>
                                <td><?= $pm_name ?></td>
                                <td>
                                    <?php foreach ($list_product as $product): extract($product); ?>
                                        <?php if ($id_sp == $sp_id): ?>
                                            <?= $sp_name ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php foreach ($list_product as $product): extract($product); ?>
                                        <?php if ($id_sp == $sp_id): ?>
                                            <img src="<?= $sp_image ?>" alt="">
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td class="action">
                                    <a href="?act=admin&admin=productMemory-Update&id=<?= $pm_id ?>&idsp=<?= $id_sp ?>" class="update"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="?act=admin&admin=productMemory-Delete&id=<?= $pm_id ?>&idsp=<?= $id_sp ?>" class="delete"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                    <?php }
                    endforeach; ?>
                </tbody>
            </table>
        </form>
    </div>

</article>