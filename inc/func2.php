<?php
class sedimen
{
    function koneksi()
    {
        $link = mysqli_connect("localhost", "u968599804_sedimen", "*S3d1m3nt#", "u968599804_tank_sedimen");
        return $link;
    }
    // function koneksi() {
    //     $host = "localhost";
    //     $username = "root";
    //     $password = "";
    //     $database = "tank_sedimen";
    
    //     // Membuat koneksi ke basis data
    //     $link = new mysqli($host, $username, $password, $database);
    
    //     // Periksa apakah koneksi berhasil
    //     if ($link->connect_error) {
    //         die("Koneksi Gagal: " . $link->connect_error);
    //     }
    
    //     return $link;
    // }

    function level($username)
    {
        $link = $this->koneksi();
        $q = mysqli_query($link, "SELECT level FROM login WHERE username=\"$username\"");
        $d = mysqli_fetch_row($q);
        return $d[0];
    }
    
     function tgl_balik($date)
    {
        $e = explode("-", $date);
        $thn = $e[0];
        $bln = $e[1];
        $tgl = $e[2];
        $date_new = "$tgl-$bln-$thn";
        return $date_new;
    }

    function tgl_wingi($tgl_saiki)
    {
        $tgl = date('Y-m-d', (strtotime('-1 day', strtotime($tgl_saiki))));
        return $tgl;
    }

    function tglWalikIn($awal)
    {
        //$tgl=substr($awal,-2);
        $tgl = substr($awal, 8, 2);
        $bln = substr($awal, 5, 2);
        $thn = substr($awal, 0, 4);

        $tanggal = "$tgl-$bln-$thn";
        return $tanggal;
    }
    
    function user_to_sn($username)
    {
        global $link;
        $q = mysqli_query($link, "SELECT sn FROM produk WHERE username=\"$username\"");
        $d = mysqli_fetch_row($q);
        return $d[0];
    }
}
