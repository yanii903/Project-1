<?php
include "nav.php";
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<link rel="stylesheet" href="view/assets/chitietsanpham.css">
<?php foreach ($listAll_product as $product): extract($product);
    if ($sp_id == $_GET['id']) {
        foreach ($list_category as $category): extract($category);
            if ($id_dm == $dm_id) {
?>
                <div class="layout-detail">
                    <h2 style="margin-bottom: 10px;"><?= $sp_name ?></h2>

                    <div class="box-detail">

                        <div class="content-one">

                            <div class="images-one">
                                <div> <img
                                        src="<?= $sp_image ?>"
                                        alt></div>
                            </div>
                            <div class="content-small">
                                <div class="product-small">
                                    <div class="product-information">
                                        <div><svg width="28" height="29" viewBox="0 0 28 29" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M24.0625 21.0659H17.9375V18.0034H24.0625V21.0659Z" fill="#FFAE14"></path>
                                                <path d="M25.8125 26.3159H21.4375V24.1284H25.8125V26.3159Z" fill="#FFAE14"></path>
                                                <path d="M13.5625 20.6284H10.0625V18.8784H13.5625V20.6284Z" fill="#FFAE14"></path>
                                                <path d="M13.5625 10.1284H10.0625V6.62842H13.5625V10.1284Z" fill="#FFAE14"></path>
                                                <path
                                                    d="M12.6855 12.7543L22.1808 3.259L25.2427 6.32088L15.7474 15.8162L12.6855 12.7543Z"
                                                    fill="#FFAE14"></path>
                                                <path
                                                    d="M26.25 17.5659H19.6875V12.497L26.7999 5.38461C27.2917 4.89286 27.5625 4.23923 27.5625 3.54404C27.5625 2.10861 26.3948 0.940918 24.9594 0.940918C24.2642 0.940918 23.6106 1.21173 23.1188 1.70304L19.6875 5.13436V4.00342C19.6875 2.79723 18.7062 1.81592 17.5 1.81592H14.357C14.1759 1.30798 13.6946 0.940918 13.125 0.940918H7C6.43037 0.940918 5.94913 1.30798 5.768 1.81592H2.625C1.41881 1.81592 0.4375 2.79723 0.4375 4.00342V22.3784C0.4375 23.5846 1.41881 24.5659 2.625 24.5659H14.4375V26.7534C14.4375 27.477 15.0264 28.0659 15.75 28.0659H26.25C26.9736 28.0659 27.5625 27.477 27.5625 26.7534V18.8784C27.5625 18.1548 26.9736 17.5659 26.25 17.5659V17.5659ZM18.8125 17.5659H17.9375V14.247L18.8125 13.372V17.5659ZM14.4375 18.8784V21.9409H3.0625V4.44092H5.768C5.94913 4.94886 6.43037 5.31592 7 5.31592H13.125C13.6946 5.31592 14.1759 4.94886 14.357 4.44092H17.0625V7.75979L12.3112 12.511L11.0128 15.9734C10.9629 16.106 10.9375 16.2451 10.9375 16.3877C10.9375 17.0374 11.466 17.5659 12.1157 17.5659C12.2579 17.5659 12.3974 17.5405 12.5291 17.4911L15.9919 16.1922L17.0625 15.122V17.5659H15.75C15.0264 17.5659 14.4375 18.1548 14.4375 18.8784V18.8784ZM14.5281 14.594L22.0938 7.02829L23.0064 7.94092L15.5076 15.4397L12.2211 16.6721C12.0361 16.7408 11.8125 16.5912 11.8125 16.3877C11.8125 16.351 11.8191 16.3155 11.8318 16.2819L13.0638 12.9958L20.5625 5.49704L21.4751 6.40967L13.9094 13.9754L14.5281 14.594ZM23.7374 2.32211C24.0638 1.99573 24.4978 1.81592 24.9594 1.81592C25.9122 1.81592 26.6875 2.59117 26.6875 3.54404C26.6875 4.00561 26.5077 4.43961 26.1813 4.76598L23.625 7.32229L21.1811 4.87842L23.7374 2.32211ZM18.8125 4.00342V6.00936L17.9375 6.88436V4.44092C17.9375 3.95836 17.5451 3.56592 17.0625 3.56592H14.4375V2.69092H17.5C18.2236 2.69092 18.8125 3.27979 18.8125 4.00342ZM6.5625 2.25342C6.5625 2.01236 6.7585 1.81592 7 1.81592H13.125C13.3665 1.81592 13.5625 2.01236 13.5625 2.25342V4.00342C13.5625 4.24448 13.3665 4.44092 13.125 4.44092H7C6.7585 4.44092 6.5625 4.24448 6.5625 4.00342V2.25342ZM2.625 23.6909C1.90137 23.6909 1.3125 23.102 1.3125 22.3784V4.00342C1.3125 3.27979 1.90137 2.69092 2.625 2.69092H5.6875V3.56592H3.0625C2.57994 3.56592 2.1875 3.95836 2.1875 4.44092V21.9409C2.1875 22.4235 2.57994 22.8159 3.0625 22.8159H14.4375V23.6909H2.625ZM26.6875 26.7534C26.6875 26.9949 26.4915 27.1909 26.25 27.1909H15.75C15.5085 27.1909 15.3125 26.9949 15.3125 26.7534V18.8784C15.3125 18.6369 15.5085 18.4409 15.75 18.4409H26.25C26.4915 18.4409 26.6875 18.6369 26.6875 18.8784V26.7534Z"
                                                    fill="#1B1E2D"></path>
                                                <path d="M19.6875 19.3159H20.5625V21.0659H19.6875V19.3159Z" fill="#1B1E2D"></path>
                                                <path d="M21.4375 19.3159H22.3125V21.0659H21.4375V19.3159Z" fill="#1B1E2D"></path>
                                                <path d="M23.1875 25.4409H24.0625V26.3159H23.1875V25.4409Z" fill="#1B1E2D"></path>
                                                <path d="M21.4375 25.4409H22.3125V26.3159H21.4375V25.4409Z" fill="#1B1E2D"></path>
                                                <path d="M24.9375 25.4409H25.8125V26.3159H24.9375V25.4409Z" fill="#1B1E2D"></path>
                                                <path d="M21.4375 23.6909H25.8125V24.5659H21.4375V23.6909Z" fill="#1B1E2D"></path>
                                                <path
                                                    d="M8.87819 5.44409L8.13138 6.1909H3.9375V10.5659H8.3125V7.24703L9.49681 6.06272L8.87819 5.44409ZM7.4375 9.6909H4.8125V7.0659H7.25638L6.125 8.19728L5.55931 7.63159L4.94069 8.25022L6.125 9.43453L7.4375 8.12203V9.6909Z"
                                                    fill="#1B1E2D"></path>
                                                <path
                                                    d="M3.9375 15.8159H8.3125V11.4409H3.9375V15.8159ZM4.8125 12.3159H7.4375V14.9409H4.8125V12.3159Z"
                                                    fill="#1B1E2D"></path>
                                                <path
                                                    d="M3.9375 21.0659H8.3125V16.6909H3.9375V21.0659ZM4.8125 17.5659H7.4375V20.1909H4.8125V17.5659Z"
                                                    fill="#1B1E2D"></path>
                                                <path d="M10.0625 6.19092H13.5625V7.06592H10.0625V6.19092Z" fill="#1B1E2D"></path>
                                                <path d="M10.0625 7.94092H13.5625V8.81592H10.0625V7.94092Z" fill="#1B1E2D"></path>
                                                <path d="M10.0625 9.69092H13.5625V10.5659H10.0625V9.69092Z" fill="#1B1E2D"></path>
                                                <path d="M10.0625 18.4409H13.5625V19.3159H10.0625V18.4409Z" fill="#1B1E2D"></path>
                                                <path d="M10.0625 20.1909H13.5625V21.0659H10.0625V20.1909Z" fill="#1B1E2D"></path>
                                            </svg></div>
                                        <div>Thông tin sản phẩm</div>
                                    </div>


                                </div>
                                <div class="product-small">
                                    <div class="product-information">
                                        <div><svg width="30" height="30" viewBox="0 0 28 29" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_545_10168)">
                                                    <path
                                                        d="M14.6842 28.5034H13.3163L8.80013 22.1808H2.25806C1.01297 22.1808 0 21.1679 0 19.9228V2.76148C0 1.51639 1.01297 0.503418 2.25806 0.503418H25.7419C26.987 0.503418 28 1.51639 28 2.76148V19.9228C28 21.1679 26.987 22.1808 25.7419 22.1808H19.2003L14.6842 28.5034ZM13.781 27.6002H14.2195L18.7356 21.2776H25.7419C26.4889 21.2776 27.0968 20.6697 27.0968 19.9228V2.76148C27.0968 2.01451 26.4889 1.40664 25.7419 1.40664H2.25806C1.5111 1.40664 0.903226 2.01451 0.903226 2.76148V19.9228C0.903226 20.6697 1.5111 21.2776 2.25806 21.2776H9.26484L13.781 27.6002Z"
                                                        fill="#1B1E2D"></path>
                                                    <path
                                                        d="M14 20.3743C18.9884 20.3743 23.0323 16.3305 23.0323 11.3421C23.0323 6.35369 18.9884 2.30981 14 2.30981C9.01165 2.30981 4.96777 6.35369 4.96777 11.3421C4.96777 16.3305 9.01165 20.3743 14 20.3743Z"
                                                        fill="#FFAE14"></path>
                                                    <path
                                                        d="M9.93542 17.093V5.59131L19.8691 11.3421L9.93542 17.093ZM10.8387 7.1575V15.5263L18.0663 11.3421L10.8387 7.1575Z"
                                                        fill="#1B1E2D"></path>
                                                    <path
                                                        d="M14.8432 5.08278C14.5221 5.03943 14.2538 5.01956 14 5.01956V4.11633C14.2954 4.11633 14.6011 4.13891 14.9633 4.18724L14.8432 5.08278Z"
                                                        fill="#1B1E2D"></path>
                                                    <path
                                                        d="M21.2257 11.3421H20.3225C20.3225 8.51231 18.4158 6.00902 15.6858 5.25438L15.9265 4.38367C19.0467 5.24625 21.2257 8.10767 21.2257 11.3421Z"
                                                        fill="#1B1E2D"></path>
                                                    <path
                                                        d="M6.77414 20.3744H2.70962C2.21149 20.3744 1.8064 19.9693 1.8064 19.4712V17.2131H2.70962V19.4712H6.77414V20.3744Z"
                                                        fill="#1B1E2D"></path>
                                                    <path d="M2.70962 15.4066H1.8064V16.3098H2.70962V15.4066Z" fill="#1B1E2D">
                                                    </path>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_545_10168">
                                                        <rect width="28" height="28" fill="white" transform="translate(0 0.503418)">
                                                        </rect>
                                                    </clipPath>
                                                </defs>
                                            </svg></div>
                                        <div>Video về sản phẩm</div>
                                    </div>

                                </div>
                                <div class="product-small">
                                    <div class="betong">
                                        <img src="<?= $sp_image ?>"
                                            alt>
                                    </div>

                                </div>
                                <div class="product-small">
                                    <div class="betong">
                                        <img src="<?= $sp_image ?>"
                                            alt>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="content-two">

                            <div style="margin-bottom: 10px;"><span class="price-sale"
                                    style="color: #D70018; padding-right: 10px;"><?= printPrice($sp_price)  ?></span><span><del
                                        style="color: gray;">36.990.00đ</del></span></div>
                            <div style="margin-bottom: 10px;">Thương hiệu: <span style="font-weight: bold;"><?= $dm_name ?></span></div>
                            <div style="margin-bottom: 10px;">Bộ Nhớ</div>
                            <div style="margin-bottom: 10px;">Màu sắc</div>
                            <div style="margin-bottom: 10px;" class="letter-one"><a href="">Đen</a></div>
                            <div class="box-operation" style="margin-bottom: 10px;">
                                <button class="box-operation-plus">-</button>
                                <button class="box-operation-one">1</button>
                                <button class="box-operation-plus">+</button>
                            </div>
                            <?php if (!isset($_SESSION['login'])) { ?>
                                <div class="letter-product">
                                    <a href="?client=cart">
                                        <div class="letter-two">
                                            <i id="cart" class="fa-solid fa-cart-shopping"></i>
                                            <div><a class="a" href="?client=cart">Thêm Giỏ Hàng</a></div>
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="letter-three">
                                            <div><a href="?client=pay">Mua Ngay</a></div>
                                        </div>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="letter-product">
                                    <?php $idgh = 0;
                                    foreach ($list_cart as $cart) {
                                        extract($cart);
                                        if ($_GET['iduser'] == $id_tk) {
                                            $idgh = $gh_id;
                                            break;
                                        }
                                    } ?>
                                    <a href="?client=cartdetail&id=<?= $_GET['id'] ?>&idgh=<?= $idgh ?>">
                                        <div class="letter-two">
                                            <i id="cart" class="fa-solid fa-cart-shopping"></i>

                                            <div><a href="?client=cartdetail&id=<?= $_GET['id'] ?>&idgh=<?= $idgh ?>">Thêm Giỏ Hàng</a></div>
                                        </div>
                                    </a>
                                    <div class="letter-three">
                                        <div><a href="?client=pay">Mua Ngay</a></div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <div class="content-three">
                            <div class="text-detail">
                                <div class="text-small">Yên tâm mua hàng</div>
                                <div class="content-li">
                                    <li>Uy tín 20 năm xây dựng và phát triển</li>
                                    <li>Sản phẩm chính hãng 100%</li>
                                    <li>Trả góp lãi suất 0% toàn bộ giỏ hàng</li>
                                    <li>Trả bảo hành tận nơi sử dụng</li>
                                    <li>Bảo hành tận nơi cho doanh nghiệp</li>
                                    <li>Ưu đãi riêng cho học sinh sinh viên</li>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="evulate-detail">
                        <h3>Đánh giá <?= $sp_name ?></h3>
                        <div class="evulate-main">
                            <div class="box-evulate">
                                <div class="text-evulate">0/5</div>
                                <div><span><i class="fa-regular fa-star"></i></span>
                                    <span><i class="fa-regular fa-star"></i></span>
                                    <span><i class="fa-regular fa-star"></i></span>
                                    <span><i class="fa-regular fa-star"></i></span>
                                    <span><i class="fa-regular fa-star"></i></span>
                                </div>
                                <div>(0 đánh giá)</div>
                            </div>
                            <div class="box2-evulate">
                                <div class="fivestar-evulate">
                                    <div>5</div>
                                    <div><i class="fa-solid fa-star"></i></div>
                                    <div class="rectangle-evulate"></div>
                                    <div>0%</div>
                                </div>
                                <div class="fivestar-evulate">
                                    <div>4</div>
                                    <div><i class="fa-solid fa-star"></i></div>
                                    <div class="rectangle-evulate"></div>
                                    <div>0%</div>
                                </div>
                                <div class="fivestar-evulate">
                                    <div>3</div>
                                    <div><i class="fa-solid fa-star"></i></div>
                                    <div class="rectangle-evulate"></div>
                                    <div>0%</div>
                                </div>
                                <div class="fivestar-evulate">
                                    <div>2</div>
                                    <div><i class="fa-solid fa-star"></i></div>
                                    <div class="rectangle-evulate"></div>
                                    <div>0%</div>
                                </div>
                                <div class="fivestar-evulate">
                                    <div>1</div>
                                    <div><i class="fa-solid fa-star"></i></div>
                                    <div class="rectangle-evulate"></div>
                                    <div>0%</div>
                                </div>

                            </div>
                        </div>
                        <div class="text2-evulate">Bạn chưa đánh giá cao cho sản phẩm này</div>
                        <div class="betong2">
                            <div class="box3-evulate"><a href="">Đánh giá ngay</a></div>
                        </div>
                    </div>
                    <div class="related-products">
                        <div class="related-small">
                            <h2>Sản Phẩm Liên Quan</h2>
                        </div>
                    </div>
                    <div class="main-full-two">
                        <div class="product">
                            <?php foreach ($listAll_product as $product): extract($product);
                                if ($id_dm == $dm_id) {
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
                                        </a>
                                    </div>
                            <?php }
                            endforeach ?>
                            <!-- <main> -->
                        </div>

                    </div>
                    </main>


                    <form action>
                        <div class="text-area">
                            <textarea
                                placeholder="Mời bạn thảo luận vui lòng nhập tiếng việt có dấu..."></textarea>
                        </div>
                        <div class="evulate-now">
                            <button>GỬI ĐÁNH GIÁ NGAY</button>
                        </div>
                    </form>
            <?php break;
            }
        endforeach ?>
    <?php }
endforeach  ?>

                </div>