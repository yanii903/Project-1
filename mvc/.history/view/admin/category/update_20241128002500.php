<?php
include 'view/admin/nav.php';
?>
<article>
    <div class="container-add">
        <h1>Thêm Danh mục</h1>
        <form action="" method="POST">
            <?php foreach ($list_category as $category): extract($category);
                if ($dm_id == $_GET['id']) { ?>
                    <label for="name">Tên danh mục:</label>
                    <input type="text" name="name" id="name" value="<?= $dm_name ?>">
                    <button name="submit" type="submit">Sửa danh Mục</button>
            <?php }
            endforeach ?>
        </form>
        <?= $thongBao ?>
    </div>
</article>