<?php
include 'view/admin/nav.php';
?>
<article>
    <h1>Danh Sách Đơn Hàng</h1>
    <form action="">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Mã DH</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Địa Chỉ</th>
                    <th>Quốc Gia</th>
                    <th>Thành Phố</th>
                    <th>Ghi Chú</th>
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
                        <td><?= $dh_addressUser ?></td>
                        <td><?= $dh_countryPay ?></td>
                        <td><?= $dh_cityPay ?></td>
                        <td><?= $dh_messagePay ?></td>
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
</article>