<?php
include 'view/admin/nav.php';
?>
<article>
    <h1>Danh Sách Sản Phẩm</h1>
    <div class="form">
        <form action="" enctype="multipart/form-data" method="POST">
            <div id="search">
                <input style="margin: 0px 0px 5px 6px;" class="search" name="inputSearch" type="text" placeholder="Tìm Kiếm Sản Phẩm...">
                <button class="btn-add" style="margin: 1px 0px 0px 6px;" name="btnSearch" type="submit">Tìm Kiếm</button>

                <div class="result">

                    <?php if (isset($resultProduct) && !empty($resultProduct)) { ?>
                        <table>
                            <thead>
                                <th>Select</th>
                                <th>Mã SP</th>
                                <th>Name</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Tiêu đề</th>
                                <th>Số Lượng</th>
                                <th>Mô Tả</th>
                                <th>Danh Mục</th>
                                <th>Biến thể giá</th>
                                <th>Hiển Thị</th>
                                <th>Tác Vụ</th>
                            </thead>

                            <tbody>
                                <?php foreach ($resultProduct as $value) {
                                    extract($value); ?>
                                    <tr>
                                        <td><input type="checkbox" name="checkbox" id="" /></td>
                                        <td><?= $sp_ma ?></td>
                                        <td><?= $sp_name ?></td>
                                        <td><img src="<?= $sp_image ?>" alt=""></td>
                                        <td><?= $sp_price ?></td>
                                        <td><?= $sp_title ?></td>
                                        <td><?= $sp_quantity ?></td>
                                        <td><?= $sp_describe ?></td>
                                        <td><?= $id_dm ?></td>
                                        <td><?= $sp_pricedel ?></td>
                                        <td><input type="checkbox" name="" id="" /></td>
                                        <td class="action">
                                            <a href="?act=admin&admin=productUpdate&id=<?= $sp_id ?>" class="update"><i class="fa-regular fa-pen-to-square" style="color: #ff0000"></i></a>
                                            <a href="?act=admin&admin=productDelete&id=<?= $sp_id ?>" class="delete"><i class="fa-solid fa-trash-can" style="color: #ff0000"></i></a>
                                        </td>
                                    </tr>
                                <?php }  ?>
                            </tbody>
                        </table>

                    <?php } ?>
                </div>

            </div>

            <?php if (isset($resultProduct) && empty($resultProduct)) { ?>
                <table>
                    <thead>
                        <th>Select</th>
                        <th>Mã SP</th>
                        <th>Name</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Tiêu đề</th>
                        <th>Số Lượng</th>
                        <th>Mô Tả</th>
                        <th>Danh Mục</th>
                        <th>Biến thể giá</th>
                        <th>Hiển Thị</th>
                        <th>Tác Vụ</th>
                    </thead>

                    <tbody>
                        <?php foreach ($list_product as $product):  extract($product) ?>

                            <tr>
                                <td><input type="checkbox" name="checkbox" id="" /></td>
                                <td><?= $sp_ma ?></td>
                                <td><?= $sp_name ?></td>
                                <td><img src="<?= $sp_image ?>" alt=""></td>
                                <td><?= $sp_price ?></td>
                                <td><?= $sp_title ?></td>
                                <td><?= $sp_quantity ?></td>
                                <td><?= $sp_describe ?></td>
                                <td><?= $id_dm ?></td>
                                <td><?= $sp_pricedel ?></td>
                                <td><input type="checkbox" name="" id="" /></td>
                                <td class="action">
                                    <a href="?act=admin&admin=productUpdate&id=<?= $sp_id ?>" class="update"><i class="fa-regular fa-pen-to-square" style="color: #ff0000"></i></a>
                                    <a href="?act=admin&admin=productDelete&id=<?= $sp_id ?>" class="delete"><i class="fa-solid fa-trash-can" style="color: #ff0000"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            <?php } ?>
        </form>
    </div>
</article>