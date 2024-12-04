<?php
include 'view/admin/nav.php';
?>
<article>
    <h1>Danh Sách Danh Mục</h1>
    <form action="">
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Tác Vụ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_category as $index =>  $category): extract($category) ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $dm_id ?></td>
                        <td><?= $dm_name ?></td>
                        <td class="action">
                            <a href="?act=admin&admin=categoryUpdate&id=<?= $dm_id ?>" class="update"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="?act=admin&admin=categoryDelete&id=<?= $dm_id ?>" class="delete"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </form>
</article>