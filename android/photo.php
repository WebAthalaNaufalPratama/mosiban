<?php
   
    $image = base64_decode($_POST['foto_profil']);
    $namaimage =  rand(1, 10000);
 
    $targer_dir = "img/".$namaimage.".jpeg";
    if (file_put_contents($targer_dir, $image)) {
        echo json_encode(array('response'=>'Success'));
    }else{
        echo json_encode(array("response" => "Image not uploaded"));
    }
?>