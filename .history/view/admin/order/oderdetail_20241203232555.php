<?php
include 'view/admin/nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <link rel="stylesheet" href="view/assets/oderdetail.css"/>
</head>
<body>
    
</body>
</html>
<article>
    <h1>Chi tiết</h1>
    <div class="container-add">
         <?php foreach ($list_order as $order): extract($order);
                if ($dh_id == $_GET['dhid']) {
              ?>                     
                <div class="info-detail">
                    <h3>Người mua: <?= $dh_nameUser ?></h3>
                    <p>Số điện thoại: <?= $dh_phoneUser ?></p>
                    <p class="address">Địa chỉ: <?= $dh_communePay ?>, <?= $dh_districtPay ?>, <?= $dh_cityPay ?>, <?= $dh_countryPay ?></p>  
                </div>
                    <?php foreach ($list_orderdetail as $orderdetail) : extract($orderdetail);
                        if($id_dh == $dh_id){
                            foreach ($listAll_product as $product): extract($product);
                                if ($id_sp == $sp_id) {?>
                                    <div class="order-box">
                                        <div class="oder-info">
                                            <img src="<?= $sp_image ?>" alt="Ảnh sản phẩm" class="product-image">
                                                <div class="product-details">
                                                    <h3 class="product-name"><?= $sp_name ?></h3>
                                                    <p class="product-category">Phân loại:<?= $od_option ?> + <?= $od_optionColor ?></p>
                                                    <p class="product-quantity">Số lượng: <?= $orderdetail['ct_quantity'] ?></p>
                                                </div>
                                        </div>
                                    </div>
                                <?php }
                                endforeach ?>
                        <?php }
                        endforeach ?>
                <div class="order-note">
                    <h3>Ghi chú: </h3>
                    <input type="text" name="" id="" value="<?=$dh_messagePay?>" disabled>
                </div>
                <div class="oder-status-comment">
                    <div>
                        <p class="product-status">Trạng thái: <span class="status-label"><?= $dh_status ?></span></p>
                    </div>
                    <?php if ($dh_status == 'Giao Hàng Thành Công') { ?>
                        <div class="final">
                            <a href=""><button class="review-btn">Liên hệ</button></a>
                            <a href="?client=finaldh&id=<?= $dh_id ?>&value=Đã nhận hàng&idtk=<?= $id_tk ?>"><button class="review-btn">Xác Nhận</button></a>
                        </div>
                    <?php } ?>
                </div>
                    <p>Thành tiền: <?= printPrice($dh_totalamount) ?></p>
                </div>
        <?php } 
        endforeach ?>
    </div>

</article>