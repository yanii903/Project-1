<?php
include 'view/admin/nav.php';
?>
<div class="container-add">
    <h1>Thêm Danh mục</h1>
    <?php foreach ($one_category as $category) : ?>
        <form action="" method="POST">
            <input type="text" name="name" id="" value="<?= $category->dm_name ?>">
            <button name="submit" type="submit">Sửa danh Mục</button>
        </form>
    <?php endforeach ?>

    <?= $thongBao ?>
</div>