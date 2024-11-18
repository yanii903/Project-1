<?php
// session_start();
function printPrice($price)
{
    echo  number_format($price, 0, ',', '.');
};
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="view/assets/index.css" />
    <!-- <link rel="stylesheet" href="view/assets/index.css<?= time() ?>"> -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Oleo+Script:wght@400;700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap");
    </style>
</head>
<nav>
    <div class="nav-full">
        <?php if (!isset($_SESSION['login'])) { ?>
            <div class="logo">
                <h1 class="logo-style"><a href="?act=client">FourSmart</a></h1>
            </div>
            <div class="category-full">
                <div class="category">
                    <!-- <i id="icon-login" class="bx bx-menu"></i> -->
                    <svg id="icon-category" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.99 26.99">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: none;
                                    stroke: #fff;
                                    stroke-linecap: round;
                                    stroke-linejoin: round;
                                    stroke-width: 1.8px;
                                }
                            </style>
                        </defs>
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="Layer_1-2" data-name="Layer 1">
                                <line x1="7.06" y1="7.52" x2="19.92" y2="7.52" class="cls-1"></line>
                                <line x1="7.06" y1="13.49" x2="19.92" y2="13.49" class="cls-1"></line>
                                <line x1="7.06" y1="19.47" x2="11.95" y2="19.47" class="cls-1"></line>
                                <rect x="0.9" y="0.9" width="25.19" height="25.19" rx="4.71" class="cls-1"></rect>
                            </g>
                        </g>
                    </svg>
                    <a class="category-link" href="">Danh mục</a>

                    <ul class="sub-menu">
                        <?php foreach ($list_category as $category) : extract($category)
                        ?>
                            <li><a href="#"><?= $dm_name ?> </a></li>

                        <?php endforeach ?>
                    </ul>

                </div>
            </div>
            <div class="search">
                <i id="icon-search" class="bx bx-search"></i>
                <input type="search" name="search" id="search" placeholder="Tìm kiếm" />
            </div>
            <div class="hotline-full">
                <div class="hotline">
                    <i id="icon-hotline" class="bx bxs-phone"></i>
                    <a class="hotline-link" href="">liên hệ 0886563826</a>
                </div>
            </div>
            <div class="cart-full">
                <a href="?client=cart">
                    <div class="cart">
                        <i id="icon-cart" class="bx bx-cart"></i>
                        <a class="cart-link" href="?client=cart">Giỏ hàng</a>
                    </div>
                </a>
            </div>
            <?php } else {
            foreach ($list_account as $account): extract($account);
                if ($_SESSION['login'] == $tk_user) { ?>
                    <div class="logo">
                        <h1 class="logo-style"><a href="?act=client&id=<?= $tk_id ?>">FourSmart</a></h1>
                    </div>
            <?php }
            endforeach ?>
            <div class="category-full">
                <div class="category">
                    <!-- <i id="icon-login" class="bx bx-menu"></i> -->
                    <svg id="icon-category" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.99 26.99">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: none;
                                    stroke: #fff;
                                    stroke-linecap: round;
                                    stroke-linejoin: round;
                                    stroke-width: 1.8px;
                                }
                            </style>
                        </defs>
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="Layer_1-2" data-name="Layer 1">
                                <line x1="7.06" y1="7.52" x2="19.92" y2="7.52" class="cls-1"></line>
                                <line x1="7.06" y1="13.49" x2="19.92" y2="13.49" class="cls-1"></line>
                                <line x1="7.06" y1="19.47" x2="11.95" y2="19.47" class="cls-1"></line>
                                <rect x="0.9" y="0.9" width="25.19" height="25.19" rx="4.71" class="cls-1"></rect>
                            </g>
                        </g>
                    </svg>
                    <a class="category-link" href="">Danh mục</a>

                    <ul class="sub-menu">
                        <?php foreach ($list_category as $category) : extract($category)
                        ?>
                            <li><a href="#"><?= $dm_name ?> </a></li>

                        <?php endforeach ?>
                    </ul>

                </div>
            </div>
            <div class="search">
                <i id="icon-search" class="bx bx-search"></i>
                <input type="search" name="search" id="search" placeholder="Tìm kiếm" />
            </div>
            <div class="hotline-full">
                <div class="hotline">
                    <i id="icon-hotline" class="bx bxs-phone"></i>
                    <a class="hotline-link" href="">liên hệ 0886563826</a>
                </div>
            </div>
            <div class="cart-full">
                <a href="?client=cart">
                    <div class="cart">
                        <i id="icon-cart" class="bx bx-cart"></i>
                        <a class="cart-link" href="?client=cart&id=<?= $tk_id ?>">Giỏ hàng</a>
                    </div>
                </a>
            </div>
        <?php } ?>
        <div class="login-full">
            <?php
            if (!isset($_SESSION['login'])) {
                // echo "Đăng Nhập";
            ?>
                <a href="?client=login">
                    <div class="login">
                        <i id="icon-login" class="bx bx-user-circle"></i>
                        <a class="login-link" href="?client=login">Đăng Nhập</a>
                    </div>
                </a>
            <?php } else { ?>
                <?php if ($_SESSION['login'] === 'admin') { ?>
                    <a href="?act=admin">
                        <div class="login">
                            <i id="icon-login" class="bx bx-user-circle"></i>
                            <a class="login-link" href="?act=admin"><?= $_SESSION['login'] ?></a>
                        </div>
                    </a>
                <?php } else { ?>
                    <!-- <?php foreach ($list_account as $account): extract($account);
                                if ($tk_id == $_GET['id']) { ?> -->
                    <a href="?client=login">
                        <div class="login">
                            <i id="icon-login" class="bx bx-user-circle"></i>
                            <a class="login-link" href="?client=login$id=<?= $tk_id ?>"><?= $_SESSION['login'] ?></a>
                        </div>
                    </a>
                    <!-- <?php  }
                            endforeach ?> -->
            <?php }
            } ?>

        </div>
        <?php
        if (isset($_SESSION['login'])) {
            // echo "Đăng Nhập";
        ?>
            <div class="login-full">
                <a href="?act=logout">
                    <div class="login">
                        <i id="icon-login" class="bx bx-user-circle"></i>
                        <a class="login-link" href="?act=logout">Đăng Xuất</a>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</nav>