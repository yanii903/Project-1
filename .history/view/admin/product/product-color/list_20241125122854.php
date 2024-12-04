<?php
include 'view/admin/nav.php';
?>
<style>
    img {
        max-width: 100px;
    }
</style>
<article>
    <h1>Danh Sách Sản Phẩm</h1>
    <div class="form">
        <form action="" enctype="multipart/form-data">
            <table>
                <thead>
                    <th>Select</th>
                    <th>STT</th>
                    <th>Màu</th>
                    <th>Danh Mục</th>
                    <th>Hiển Thị</th>
                    <th>Tác Vụ</th>
                </thead>

                <tbody>
                    <?php foreach ($list_product_color as $productcolor):  extract($productcolor); ?>
                        <tr>
                            <td><input type="checkbox" name="checkbox" id="" /></td>
                            <td><?= $pc_id ?></td>
                            <td><?= $pc_name ?></td>
                            <td>
                                <?php foreach ($list_category as $danhmuc):  extract($danhmuc); ?>
                                    <?php if ($id_dm == $dm_id) { ?>
                                        <?= $dm_name ?>
                                <?php }
                                endforeach ?>
                            </td>
                            <td><input type="checkbox" name="" id="" /></td>
                            <td class="action">
                                <a href="?act=admin&admin=productColor-Update&id=<?= $pc_id ?>" class="update"><i class="fa-regular fa-pen-to-square" style="color: #ff0000"></i></a>
                                <a href="?act=admin&admin=productColor-Delete&id=<?= $pc_id ?>" class="delete"><i class="fa-solid fa-trash-can" style="color: #ff0000"></i></a>
                            </td>
                        </tr>

                    <?php endforeach ?>

                </tbody>
            </table>
        </form>
    </div>
</article>