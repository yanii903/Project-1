<?php
include 'view/admin/nav.php';
?>
<style>
    /* Style cho table */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 16px;
        text-align: left;
    }

    .table thead th {
        background-color: #f4f4f4;
        color: #333;
        padding: 10px;
        border-bottom: 2px solid #ddd;
    }

    .table tbody tr {
        border-bottom: 1px solid #ddd;
        transition: background-color 0.3s;
    }

    .table tbody tr:hover {
        background-color: #f9f9f9;
    }

    .table td,
    .table th {
        padding: 10px;
        vertical-align: middle;
    }

    /* Style cho hình ảnh */
    .table img {
        max-width: 50px;
        height: auto;
        border-radius: 5px;
    }

    /* Style cho các checkbox */
    .table input[type="checkbox"] {
        transform: scale(1.2);
        cursor: pointer;
    }

    /* Style cho các nút tác vụ */
    .action {
        display: flex;
        gap: 10px;
    }

    .action a {
        text-decoration: none;
        padding: 5px 10px;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .action a.update {
        background-color: #4CAF50;
        color: white;
    }

    .action a.update:hover {
        background-color: #45a049;
    }

    .action a.delete {
        background-color: #f44336;
        color: white;
    }

    .action a.delete:hover {
        background-color: #e53935;
    }
</style>
<article>
    <h1>Danh Sách Sản Phẩm</h1>
    <div class="form">
        <form action="" enctype="multipart/form-data">
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