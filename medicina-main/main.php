<?php
if(isset($_GET['page'])){
    $page=$_GET['page'];
    switch ($page) {
        case "login":
            require_once("loginpage.php");
            break;
        case "attivita":
            require_once("attivita.php");
            break;
        case "unita":
            require_once("unita.php");
            break;
        case "gestioneattivita":
            require_once("gestioneattivita.php");
            break;
        case "gestioneunita":
            require_once("gestioneunita.php");
            break;
        default:
            require_once("404.php");
            break;
    }
}
?>