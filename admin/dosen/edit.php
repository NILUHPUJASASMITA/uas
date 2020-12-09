<?php
session_start();
if (isset($_SESSION['login_in'])) {

  include "../../koneksi.php";
  if (isset($_GET['id'])){
    $tampildosen = mysqli_query($conf,"SELECT * FROM dosen WHERE id_dosen = '$_GET[id]'");
    $dosen = mysqli_fetch_array($tampildosen);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> Edit Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"type="text/css" href="../../css/bootstrap.min.css">
  <script type="text/javascript"src="../../js/bootstrap.min.js"></script>
</head>
<body>

​<div class="container">
  <h2>Edit Data</h2>
  <p>Silahkan Mengedit Data Mahasiswa Pada Form di Bawah Ini</p>
  <form action="edit-fungsi.php" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
    <div class="form-group">
      <label for="nama_dsn">Nama:</label>
      <input type="text" class="form-control" id="nama_dsn" placeholder="Nama Lengkap Anda" name="nama_dsn" value= "<?php echo $dosen['nama_dsn']; ?>"required>
      <div class="valid-feedback">OK</div>
      <div class="invalid-feedback">Nama Harus di isi</div>
    </div>
    <div class="form-group">
      <label for="Nip">NIP:</label>
      <input type="number" class="form-control" id="nip" placeholder="NIP tanpa titik" name="nip" value= "<?php echo $dosen['nip']; ?>"required>
      <div class="valid-feedback">OK.</div>
      <div class="invalid-feedback">NIP harus berupa angka</div>
    </div>
    <div class="form-group">
      <label for="Alamat">Alamat :</label>
      <input type="text" class="form-control" id="alamat" placeholder="NIP tanpa titik" name="alamat" value= "<?php echo $dosen['alamat']; ?>"required>
      <div class="valid-feedback">OK.</div>
      <div class="invalid-feedback">NIP harus berupa angka</div>
    </div>
<div class="form-group">
  <label for="sel1">Mata Kuliah:</label>
  <select class="form-control" id="sel1" name="id_mk" required>
    <?php
      $tampil = mysqli_query($conf, "SELECT * FROM matakuliah ORDER BY id_mk");
      while ($w = mysqli_fetch_array($tampil)){
        if ($dosen ['id_mk'] == $w['id_mk']) {
           echo "<option value=$w[id_mk]selected>$w[namamk]</option>";
        }else {
          echo "<option value=$w[id_mk]>$w[namamk]</option>";
        }
      }
      ?>
     </select>
    <button type="submit" class="btn btn-primary" name="edit">Simpan</button>
    <button type="button" class="btn btn-secondary"onclick="self.history.back()">Cancel</button>
    <input type="hidden" name="id_dosen" value="<?php echo $dosen['id_dosen']; ?>">
  </form>
</div>
<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</body>
</html>
​<?php
}else{
  header("location:../../index.php");
}
?>
