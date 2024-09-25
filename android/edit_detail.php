<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$kota = $_POST['kota'];
	$foto_profil = $_POST['foto_profil'];
    
    $file_path = "../img/$foto_profil";
    file_put_contents($file_path, base64_decode($foto_profil));
    
    $koneksi = mysqli_connect("localhost","u1041609_sedimen","*S3d1m3nt#","u1041609_tank_sedimen");

    $sql = "UPDATE login SET nama='$nama', no_hp='$no_hp', alamat='$alamat', kota='$kota', foto_profil = '$file_path' WHERE username='$username' ";

    if(mysqli_query($koneksi, $sql)) {

          $result["success"] = "1";
          $result["message"] = "success";

          echo json_encode($result);
          mysqli_close($koneksi);
      }
  }

else{

   $result["success"] = "0";
   $result["message"] = "error!";
   echo json_encode($result);

   mysqli_close($koneksi);
}

?>