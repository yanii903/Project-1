<?php
include 'view/admin/nav.php';
?>
<article>
    <h1>Danh Sách Sản Phẩm</h1>
    <div class="container-add">
        <form action="" enctype="multipart/form-data">
            <div id="search" class="form-group">
                <input class="form-control" name="inputSearch" type="text" placeholder="Tìm Kiếm Sản Phẩm...">
                <button class="btn btn-primary" name="btnSearch" type="submit">Tìm Kiếm</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Mã SP</th>
                            <th>Tên</th>
                            <th>Ảnh</th>
                            <th>Giá</th>
                            <th>Tiêu đề</th>
                            <th>Số Lượng</th>
                            <th>Mô Tả</th>
                            <th>Danh Mục</th>
                            <th>Biến thể giá</th>
                            <th>Hiển Thị</th>
                            <th>Tác Vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_product as $product): extract($product) ?>
                            <tr>
                                <td><?= $sp_ma ?></td>
                                <td><?= $sp_name ?></td>
                                <td><img src="<?= $sp_image ?>" alt=""></td>
                                <td><?= $sp_price ?></td>
                                <td class="title"><?= $sp_title ?></td>
                                <td><?= $sp_quantity ?></td>
                                <td><?= $sp_describe ?></td>
                                <td><?= $id_dm ?></td>
                                <td><?= $sp_pricedel ?></td>
                                <td><input type="checkbox" name="" id="" /></td>
                                <td class="action">
                                    <a href="?act=admin&admin=productUpdate&id=<?= $sp_id ?>" class="update"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="?act=admin&admin=productDelete&id=<?= $sp_id ?>" class="delete"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</article>