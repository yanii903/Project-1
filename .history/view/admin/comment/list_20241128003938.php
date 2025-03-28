<?php
include 'view/admin/nav.php';
?>
<article>
    <h1>Danh Sách Bình Luận</h1>
    <div class="form">
        <form action="">
            <table>
                <thead>
                    <th>STT</th>
                    <th>Nội dung</th>
                    <th>Ngày giờ</th>
                    <th>Tài khoản</th>
                    <th>Sản phẩm</th>
                    <th>Tác Vụ</th>
                </thead>

                <tbody>
                    <?php foreach ($list_comment as $comment):  extract($comment) ?>
                        <tr>
                            <td><?= $bl_id ?></td>
                            <td><?= $bl_content ?></td>
                            <td><?= $bl_cmtdate ?></td>
                            <td><?= $tk_user ?></td>
                            <td><?= $sp_name ?></td>

                            <td class="action">
                                <a href="?act=admin&admin=commentDelete&id=<?= $bl_id ?>" class="delete" onclick="return confirmDelete();"><i class="fa-solid fa-trash-can" style="color: #ff0000"></i></a>
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