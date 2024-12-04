<?php
include 'view/admin/nav.php';
?>
<div class="wrapper">
    <aside>
        <div class="brand">Admin Panel</div>
        <div class="side-bar">
            <details>
                <summary>Menu</summary>
                <ul>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Orders</a></li>
                    <li><a href="#">Customers</a></li>
                </ul>
            </details>
        </div>
    </aside>
    <article>
        <h1>Thêm Sản Phẩm</h1>
        <div class="form-container">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Nhập Tên:</label>
                    <input type="text" class="form-control" name="name" id="name">
                    <span class="text-danger"><?= $thongBaoLoiTen ?></span>
                </div>

                <div class="form-group">
                    <label for="image">Nhập Ảnh:</label>
                    <input type="text" class="form-control" name="image" id="image">
                    <span class="text-danger"><?= $thongBaoLoiAnh ?></span>
                </div>

                <div class="form-group">
                    <label for="price">Nhập Giá:</label>
                    <input type="number" class="form-control" name="price" id="price">
                    <span class="text-danger"><?= $thongBaoLoiGia ?></span>
                </div>

                <div class="form-group">
                    <label for="quantity">Nhập Số Lượng:</label>
                    <input type="number" class="form-control" name="quantity" id="quantity">
                    <span class="text-danger"><?= $thongBaoLoiSoLuong ?></span>
                </div>

                <div class="form-group">
                    <label for="describe">Nhập Mô Tả:</label>
                    <input type="text" class="form-control" name="describe" id="describe">
                    <span class="text-danger"><?= $thongBaoLoiMoTa ?></span>