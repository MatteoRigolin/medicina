<?php

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Medicina</title>
    <link rel="icon" href="assets/svg/book2.svg" type="image/svg+xml">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="" id="header">
        <?php
            require_once("header.php");
        ?>
    </div>
    <div class="container-fluid" id="main">
        <?php require_once("main.php"); ?>
    </div>
    <div class="container-fluid" id="footer">
        <?php
            require_once("footer.php");
        ?>
    </div>
</body>

</html>