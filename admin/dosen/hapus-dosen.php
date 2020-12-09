<?php
include "../../koneksi.php";
if (isset($_GET['id'])){
    $deleteSql = mysqli_query($conf, "DELETE FROM dosen WHERE id_dosen= '$_GET[id]'");
    if ($deleteSql){
        echo "<script type='text/javascript'>alert('Data berhasil dihapus...!'); location.href=\"dosen.php\" ;</script>";              
    }
}
?>