<?php
include "nav.php";
include 'slideshow.php';
?>


<body>
    <div class="container">
        <main>
            <?php if (!isset($_SESSION['login'])) {
               
                <div class="main-full">
                    <div class="product">
                        <?php foreach ($listAll_product as $product) : extract($product);
                            foreach ($productTM as $product_name) : extract($product_name);
                                if ($product_name['sp_id'] === $product['sp_id']) {
                        ?>
                                    <div class="product-box">
                                        <a href="?client=detail&id=<?= $sp_id ?>">
                                            <div class="product-box-tag">
                                                <p>Trả góp 0%</p>
                                            </div>
                                            <br />
                                            <div class="product-box-img">
                                                <img
                                                    src="<?= $sp_image ?>"
                                                    alt="" />
                                            </div>
                                            <div class="product-box-title">
                                                <h3><?= $sp_name ?></h3>
                                                <div class="product-price">
                                                    <p><?= printPrice($sp_price) ?></p>
                                                    <del><?= printPrice($sp_pricedel) ?></del>
                                                </div>
                                                <div class="product-describe">
                                                    <p><?= $sp_title ?></p>
                                                </div>
                                                <div class="product-icon">
                                                    <div class="icon-star">
                                                        <i class="bx bxs-star"></i>
                                                        <i class="bx bxs-star"></i>
                                                        <i class="bx bxs-star"></i>
                                                        <i class="bx bxs-star"></i>
                                                        <i class="bx bxs-star"></i>
                                                    </div>
                                                    <div class="icon-cart-like">
                                                        <i id="cart" onclick="changeClass()" class="bx bx-cart-alt"></i>
                                                        <i id="heart" onclick="changeClass2()" onclick="" class="bx bx-heart"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                            <?php }
                            endforeach ?>
                        <?php
                        endforeach ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="main-full">
                    <div class="product">
                        <?php foreach ($listAll_product as $product) : extract($product);
                            foreach ($list_account as $account): extract($account);
                                if ($_GET['iduser'] == $tk_id) {
                                    foreach ($productTM as $product_name) : extract($product_name);
                                        if ($product_name['sp_id'] === $product['sp_id']) {
                        ?>
                                            <div class="product-box">
                                                <a href="?client=detail&iduser=<?= $tk_id ?>&id=<?= $sp_id ?>">
                                                    <div class="product-box-tag">
                                                        <p>Trả góp 0%</p>
                                                    </div>
                                                    <br />
                                                    <div class="product-box-img">
                                                        <img
                                                            src="<?= $sp_image ?>"
                                                            alt="" />
                                                    </div>
                                                    <div class="product-box-title">
                                                        <h3><?= $sp_name ?></h3>
                                                        <div class="product-price">
                                                            <p><?= printPrice($sp_price) ?></p>
                                                            <del><?= printPrice($sp_pricedel) ?></del>
                                                        </div>
                                                        <div class="product-describe">
                                                            <p><?= $sp_title ?></p>
                                                        </div>
                                                        <div class="product-icon">
                                                            <div class="icon-star">
                                                                <i class="bx bxs-star"></i>
                                                                <i class="bx bxs-star"></i>
                                                                <i class="bx bxs-star"></i>
                                                                <i class="bx bxs-star"></i>
                                                                <i class="bx bxs-star"></i>
                                                            </div>
                                                            <div class="icon-cart-like">
                                                                <i id="cart" onclick="changeClass()" class="bx bx-cart-alt"></i>
                                                                <i id="heart" onclick="changeClass2()" onclick="" class="bx bx-heart"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                    <?php }
                                    endforeach ?>
                            <?php }
                            endforeach ?>
                    </div>
                </div>
            <?php
                        endforeach  ?>
        <?php } ?>
        </main>
    </div>
    <br><br>
    <?php
    include 'footer.php' ?>
</body>