<?php
include 'view/admin/nav.php';
?>
<!-- <style>
    /* General table styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 16px;
        text-align: left;
    }

    /* Header styling */
    th {
        background-color: #f2f2f2;
        color: #333;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    /* Row styling */
    tr {
        border-bottom: 1px solid #ddd;
    }

    /* Data cell styling */
    td {
        padding: 10px;
    }

    /* Checkbox styling */
    input[type="checkbox"] {
        margin: 0;
    }

    /* Image styling */
    img {
        width: 50px;
        height: auto;
        border-radius: 5px;
    }

    /* Action buttons */
    .action a {
        text-decoration: none;
        color: #ff0000;
        margin: 0 5px;
    }

    .action a:hover {
        opacity: 0.7;
    }

    /* Form and container styling */
    .form {
        margin: 20px 0;
    }

    h1 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }
</style> -->
<article>
    <h1>Danh Sách Sản Phẩm</h1>
    <div class="form">
        <form action="" enctype="multipart/form-data">
            <table>
                <thead>
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
                            <td><?= $sp_ma ?></td>
                            <td><?= $sp_id ?></td>
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
        </form>
    </div>
</article>