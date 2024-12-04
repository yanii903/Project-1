<?php
include 'view/admin/nav.php';
?>
<article>
    <div class="container-add">
        <h1>Chi Tiết Sản Phẩm</h1>
        <form action="" method="POST">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" name="name" id="name" value="<?= $sp_name ?>" readonly>
            

            <label for="image">Ảnh sản phẩm:</label>
            <input type="text" name="image" id="image" value="<?= $sp_image ?>" readonly>
      

            <label for="price">Giá sản phẩm:</label>
            <input type="number" name="price" id="price" value="<?= $sp_price ?>" readonly>
           

            <label for="quantity">Số lượng:</label>
            <input type="text" name="quantity" id="quantity" value="<?= $sp_quantity ?>" readonly>
            

            <label for="describe">Mô tả:</label>
            <input type="text" name="describe" id="describe" value="<?= $sp_describe ?>" readonly>
        

            <label for="sp_pricedel">Giá biến thể:</label>
            <input type="text" name="sp_pricedel" id="sp_pricedel" value="<?= $sp_pricedel ?>" readonly>
      

            <label for="dm_id">Danh mục:</label>
            <select name="dm_id" id="dm_id" required disabled>
                <?php foreach ($list_category as $category): ?>
                    <option value="<?= $category['dm_id'] ?>" <?= ($category['dm_id'] == $id_dm) ? 'selected' : '' ?>>
                        <?= $category['dm_name'] ?>
                    </option>
                <?php endforeach ?>
            </select>
          

        </form>

    </div>
     <div class="container-add">
        <h1>Thêm Màu Sản Phẩm</h1>
        <form action="" method="POST">
            <label for="name">Nhập Tên:</label>
            <input type="text" name="name_color" id="name" value="<?= $_POST["name_color"] ?? "" ?>">
            <div class="error-message"><?= $thongBaoLoiTenMau ?></div>

    

            <button name="submit_color" type="submit" class="btn btn-primary">Thêm SP</button>
        </form>

        <div class="mt-3">
            <?= $thongBaoMau ?>
        </div>
    </div>
       <div class="container-add">
        <h1>Thêm Bộ Nhớ Sản Phẩm</h1>
        <form action="" method="POST">
            <label for="name">Nhập Tên:</label>
            <input type="text" name="name_memory" id="name_memory" value="<?= $_POST["name_memory"] ?? "" ?>">
            <div class="error-message"><?= $thongBaoLoiTenBN ?></div>

          

            <button name="submit_memory" type="submit" class="btn btn-primary">Thêm SP</button>
        </form>
        <div class="mt-3">
            <?= $thongBaoBN ?>
        </div>
    </div>


    
</article>
