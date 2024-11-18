<?php
$act = $_GET['act'] ?? 'client';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
if ($act === 'admin') {
    // Nếu act là admin, chuyển hướng đến index của admin
    include './admin/index.php';
} else {
    // Nếu không phải admin, mặc định là client
    include './client/index.php';
}
// include 'view/client/home.php'
