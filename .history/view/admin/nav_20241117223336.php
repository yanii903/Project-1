<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ?client=login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="view/assets/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

</head>

<body>
    <nav>
        <a class="ctrl" href="?act=admin"><i class="fa-brands fa-windows"></i> Adminitrator</a>
        <ul class="nav-bar">
            <li>
                <a class="nav-item" href="?act=client"><i class="fa-solid fa-arrow-left-long"></i> Vào Website</a>
            </li>
            <li>
                <a class="nav-item" href="?act=logout"><i class="fa-solid fa-arrow-right-to-bracket"></i> Đăng Xuất</a>
            </li>
        </ul>
    </nav>
    <aside>
        <div class="side-bar">
            <details>
                <summary><i class="fa-solid fa-list"></i> Quản Trị Danh Mục</summary>
                <ul>
                    <li>
                        <a href="?act=admin&admin=categoryAdd"><i class="fa-solid fa-plus"></i> Thêm Danh Mục</a>
                    </li>
                    <li>
                        <a href="?act=admin&admin=categoryList"><i class="fa-solid fa-list-ol"></i> Danh Sách Danh Mục</a>
                    </li>
                </ul>
            </details>

            <details id="sanPham">
                <summary><i class="fa-brands fa-dropbox"></i> Quản Trị Sản Phẩm</summary>
                <ul>
                    <li>
                        <a href="?act=admin&admin=productAdd"><i class="fa-solid fa-plus"></i> Thêm Sản Phẩm</a>
                    </li>
                    <li>
                        <a href="?act=admin&admin=productList"><i class="fa-solid fa-list-ol"></i> Danh Sách Sản Phẩm</a>
                    </li>
                </ul>
            </details>

            <details id="taiKhoan">
                <summary><i class="fa-solid fa-user"></i> Quản Trị Tài Khoản</summary>
                <ul>
                    <li>
                        <a href="?act=admin&admin=accountAdd"><i class="fa-solid fa-plus"></i> Thêm Tài Khoản</a>
                    </li>
                    <li>
                        <a href="?act=admin&admin=accountList"><i class="fa-solid fa-list-ol"></i> Danh Sách Tài Khoản</a>
                    </li>
                </ul>
            </details>

            <details id="binhLuan">
                <summary><i class="fa-regular fa-comment-dots"></i> Quản Trị Bình Luận</summary>
                <ul>
                    <li>
                        <a href="#"><i class="fa-solid fa-list-ol"></i> Danh Sách Bình Luận</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-regular fa-pen-to-square"></i> Cập Nhật Bình Luận</a>
                    </li>
                </ul>
            </details>

            <details id="slider">
                <summary><i class="fa-regular fa-image"></i> Quản Trị Slider</summary>
                <ul>
                    <li>
                        <a href="#"><i class="fa-solid fa-plus"></i> Thêm Slider</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-list-ol"></i> Danh Sách Slider</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-regular fa-pen-to-square"></i> Cập Nhật Slider</a>
                    </li>
                </ul>
            </details>

            <details id="thongKe">
                <summary><i class="fa-solid fa-chart-line"></i> Thống Kê</summary>
                <ul>
                    <li>
                        <a href="#"><i class="fa-solid fa-chart-line"></i> Thống Kê</a>
                    </li>
                </ul>
            </details>
        </div>
    </aside>
</body>

</html>