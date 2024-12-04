<?php
include 'view/admin/nav.php';
?>
<article>
    <h1>Danh Sách Đơn Hàng</h1>
    <div class="container-add">
        <form method="POST">
            <div id="search" class="form-group">
                <input style="width: 400px" class="form-control" name="inputSearch" type="text" placeholder="Tìm Kiếm Đơn Hàng...">
                <button class="btn btn-primary" name="btnSearch" type="submit">Tìm Kiếm</button>
            </div>
        </form>
        <?php if (isset($resultOrder) && !empty($resultOrder)) { ?>
            <div class="container-add">
                <form action="">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Mã DH</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Ngày Mua</th>
                                <th>Trạng Thái</th>
                                <th>Tổng Tiền</th>
                                <!-- <th>User ID</th> -->
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultOrder as $order): extract($order) ?>
                                <tr>
                                    <td><?= $dh_ma ?></td>
                                    <td><?= $dh_nameUser ?></td>
                                    <td><?= $dh_emailUser ?></td>
                                    <td><?= $dh_phoneUser ?></td>
                                    <td><?= $dh_orderdate ?></td>
                                    <td><?= $dh_status ?></td>
                                    <td><?= $dh_totalamount ?></td>
                                    <!-- <td><?= $id_tk ?></td> -->
                                    <td class="action">
                                        <a href="?act=admin&admin=orderUpdate&dhid=<?= $dh_id ?>" class="update"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <!-- <a href="?act=admin&admin=orderDelete&dhid=<?= $dh_id ?>" class="delete"><i class="fa-solid fa-trash-can"></i></a> -->
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </form>
            </div>
        <?php } ?>

        <?php if (isset($resultOrder) && empty($resultOrder)) { ?>
            <div class="container-add">
                <form action="">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Mã DH</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Ngày Mua</th>
                                <th>Trạng Thái</th>
                                <th>Tổng Tiền</th>
                                <!-- <th>User ID</th> -->
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_order as $order): extract($order) ?>
                                <tr>
                                    <td><?= $dh_ma ?></td>
                                    <td><?= $dh_nameUser ?></td>
                                    <td><?= $dh_emailUser ?></td>
                                    <td><?= $dh_phoneUser ?></td>
                                    <td><?= $dh_orderdate ?></td>
                                    <td><?= $dh_status ?></td>
                                    <td><?= $dh_totalamount ?></td>
                                    <!-- <td><?= $id_tk ?></td> -->
                                    <td class="action">
                                        <a href="?act=admin&admin=orderUpdate&dhid=<?= $dh_id ?>" class="update"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <!-- <a href="?act=admin&admin=orderDelete&dhid=<?= $dh_id ?>" class="delete"><i class="fa-solid fa-trash-can"></i></a> -->
                                        <a href="?act=admin&admin=orderDetail&dhid=<?= $dh_id ?>" class="update"><i class="fa-solid fa-circle-info"></i></a>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </form>
            </div>
        <?php } ?>
    </div>
</article>