<?php
include 'view/admin/nav.php';
?>
<article>
    <h1>Danh Sách Sản Phẩm</h1>
    <div class="container-add">
        <form action="" enctype="multipart/form-data" method="POST">
            <div id="search" class="form-group">
                <input style="width: 400px" class="form-control" name="inputSearch" type="text" placeholder="Tìm Kiếm Sản Phẩm...">
                <button class="btn btn-primary" name="btnSearch" type="submit">Tìm Kiếm</button>
            </div>
            <div class="result">
                <?php if (isset($resultProduct) && !empty($resultProduct)) { ?>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Mã SP</th>
                                <th>Tên</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Tiêu đề</th>
                                <th>Số Lượng</th>
                                <th>Danh Mục</th>
                                <th>Biến thể giá</th>
                                <th>Tác Vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultProduct as $value): extract($value); ?>
                                <tr>
                                    <td><?= $sp_ma ?></td>
                                    <td><?= $sp_name ?></td>
                                    <td><img src="<?= $sp_image ?>" alt=""></td>
                                    <td><?= printPrice($sp_price) ?></td>
                                    <td><?= $sp_title ?></td>
                                    <td><?= $sp_quantity ?></td>

                                    <td><?php foreach ($list_category as $category) {
                                            extract($category);
                                            if ($id_dm == $dm_id) {
                                                echo $dm_name;
                                            }
                                        }  ?></td>
                                    <td><?= printPrice($sp_pricedel) ?></td>
                                    <td class="action" style="display: flex;">
                                        <a href="?act=admin&admin=productUpdate&id=<?= $sp_id ?>" class="update"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="?act=admin&admin=productDelete&id=<?= $sp_id ?>" class="delete"><i class="fa-solid fa-trash-can"></i></a>
                                        <a href="?act=admin&admin=productDetail&id=<?= $sp_id ?>" class="update"><i class="fa-solid fa-circle-info"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
            <?php if (isset($resultProduct) && empty($resultProduct)) { ?>
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Mã SP</th>
                            <th>Tên</th>
                            <th>Ảnh</th>
                            <th>Giá</th>
                            <th>Tiêu đề</th>
                            <th>Số Lượng</th>
                            <th>Danh Mục</th>
                            <th>Biến thể giá</th>
                            <th>Tác Vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_product as $product): extract($product) ?>
                            <tr>
                                <td><?= $sp_ma ?></td>
                                <td><?= $sp_name ?></td>
                                <td><img src="<?= $sp_image ?>" alt=""></td>
                                <td><?= printPrice($sp_price)   ?></td>
                                <td><?= $sp_title ?></td>
                                <td><?= $sp_quantity ?></td>
                                <td><?php foreach ($list_category as $category) {
                                        extract($category);
                                        if ($id_dm == $dm_id) {
                                            echo $dm_name;
                                        }
                                    }  ?></td>
                                <td><?= printPrice($sp_pricedel) ?></td>
                                <td class="action" style="display: flex;">
                                    <a href="?act=admin&admin=productUpdate&id=<?= $sp_id ?>" class="update"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="?act=admin&admin=productDelete&id=<?= $sp_id ?>" class="delete"><i class="fa-solid fa-trash-can"></i></a>
                                    <a href="?act=admin&admin=productDetail&id=<?= $sp_id ?>" class="update"><i class="fa-solid fa-circle-info"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            <?php } ?>
        </form>
    </div>
</article>