<?php
include "nav.php";
include 'slideshow.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <main>
            <div class="main-full">
                <div class="product-brand">
                    <h2>SmartPhone</h2>
                </div>
                <div class="product">
                    <?php foreach() :?>
                    <div class="product-box">
                        <a href="?client=detail">
                            <div class="product-box-tag">
                                <p>Trả góp 0%</p>
                            </div>
                            <br />
                            <div class="product-box-img">
                                <img
                                    src="https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-16-pro-max.png"
                                    alt="" />
                            </div>
                            <div class="product-box-title">
                                <h3>iPhone 16 Pro Max 256GB| Xách tay LL/A</h3>
                                <div class="product-price">
                                    <p>34.000.000</p>
                                    <del>36.999.999</del>
                                </div>
                                <div class="product-describe">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
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

                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>