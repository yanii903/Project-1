 <head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Document</title>
     <link rel="stylesheet" href="view/assets/index.css" />
     <link rel="stylesheet" href="style.css<?= time() ?>">
     <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
     <style>
         @import url("https://fonts.googleapis.com/css2?family=Oleo+Script:wght@400;700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap");
     </style>
 </head>
 <nav>
     <div class="nav-full">
         <div class="logo">
             <h1 class="logo-style"><a href="?client=home">FourSmart</a></h1>
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
                     <li><a href="#">Danh mục 1 </a></li>
                     <li><a href="#">Danh mục 2 </a></li>
                     <li><a href="#">Danh mục 2 </a></li>
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
             <a href="">
                 <div class="cart">
                     <i id="icon-cart" class="bx bx-cart"></i>
                     <a class="cart-link" href="">Giỏ hàng</a>
                 </div>
             </a>
         </div>
         <div class="login-full">
             <a href="?act=admin">
                 <div class="login">
                     <i id="icon-login" class="bx bx-user-circle"></i>
                     <p class="login-link" href="">Đăng Nhập</p>
                 </div>
             </a>
         </div>
     </div>
 </nav>