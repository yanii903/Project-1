<?php
include 'view/admin/nav.php';
?>
<style>
    .container-update {
        max-width: 400px;
        margin: auto;
        padding: 20px;
    }

    .container-update h1 {
        text-align: center;
        font-size: 20px;
    }

    .container-update label {
        font-size: 14px;
        margin-top: 10px;
    }

    .container-update input,
    .container-update select,
    .container-update button {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid;
        border-radius: 5px;
    }

    .container-update button {
        background-color: black;
        color: white;
        border: none;
        cursor: pointer;
    }
    .error-message {
        color: red;
        font-size: 15px;
        font-weight: bold;
        margin-top: -10px;
        margin-bottom: 10px;
        font-style: italic;
    }
    .success-message {
        color: green;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        font-style: italic;
    }
</style>
<article>
    <div class="container-update">
        <h1>Update Tài Khoản</h1>

        <form action="" method="POST">
            <label for="">Tên tài khoản:</label>
            <input type="text" name="user" value="<?= $_POST['user'] ?? $account['tk_user'] ?>">
            <?php if (!empty($errors['user'])): ?>
                <div class="error-message"><?= $errors['user'] ?></div>
            <?php endif; ?>

            <label for="">Mật khẩu:</label>
            <input type="password" name="pass" value="<?= $_POST['pass'] ?? $account['tk_password'] ?>">
            <?php if (!empty($errors['pass'])): ?>
                <div class="error-message"><?= $errors['pass'] ?></div>
            <?php endif; ?>

            <label for="">Email:</label>
            <input type="email" name="email" value="<?= $_POST['email'] ?? $account['tk_email'] ?>">
            <?php if (!empty($errors['email'])): ?>
                <div class="error-message"><?= $errors['email'] ?></div>
            <?php endif; ?>

            <label for="">Địa chỉ:</label>
            <input type="text" name="address" value="<?= $_POST['address'] ?? $account['tk_address'] ?>">
            <?php if (!empty($errors['address'])): ?>
                <div class="error-message"><?= $errors['address'] ?></div>
            <?php endif; ?>
            <label for="">Role:</label> 
            <select name="id_role">
                <!-- <option value="">Chọn role</option> -->
                <?php foreach ($list_role as $role): ?>
                    <option value="<?= $role['role_id'] ?>" 
                            <?= $role['role_id'] == $id_role ? 'selected' : '' ?>>
                        <?= $role['role_name'] ?>
                    </option>
                <?php endforeach ?>
            </select>
            <?php if (!empty($errors['id_role'])): ?>
                <div class="error-message"><?= $errors['id_role'] ?></div>
            <?php endif; ?>
            <button name="submit" type="submit">Sửa Tài Khoản</button>
        </form>

        <?php if ($thongBao): ?>
        <div class="<?= strpos($thongBao, 'Sửa thành công') !== false ? 'success-message' : 'error-message' ?>">
            <?= $thongBao ?>
        </div>
        <?php endif; ?>
    </div>
</article>