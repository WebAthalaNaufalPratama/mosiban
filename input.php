<?php
//set waktu 
date_default_timezone_set("Asia/Jakarta");

include "inc/func.php";
$sedi = new sedimen;
$link = $sedi->koneksi();

$curah_hujan = $_GET['curah_hujan'];
$tanggal = $_GET['tanggal'];
$waktu = $_GET['waktu'];
$sn = $_GET['sn'];
// $lokasi = $_GET['lokasi'];

function datediff($awal, $akhir)
{
    $awal = strtotime($awal);
    $akhir = strtotime($akhir);
    $diff_secs = abs($awal - $akhir);
    return array("Secon_total" => floor($diff_secs));
}

$awal  = ("$tanggal $waktu");
$akhir = date("Y-m-d H:i:s");
$selisih   = datediff($awal, $akhir);
$delay  = $selisih['Secon_total'];
//menghitung sed sim
$q = mysqli_query($link, "SELECT Ha, ha1, a1, Ch, ha2, a2 FROM debit_sedimen WHERE lokasi='Semarang' ORDER BY id DESC");
$d = mysqli_fetch_row($q);
$Ha = $d[0];
$ha1 = $d[1];
$a1 = $d[2];
$Ch = $d[3];
$ha2 = $d[4];
$a2 = $d[5];

$sed1 = ((($Ha + $curah_hujan) * $Ch) - $ha1) * $a1;
$sed2 = ((($Ha + $curah_hujan) * $Ch) - $ha2) * $a2;

if($curah_hujan > 0) $sed_sim = $sed1 + $sed2;

//input data di tabel moni kiriman dari ESP8266/ESP32
mysqli_query($link, "INSERT into curah_hujan(sn,curah_hujan,tanggal,waktu,tanggal_server,waktu_server,lokasi,sed_sim,delay) values ('$sn','$curah_hujan','$tanggal','$waktu',CURDATE(),CURTIME(),'Semarang','$sed_sim','$delay')");
// echo "INSERT into curah_hujan(sn,curah_hujan,tanggal,waktu,tanggal_server,waktu_server,lokasi,sed_sim,delay) values ('$sn','$curah_hujan','$tanggal','$waktu',CURDATE(),CURTIME(),'Kendal','$sed_sim','$delay')";
if (mysqli_affected_rows($link) > 0) {
    $msg = "masuk";
} else {
    $msg = "gagal";
}
echo json_encode($msg);
