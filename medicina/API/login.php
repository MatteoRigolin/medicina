<?php
require_once("../utils.php");
session_start();

// print_r($_POST);

if (isset($_POST["mail"]) == true && isset($_POST["password"]) == true) {
    if ($_POST["mail"] == "ad@gmail.com" && $_POST["password"] == "1234") {
        $_SESSION['logged_in'] = true;
        Redirect('http://localhost/medicina');
    }
}
?>