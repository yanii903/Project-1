<?php
$client = $_GET['client'] ?? 'home';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
switch ($client) {
    case 'home':

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
