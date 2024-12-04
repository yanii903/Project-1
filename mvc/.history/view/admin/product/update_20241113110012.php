<?php
include 'view/admin/nav.php';
?>
<div class="container-add">
  <h1>Sửa Sản Phẩm</h1>
  <form action="" method="POST">
    <input type="text" name="name" id="" value="<?= $sp_name ?>">
    <input type="text" name="image" id="" value="<?= $sp_image ?>">
    <input type="number" name="price" id="" value="<?= $sp_price ?>">
    <input type="text" name="title" id="" value="<?= $sp_title ?>">
    <input type="text" name="quantity" id="" value="<?= $sp_quantity ?>">
    <input type="text" name="describe" id="" value="<?= $sp_describe ?>">
    <input type="text" name="dm_id" id="" value="<?= $id_dm ?>">

    <button name="submit" type="submit">Sửa danh Mục</button>
  </form>
  ?>

  <?= $thongBao ?>
</div>