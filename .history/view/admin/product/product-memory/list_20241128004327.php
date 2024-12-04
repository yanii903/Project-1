<?php
include 'view/admin/nav.php';
?>
<article>
    <h1>Danh Sách Bộ Nhớ Sản Phẩm</h1>
    <div class="container-add">
        <form action="" enctype="multipart/form-data">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Select</th>
                        <th>STT</th>
                        <th>Bộ Nhớ</th>
                        <th>Sản Phẩm</th>
                        <th>Ảnh</th>
                        <th>Hiển Thị</th>
                        <th>Tác Vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_product_memory as $productmemory): extract($productmemory); ?>
                        <tr>
                            <td><input type="checkbox" name="checkbox" id="" /></td>
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
                            <td><input type="checkbox" name="" id="" /></td>
                            <td class="action">
                                <a href="?act=admin&admin=productMemory-Update&id=<?= $pm_id ?>" class="update"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="?act=admin&admin=productMemory-Delete&id=<?= $pm_id ?>" class="delete"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>
    </div>
</article>