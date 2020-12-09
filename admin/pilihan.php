<?php
include "../koneksi.php";
session_start();
$tampil = mysqli_query($conf, "SELECT * FROM mhs, kelas WHERE kelas.id_kelas = mhs.id_kelas");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet"type="text/css" href="style.css">
    <script type="text/javascript"src="../js/bootstrap.min.js"></script>
    <title>BERANDA</title>
</head>
<body>
<div class="content">
	<div class="menu">
		<ul>
			<li><h1></h1><a href="home.php">DATA MAHASISWA</a><h1></h1></li>
			<li><h1></h1><a href="dosen/dosen.php">DATA DOSEN</a><h1></h1></li>
		</ul>
	</div>
</div>
</body>
</html>