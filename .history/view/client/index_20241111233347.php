<?php
$client = $_GET['client'] ?? 'home';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$this->SanPham = new SpQuery();
$this->danhMuc = new DMQuery();
$this->SanPham02 = new SpQuery();
switch ($client) {
    case 'home':
        $productList =
            include 'home.php';
        break;
    case 'login':
        include 'login.php';
        break;
    case 'detail':
        include 'productDetail.php';
        break;
    case 'register':
        include 'register.php';
        break;
}
