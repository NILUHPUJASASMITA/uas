<?php
include "../../koneksi.php";
if(!empty($_FILES['photos']['name'])){
    $target_dir = "../../media/";
    $photos= basename($_FILES["photos"]["name"]);
    $target_file = $target_dir.$photos;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["photos"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["photos"]["size"] > 500000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["photos"]["tmp_name"], $target_file)) {
        //echo "The file ". htmlspecialchars( basename( $_FILES["photos"]["name"])). " has been uploaded.";
        $_POST['photos']=$photos;
        if(isset($_POST['photos_old']) && $_POST['photos_old']!=''){
            unlink($target_dir.$_POST['photos_old']);
        }else{
            echo "Succses";
        }
    } else {
        //echo "Sorry, there was an error uploading your file.";
        $err["photos"]="Sorry";
    }
    }
    }
if(isset($_POST['tambah'])) {
    $insertSql = mysqli_query($conf, "INSERT into mhs(id_dosen,nm_dsn,nip,alamat,id_mk) values('$_POST[id_dosen]','$_POST[nm_dsn]','$_POST[nip]','$_POST[alamat]','$_POST[id_mk]')");
    if ($insertSql){
        echo "<script type='text/javascript'>alert('Data berhasil disimpan...!'); location.href=\"home.php\" ;</script>";              

    }else{
        echo "<script type='text/javascript'>alert('Salah'); location.href=\"tambah.php\" ;</script>";  
    }
}
?>

