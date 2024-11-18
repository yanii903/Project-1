<?php
$act = $_GET['act'] ?? 'client';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
if ($act === 'admin') {
    // Nếu act là admin, chuyển hướng đến index của admin
    include 'view/admin/index.php';
} else {
    // Nếu không phải admin, mặc định là client
    include 'view/client/index.php';
}
// include 'view/client/home.php'
