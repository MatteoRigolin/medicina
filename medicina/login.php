<?php
session_start();
if (count($_SESSION) > 0)
{
    header('Location: index.php?page=1');
    exit();
};
?>