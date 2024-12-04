<?php
$client = $_GET['act'] ?? 'home';
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
switch ($act) {
    case 'home':
        include 'home.php';
        break;
    case 'login':
        include 'login.php';
        break;
}
