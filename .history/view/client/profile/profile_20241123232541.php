<?php
include './view/client/nav.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="view/assets/profile.css">
</head>

<body>
  <div class="all">

    <aside>
      <div class="profile">
        <div class="avatar">
          <a href="?client=detailProfile&iduser=<?= $tk_id ?>"><img
              src="https://img.freepik.com/premium-vector/avatar-guest-vector-icon-illustration_1304166-97.jpg"
              alt="Avatar" /></a>
          <h2><?= $_SESSION['login'] ?></h2>
        </div>
        <ul>
          <li><a href="?client=detailProfile&iduser=<?= $_SESSION['user_id'] ?>">Tài Khoản Của Tôi</a></li>
          <li><a href="?client=payProfile&iduser=<?= $_SESSION['user_id'] ?>">Đơn Mua Hàng</a></li>
        </ul>
      </div>

    </aside>

</body>

</html>