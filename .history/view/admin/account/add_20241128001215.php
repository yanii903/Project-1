<?php
include 'view/admin/nav.php';
?>
<article>
    <div class="container-add">
        <h1>Thêm Tài Khoản</h1>
        <form action="" method="POST">
            <label for="">Tên tài khoản:</label>
            <input type="text" name="user" value="<?= $_POST['user'] ?? '' ?>">
            <?php if (!empty($errors['user'])): ?>
                <div class="error-message"><?= $errors['user'] ?></div>
            <?php endif; ?>
            <label for="">Mật khẩu:</label>
            <input type="password" name="pass" value="<?= $_POST['pass'] ?? '' ?>">
            <?php if (!empty($errors['pass'])): ?>
                <div class="error-message"><?= $errors['pass'] ?></div>
            <?php endif; ?>
            <label for="">Email:</label>
            <input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>">
            <?php if (!empty($errors['email'])): ?>
                <div class="error-message"><?= $errors['email'] ?></div>
            <?php endif; ?>
            <label for="">Địa chỉ:</label>
            <input type="text" name="address" value="<?= $_POST['address'] ?? '' ?>">
            <?php if (!empty($errors['address'])): ?>
                <div class="error-message"><?= $errors['address'] ?></div>
            <?php endif; ?>

            <label for="">Role:</label>
            <select name="id_role">
                <option value="">Chọn role</option>
                <?php foreach ($list_role as $role): extract($role) ?>
                    <option value="<?= $role['role_id'] ?>"
                        <?= isset($id_role) && $role['role_id'] == $id_role ? 'selected' : '' ?>>
                        <?= $role['role_name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (!empty($errors['id_role'])): ?>
                <div class="error-message"><?= $errors['id_role'] ?></div>
            <?php endif; ?>

            <button name="submit" type="submit">Thêm Tài Khoản</button>
        </form>

        <?php if ($thongBao): ?>
            <div class="success-message"><?= $thongBao ?></div>
        <?php endif; ?>
    </div>
</article>