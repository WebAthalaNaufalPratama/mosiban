<?php

$connection = null;

try{
    //Config
    $host = "localhost";
    $username = "u1041609_sedimen";
    $password = "*S3d1m3nt#";
    $dbname = "u1041609_tank_sedimen";

    //Connect
    $database = "mysql:dbname=$dbname;host=$host";
    $connection = new PDO($database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // if($connection){
    //     echo "Koneksi Berhasil";
    // } else {
    //     echo "Gagal gan";
    // }


} catch (PDOException $e){
    echo "Error ! " . $e->getMessage();
    die;
}

?>