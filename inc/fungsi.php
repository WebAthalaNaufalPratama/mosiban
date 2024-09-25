<?php
class monitoring
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
    
    function nama_tanaman()
    {
        $link = $this->koneksi();
        $q = mysqli_query($link, "SELECT tanaman FROM plant_user WHERE  SN=\"$sn\"");
        $d = mysqli_fetch_row($q);
        return $d[0];
    }
    function tgl_balik($date_recv)
    {
        $e = explode("-", $date_recv);
        $thn = $e[0];
        $bln = $e[1];
        $tgl = $e[2];
        $date_new = "$tgl-$bln-$thn";
        return $date_new;
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

    function tgl_wingi($tgl_saiki)
    {
        $tgl = date('Y-m-d', (strtotime('-1 day', strtotime($tgl_saiki))));
        return $tgl;
    }
}
