<?php
include 'view/admin/nav.php';
?>
<article>
    <h1>Danh Sách Danh Mục</h1>
    <div class="form">
        <form action="">
            <table>
                <thead>
                    <th>Select</th>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Hiển Thị</th>
                    <th>Tác Vụ</th>
                </thead>

                <tbody>
                    <?php foreach ($list_category as $category):  extract($category) ?>
                        <tr>
                            <td><input type="checkbox" name="checkbox" id="" /></td>
                            <td><?= $dm_id ?></td>
                            <td><?= $dm_name ?></td>
                            <td><input type="checkbox" name="" id="" /></td>
                            <td class="action">
                                <a href="#" class="update"><i class="fa-regular fa-pen-to-square" style="color: #ff0000"></i></a>
                                <a href="?act=admin&admin=categoryDelete" class="delete"><i class="fa-solid fa-trash-can" style="color: #ff0000"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </form>
    </div>
</article>