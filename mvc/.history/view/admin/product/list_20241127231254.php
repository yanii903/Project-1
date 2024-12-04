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
<!-- <article>
    <h1>Danh Sách Sản Phẩm</h1>
    <div class="form">
        <form action="" enctype="multipart/form-data">
            <table>
                <thead>
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
                <tbody> <?php foreach ($list_product as $product): extract($product) ?> <tr>
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
                            <td class="action"> <a href="?act=admin&admin=productUpdate&id=<?= $sp_id ?>" class="update"><i class="fa-regular fa-pen-to-square"></i></a> <a href="?act=admin&admin=productDelete&id=<?= $sp_id ?>" class="delete"><i class="fa-solid fa-trash-can"></i></a> </td>
                        </tr> <?php endforeach ?> </tbody>
            </table>
        </form>
    </div>
</article> -->
<div class="container mt-5">
    <h1 class="text-center text-uppercase text-success">Danh Sách Sản Phẩm</h1>
    <div class="form mt-4">
        <form action="" enctype="multipart/form-data">
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
                                <td><?= $sp_id ?></td>
                                <td><?= $sp_name ?></td>
                                <td><img src="<?= $sp_image ?>" alt=""></td>
                                <td><?= $sp_price ?></td>
                                <td><?= $sp_title ?></td>
                                <td><?= $sp_quantity ?></td>
                                <td><?= $sp_describe ?></td>
                                <td><?= $id_dm ?></td>
                                <td><?= $sp_pricedel ?></td>
                                <td><input type="checkbox" name="" id=""></td>
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
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>