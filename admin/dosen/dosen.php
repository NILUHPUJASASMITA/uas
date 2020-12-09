<?php
include "../../koneksi.php";
session_start();
$tampil = mysqli_query($conf, "SELECT * FROM dosen, matakuliah WHERE dosen.id_dosen = matakuliah.id_mk");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data Dosen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"type="text/css" href="../../css/bootstrap.min.css">
  <script type="text/javascript"src="../../js/bootstrap.min.js"></script>
</head>
<body class="dosen"><img src="https://ibb.co/BnkRPzc" alt="">
​
<div class="container">
  <h2>Data Dosen</h2>
  <p>Selamat Datang <b><?php echo $_SESSION['nama']; ?></b>,  Silahkan Mengelola Data Dosen di Bawah ini...!        </p>
  <p> <a href="tambah dosen.php"><button type="button" class="btn btn-primary">Tambah Data</button></a><p>
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIP</th>
        <th>Alamat</th>
        <th>Mata kuliah</th>
        <th>Action</th>
     </tr>
     </thead>
     <tbody>
     <?php
      $no=1;
     while($r=mysqli_fetch_array($tampil)){
       echo
       "<tr>
          <td>$no</td>
          <td>$r[nama_dsn]</td>
          <td>$r[nip]</td>
          <td>$r[alamat]</td>
          <td>$r[namamk]</td>
          <td>
          <a href='edit-dosen.php?id=$r[id_dosen]'> <button type='button' class='btn btn-success btn-sm'>Edit</button></a>
          <a href='hapus-dosen.php?id=$r[id_dosen]'> <button type='button'class='btn btn-warning btn-sm'>hapus</button></a>
          </td>
          </tr>";
          $no++;
        }
     ?>
    </tbody>
  </table>
  <p><a href="../../logout.php"><button type="button" class="btn btn-secondary">Logout</button></a>
  <button type="button" class="btn btn-secondary" onclick="self.history.back()">Kembali</button>
<p>
</div>
</body>
</html>

