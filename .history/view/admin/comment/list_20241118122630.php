<?php
include 'view/admin/nav.php';
?>
<style>
    table {
        width: 99%;
        border-collapse: collapse;
        margin-top: 20px;
        
    }

    th {
        background-color: #000000;
        color: white;
        padding: 10px;
        text-align: center;
    }

    td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: #f4f4f4;
    }

    .action a {
        margin-right: 10px;
        text-decoration: none;
    }

    .action a i {
        font-size: 20px;
    }

    h1 {
        font-size: 24px;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
        margin-top: 20px;
    }

</style>
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