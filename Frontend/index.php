<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
?>
<?php require "templates/header.php"; ?>

<?php include "templates/alert.php"; ?>

<?php include "templates/index/login.php"; ?>

<?php require "templates/footer.php"; ?>