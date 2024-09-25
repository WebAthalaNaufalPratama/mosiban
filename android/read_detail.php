<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    $username = $_POST['username'];

    $con = $koneksi = mysqli_connect("localhost","u1041609_sedimen","*S3d1m3nt#","u1041609_tank_sedimen");

    $sql = "SELECT * FROM login WHERE username='$username' ";

    $response = mysqli_query($con, $sql);

    $result = array();
    $result['read'] = array();

    if( mysqli_num_rows($response) === 1 ) {
        
        if ($row = mysqli_fetch_assoc($response)) {
 
             $h['nama']      = $row['nama'] ;
             $h['username']  = $row['username'] ;
			 $h['no_hp']     = $row['no_hp'];
			 $h['alamat']	 = $row['alamat'];
			 $h['foto_profil'] = $row['foto_profil'];
 
             array_push($result["read"], $h);
 
             $result["success"] = "1";
             echo json_encode($result);
        }
 
   }
 
 }else {
 
     $result["success"] = "0";
     $result["message"] = "Error!";
     echo json_encode($result);
 
     mysqli_close($con);
 }
 
 ?>