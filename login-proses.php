<?php
include "koneksi.php";
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $admin=$conf->query($query);
    if ($admin->num_rows!==0) {
        $get = $admin->fetch_array();
        $level =$get['level'];
        $nama =$get['nm_admin'];
        $_SESSION['nama'] = $nama;
        $_SESSION['login_in'] = $username;
        if($level == "admin") {
            echo "<script type= 'text/javascript'>alert('selamat datang $level'); location.href=\"admin/pilihan.php\" ;</script>";              
            }elseif ($level == "user"){
            echo "<script type= 'text/javascript'>alert('selamat datang $level');  location.href=\"user/home.php\" ;</script>";
            }
    } else {
        echo "<script type= 'text/javascript'>alert('selamat datang $level'); location.href=\"user/home.php\"
        ;</script>";  
    }
}else {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM mhs WHERE username = '$username' AND password = '$password'";
    $admin=$conf->query($query);
    if ($admin->num_rows!==0) {
        $get = $admin->fetch_array();
        $level =$get['level'];
        $nama =$get['nm_admin'];
        $_SESSION['nama'] = $nama;
        $_SESSION['login_in'] = $username;
        if($level == "admin") {
            echo "<script type= 'text/javascript'>alert('selamat datang $level'); location.href=\"admin/home.php\" ;</script>";              
            }elseif ($level == "user"){
            echo "<script type= 'text/javascript'>alert('selamat datang $level');  location.href=\"user/home.php\" ;</script>";
            }
    } else {
        echo "<script type= 'text/javascript'>alert('selamat datang $level'); location.href=\"user/home.php\"
        ;</script>";  
    }
}
?>