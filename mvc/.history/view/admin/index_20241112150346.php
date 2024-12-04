<?php
$act = $_GET['admin'] ?? 'home';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

switch ($act) {
    case 'home':
        include 'home.php';
        break;
    case 'categoryList':
        include './category/list.php';
        break;
}
