<?php
include 'view/admin/nav.php';
?>
<article>
    <h1>Danh Sách Sản Phẩm</h1>
    <div class="container-add">
        <form action="" enctype="multipart/form-data">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Select</th>
                        <th>STT</th>
                        <th>Màu</th>
                        <th>Sản Phẩm</th>
                        <th>Ảnh</th>
                        <th>Hiển Thị</th>
                        <th>Tác Vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_product_color as $productcolor): extract($productcolor); ?>
                        <tr>
                            <td><input type="checkbox" name="checkbox" id="" /></td>
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
                            <td><input type="checkbox" name="" id="" /></td>
                            <td class="action">
                                <a href="?act=admin&admin=productColor-Update&id=<?= $pc_id ?>" class="update"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="?act=admin&admin=productColor-Delete&id=<?= $pc_id ?>" class="delete"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>
    </div>
</article>s