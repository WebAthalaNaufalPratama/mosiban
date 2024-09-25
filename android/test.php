<?php
$koneksi = mysqli_connect("localhost","u1041609_sedimen","*S3d1m3nt#","u1041609_tank_sedimen");
if($_SERVER['REQUEST_METHOD']=='GET') {
  $sql = "SELECT * FROM login ORDER BY username ASC";
  $res = mysqli_query($koneksi,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('username'=>$row[0], 'password'=>$row[1], 'nama'=>$row[2], 'no_hp'=>$row[4], 'foto_profil'=>$row[5], 'alamat'=>$row[6], 'kota'=>$row[7]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}
?>