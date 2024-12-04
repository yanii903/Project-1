<?php
// if (!isset($_SESSION['login'])) {
//     header("Location: ?client=login");
//     exit();
// }

    include 'view/client/profile/profile.php';
?>


<article>
    <div class="container-update">
        <h1>Hồ sơ tài khoản</h1>
        <p class="subtitle">Quản lý thông tin hồ sơ để bảo mật tài khoản</p>

        <div class="row">
            <label for="">Tên tài khoản:</label>
            <span class="info"><?= $account['tk_user'] ?></span>
        </div>

        <div class="row">
            <label for="">Email:</label>
            <span class="info"><?= $account['tk_email'] ?></span>
        </div>

        <div class="row">
            <label for="">Địa chỉ:</label>
            <span class="info"><?= $account['tk_address'] ?></span>
        </div>
    </div>
</article>
