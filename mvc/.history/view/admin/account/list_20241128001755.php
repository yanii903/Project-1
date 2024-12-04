<?php
include 'view/admin/nav.php';
?>
<article>
    <h1>Danh Sách Tài Khoản</h1>
    <div class="form">
        <form action="">
            <table>
                <thead>
                    <th>STT</th>
                    <th>Tài khoản</th>
                    <th>Email</th>
                    <th>Adress</th>
                    <th>Role</th>
                    <th>Tác Vụ</th>
                </thead>

                <tbody>
                    <?php foreach ($list_account as $account):  extract($account) ?>
                        <tr>
                            <td><?= $tk_id ?></td>
                            <td><?= $tk_user ?></td>
                            <td><?= $tk_email ?></td>
                            <td><?= $tk_address ?></td>
                            <td><?= $role_name ?></td>

                            <td class="action">
                                <a href="?act=admin&admin=accountUpdate&id=<?= $tk_id ?>" class="update"><i class="fa-regular fa-pen-to-square" style="color: #ff0000"></i></a>
                                <a href="?act=admin&admin=accountDelete&id=<?= $tk_id ?>" class="delete" onclick="return confirmDelete();"><i class="fa-solid fa-trash-can" style="color: #ff0000"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </form>
    </div>
</article>
<script>
    // Hàm xác nhận xóa
    function confirmDelete() {
        return confirm("Bạn có chắc chắn muốn xóa tài khoản này?");
    }
</script>