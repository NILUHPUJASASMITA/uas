<?php
include "koneksi.php";
session_start();
$login = $_SESSION['login'];
if ($_login == "admin"){
    header("location:admin/home.php");
}elseif ($_login == "user"){
    header("location:user/home.php");
}else {
    header("location:login.php");
}
?>