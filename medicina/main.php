<?php
$page = $_GET['page'];
switch ($page) {
    case 0:
        echo "login";
        break;
    case 1:
        echo "attività didattiche";
        break;
    case 2:
        echo "edit attività";
        break;
    case 3:
        echo "unità formativa";
        break;
    case 4:
        echo "edit unità";
        break;
    default:
        include("content-404.php");
}
?>