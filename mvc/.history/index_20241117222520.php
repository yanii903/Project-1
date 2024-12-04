<?php
session_start();
$act = $_GET['act'] ?? 'client';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
switch ($act) {
    case 'client':
        include 'view/client/index.php';
        break;
    case 'admin':
        include 'view/admin/index.php';
        break;
    case 'logout':
        include '../mvc/view/client/login/logout.php';
        break;
}
// include 'view/client/home.php'
