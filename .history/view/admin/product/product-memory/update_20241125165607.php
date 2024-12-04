<?php
include 'view/admin/nav.php';
?>
<style>
    .container-add {
        max-width: 600px;
        margin: auto;
        padding: 20px;
    }

    .container-add h1 {
        text-align: center;
        font-size: 20px;
    }

    .container-add label {
        font-size: 14px;
        margin-top: 10px;
    }

    .container-add input,
    .container-add select,
    .container-add button {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid;
        border-radius: 5px;
    }

    .container-add button {
        background-color: black;
        color: white;
        border: none;
        cursor: pointer;
    }

    span {
        color: red;
    }
</style>
<div class="container-add">
    <h1>Sửa Bộ Nhớ Sản Phẩm</h1>
    <form action="" method="POST">
        <label for="">Nhập Tên:</label>
        <input type="text" name="name" id="" value="<?= $pm_name ?>"> <span><?= $thongBaoLoiTen ?></span>
        <br>
    
       
        <label for="">Nhập Sản Phẩm</label>
        <select name="id_sp"  id=""><span> <?= $thongBaoLoiSP ?></span>
           <?php foreach ($list_product as $product) { ?>
        

                <option value="<?= $product['sp_id'] ?>" <?= ($product['sp_id'] == $id_sp) ? 'selected' : '' ?>>
                    <?= $product['sp_name'] ?>
                </option>
               
            <?php } ?>
        </select>
        <button name="submit" type="submit">Sửa SP</button>
    </form>
    <?= $thongBao ?>
</div>