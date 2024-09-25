<?php
include "func.php";
$sa = new sedimen();
$link = $sa->koneksi();
// session_start();

if (isset($_POST['p'])) {
    $p = $_POST['p'];
    // print_r($p);
    if ($p == "signup") {
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        // $url = 'https://www.google.com/recaptcha/api/siteverify';
        $secret = "6LfSG9oZAAAAAEIFE-j0-2FxcdgLykZM1EGzsByR";
        $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        $response = json_decode($verify);
        // print_r($verify);
        // $nilaiCaptcha = ($_POST['nilaiCaptcha']);
        // if ($_SESSION['code'] != $_POST['nilaiCaptcha']) {
        //     $status = "captcha salah";
        // } else {  
        // }
        // echo "sesikode=" . $_SESSION['code'];
        // echo "sesikode=" . $_SESSION['code'];
        //&& $_SESSION['code'] = $_POST['nilaiCaptcha']


        //cek email sdh ada atau blm
        $q = mysqli_query($link, "SELECT username FROM login WHERE username=\"$email\"");
        $j = mysqli_num_rows($q);

        if ((empty($j)) && ($response->success == true)) { //jika email blm dipake sbg username
            //insert 
            mysqli_query($link, "INSERT INTO login(username, password, nama, no_hp, level) VALUE ('$email','$password','$nama','$telp','farmer')");
            $status = "masuk";

            //console.log('masuk kan');
        }
        // else if ((empty($j)) && ($response->success == false)) {
        //     $status = "tidak ada";
        // } 
        else {
            $status = "sudah_ada";
            //jika sudah ada

        }
        echo json_encode($status);
        // echo json_encode($response);
    }

    //login //
    elseif ($_POST['p'] == "login-btn") {
        $username = $_POST['email'];
        $password = md5($_POST['password']);

        $q = mysqli_query($link, "SELECT username FROM login WHERE username=\"$username\" AND password=\"$password\"");
        $j = mysqli_num_rows($q);

        if (empty($j)) {
            $msg = "gakbener";
        } else {
            session_start();
            $_SESSION['username'] = $username;
            $msg = "bener";
        }

        echo json_encode($msg);
    } elseif ($_POST['p'] == "uplod") {
        $filename = $_FILES['file']['name'];

        /* Location*/
        $location = "../img/" . $filename;
        $uploadOk = 1;
        $imageFileType = pathinfo($location, PATHINFO_EXTENSION);

        /*Valid Extensions*/
        $valid_extensions = array("jpg", "jpeg", "png");
        /* Check file extension */
        if (!in_array(strtolower($imageFileType), $valid_extensions)) {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo 0;
        } else {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                echo $location;
            } else {
                echo 0;
            }
        }
    }

    //manage user
    elseif ($_POST['p'] == "manageuser") {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $nama = $_POST['nama'];
        $level = $_POST['level'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $foto_profil = $_POST['foto_profil'];

        mysqli_query($link, "INSERT INTO login(username, password, nama, level, no_hp, alamat, kota, foto_profil) VALUE ('$email','$password','$nama','$level','$no_hp','$alamat','$kota','../img/$foto_profil')");

        if (mysqli_affected_rows($link) > 0) {
            $msg = "masuk";
        } else {
            $msg = "gagal";
        }
        echo json_encode($msg);
    }

    // menampilkan user //
    elseif ($_POST['p'] == "userlist") {
        $q = mysqli_query($link, "SELECT username, nama, level, no_hp, alamat, kota, foto_profil from login ORDER BY username ASC");
        // echo "SELECT username, nama, level, no_hp, alamat, kota, foto_profil from login ORDER BY username ASC";
        while ($d = mysqli_fetch_row($q)) {
            $username[] = $d[0];
            $nama[] = $d[1];
            $level[] = $d[2];
            $no_hp[] = $d[3];
            $alamat[] = $d[4];
            $kota[] = $d[5];
            $foto_profil[] = $d[6];
        }
        $daftar = array('username' => $username, 'nama' => $nama, 'level' => $level, 'no_hp' => $no_hp, 'alamat' => $alamat, 'kota' => $kota, 'foto_profil' => $foto_profil);
        echo json_encode($daftar);
    }

    //search user//
    elseif ($_POST['p'] == "search") {
        $search = $_POST["search"];
        $q = mysqli_query($link, "SELECT username, nama, level, no_hp, alamat, kota, foto_profil FROM login WHERE username LIKE '%" . $search . "%'");
        while ($d = mysqli_fetch_row($q)) {
            $username[] = $d[0];
            $nama[] = $d[1];
            $level[] = $d[2];
            $no_hp[] = $d[3];
            $alamat[] = $d[4];
            $kota[] = $d[5];
            $foto_profil[] = $d[6];
        }
        $daftar = array('username' => $username, 'nama' => $nama, 'level' => $level, 'no_hp' => $no_hp, 'alamat' => $alamat, 'kota' => $kota, 'foto_profil' => $foto_profil);
        echo json_encode($daftar);
    }

    // edit user //
    elseif ($_POST['p'] == "edituser") {
        $username = $_POST['username'];
        $q = mysqli_query($link, "SELECT username, password, nama, level, no_hp, alamat, kota, foto_profil from login WHERE username=\"$username\"");
        while ($d = mysqli_fetch_row($q)) {
            $username = $d[0];
            $password = $d[1];
            $nama = $d[2];
            $level = $d[3];
            $no_hp = $d[4];
            $alamat = $d[5];
            $kota = $d[6];
            $foto_profil[] = $d[7];
        }
        $daftar = array('username' => $username, 'password' => $password, 'nama' => $nama, 'level' => $level, 'no_hp' => $no_hp, 'alamat' => $alamat, 'kota' => $kota, 'foto_profil' => $foto_profil);
        echo json_encode($daftar);
    }

    // update user //
    elseif ($_POST['p'] == "update") {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $foto_profil = $_POST['foto_profil'];
        $q = mysqli_query($link, "UPDATE login SET username='$email',password='$password',nama='$nama',no_hp='$no_hp',alamat='$alamat',kota='$kota',foto_profil='../img/$foto_profil' WHERE username=\"$email\"");
        if (mysqli_affected_rows($link) > 0) {
            $msg = "edited";
        } else {
            $msg = "fail";
        }
        echo json_encode($msg);
    }

    // menghapus user //
    elseif ($_POST['p'] == "hapus") {
        $username = $_POST['username'];
        $q = mysqli_query($link, "DELETE FROM login WHERE username=\"$username\"");
        if (mysqli_affected_rows($link) > 0) {
            $msg = "deleted";
        } else {
            $msg = "fail";
        }
        echo json_encode($msg);
    }

    //menampilkan data debit sedimen//
    elseif ($_POST['p'] == "daftardebitsedimen") {
        $q = mysqli_query($link, "SELECT id, Ha, ha1, a1, Ch, ha2, a2, a0, lokasi, tanggal, waktu from debit_sedimen ORDER BY tanggal DESC");
        // echo "SELECT username, nama, level, no_hp, alamat, kota, foto_profil from login ORDER BY username ASC";
        while ($d = mysqli_fetch_row($q)) {
            $id[] = $d[0];
            $Ha[] = $d[1];
            $ha1[] = $d[2];
            $a1[] = $d[3];
            $Ch[] = $d[4];
            $ha2[] = $d[5];
            $a2[] = $d[6];
            $a0[] = $d[7];
            $lokasi[] = $d[8];
            $tanggal[] = $d[9];
            $waktu[] = $d[10];
        }
        $daftar = array('id' => $id, 'Ha' => $Ha, 'ha1' => $ha1, 'a1' => $a1, 'Ch' => $Ch, 'ha2' => $ha2, 'a2' => $a2, 'a0' => $a0, 'lokasi' => $lokasi, 'tanggal' => $tanggal, 'waktu' => $waktu);
        echo json_encode($daftar);
    }

    //search debit sedimen//
    elseif ($_POST['p'] == "search_debit") {
        $search = $_POST["search_debit"];
        $q = mysqli_query($link, "SELECT id, Ha, ha1, a1, Ch, ha2, a2, a0, lokasi, tanggal, waktu FROM debit_sedimen WHERE id LIKE '%" . $search . "%'");
        while ($d = mysqli_fetch_row($q)) {
            $id[] = $d[0];
            $Ha[] = $d[1];
            $ha1[] = $d[2];
            $a1[] = $d[3];
            $Ch[] = $d[4];
            $ha2[] = $d[5];
            $a2[] = $d[6];
            $a0[] = $d[7];
            $lokasi[] = $d[8];
            $tanggal[] = $d[9];
            $waktu[] = $d[10];
        }
        $daftar = array('id' => $id, 'Ha' => $Ha, 'ha1' => $ha1, 'a1' => $a1, 'Ch' => $Ch, 'ha2' => $ha2, 'a2' => $a2, 'a0' => $a0, 'lokasi' => $lokasi, 'tanggal' => $tanggal, 'waktu' => $waktu);
        echo json_encode($daftar);
    }

    //menampilkan profile
    elseif ($_POST['p'] == "profile") {
        $username = $_POST['username'];
        $q = mysqli_query($link, "SELECT username, password, nama, level, no_hp, alamat, kota, foto_profil FROM login WHERE username=\"$username\"");
        while ($d = mysqli_fetch_row($q)) {
            $username = $d[0];
            $password = $d[1];
            $nama = $d[2];
            $level = $d[3];
            $no_hp = $d[4];
            $alamat = $d[5];
            $kota = $d[6];
            $foto_profil = $d[7];
        }
        $daftar = array('username' => $username, 'password' => $password, 'nama' => $nama, 'level' => $level, 'no_hp' => $no_hp, 'alamat' => $alamat, 'kota' => $kota, 'foto_profil' => $foto_profil);
        echo json_encode($daftar);
    } elseif ($_POST['p'] == "ambil_data") {
        // $sn = $_POST['sn'];
        // $produk_tipe = $_POST['produk_tipe'];

        // if ($produk_tipe == "Autofan") {
        $q = mysqli_query($link, "SELECT sed_sim, tanggal, waktu, curah_hujan, lokasi from curah_hujan order by id DESC limit 1");
        while ($d = mysqli_fetch_row($q)) {
            $sed_sim = $d[0];
            $tanggal = $d[1];
            $waktu = $d[2];
            $curah_hujan = $d[3];
            $lokasi = $d[4];
        }
        $data = array('sed_sim' => $sed_sim, 'tanggal' => $tanggal, 'waktu' => $waktu, 'curah_hujan' => $curah_hujan, 'lokasi' => $lokasi);
        echo json_encode($data);
    }
    // menghapus user //
    elseif ($_POST['p'] == "dummy") {
        $curah_hujan = $_POST['curah_hujan'];
        $tanggal = $_POST['tanggal'];
        $waktu = $_POST['waktu'];
        $lokasi = $_POST['lokasi'];

        $q = mysqli_query($link, "SELECT Ha, ha1, a1, Ch, ha2, a2 FROM debit_sedimen WHERE lokasi='$lokasi' ORDER BY id DESC");
        $d = mysqli_fetch_row($q);
        $Ha = $d[0];
        $ha1 = $d[1];
        $a1 = $d[2];
        $Ch = $d[3];
        $ha2 = $d[4];
        $a2 = $d[5];
        $sed1 = ((($Ha + $curah_hujan) * $Ch) - $ha1) * $a1;
        $sed2 = ((($Ha + $curah_hujan) * $Ch) - $ha2) * $a2;
        $sed_sim = $sed1 + $sed2;

        mysqli_query($link, "INSERT INTO curah_hujan(curah_hujan, tanggal, waktu, tanggal_server, waktu_server, lokasi, sed_sim) VALUE ('$curah_hujan','$tanggal','$waktu', CURDATE(), CURTIME(), '$lokasi', '$sed_sim')");
        if (mysqli_affected_rows($link) > 0) {
            $msg = "masuk";
        } else {
            $msg = "gagal";
        }
        echo json_encode($msg);
    }
} else if (isset($_GET['j'])) {
    $produk_tipe = $_GET['j'];

    if ($produk_tipe == 'realtime') { //buat data realtime dynamic chart 
        $q = mysqli_query($link, "SELECT sed_sim, tanggal, waktu, curah_hujan from curah_hujan order by id DESC limit 1");
        $d = mysqli_fetch_row($q);
        $sed_sim = $d[0];
        $tanggal = $d[1];
        $waktu = $d[2];
        $curah_hujan = $d[3];

        $data = array('sed_sim' => $sed_sim, 'tanggal' => $tanggal, 'waktu' => $waktu, 'curah_hujan' => $curah_hujan);
        echo json_encode($data);
    } elseif ($produk_tipe == 'realtime_awal') { //buat data realtime dynamic chart untuk data awal

        $rows1 = array();
        $rows1['name'] = 'Curah Hujan';
        //$q = mysqli_query($link, "SELECT sed_sim, tanggal, waktu, curah_hujan from curah_hujan order by id DESC limit 20");

        $qj = mysqli_query($link, "SELECT id FROM curah_hujan ORDER BY id DESC LIMIT 1");
        $dj = mysqli_fetch_row($qj);
        $j = $dj[0];
        $j1 = $j - 20;
        //echo "j: $j, j1: $j1 --> SELECT tanggal,waktu,curah_hujan from curah_hujan order by id ASC limit $j1,$j";
        $q = mysqli_query($link, "SELECT tanggal,waktu,curah_hujan from curah_hujan order by id ASC limit $j1,$j");
        while ($d = mysqli_fetch_row($q)) {
            //$wkt_ms=strtotime("$d[0]T$d[1]")*1000;
            $rows1['data'][] = [$d[1], $d[2]];
            // $rows1['data'][] = $d[1];
            // $rows1['data'][] = $d[2];
            // $rows1['data'][] = $d[3];
        }
        //   echo "SELECT tanggal,waktu,curah_hujan from curah_hujan order by id ASC limit $j1,$j"; 
        $result = array();
        //array_push($result,$rows);
        array_push($result, $rows1);
        echo json_encode($result, JSON_NUMERIC_CHECK);
    } elseif ($produk_tipe == 'realtime_awal1') { //buat data realtime dynamic chart untuk data awal

        $rows1 = array();
        $rows1['name'] = 'Sed_Sim';
        //$q = mysqli_query($link, "SELECT sed_sim, tanggal, waktu, curah_hujan from curah_hujan order by id DESC limit 20");

        $qj = mysqli_query($link, "SELECT id FROM curah_hujan ORDER BY id DESC LIMIT 1");
        $dj = mysqli_fetch_row($qj);
        $j = $dj[0];
        $j1 = $j - 20;
        //echo "j: $j, j1: $j1 --> SELECT tanggal,waktu,curah_hujan from curah_hujan order by id ASC limit $j1,$j";
        $q = mysqli_query($link, "SELECT tanggal,waktu,sed_sim from curah_hujan order by id ASC limit $j1,$j");
        while ($d = mysqli_fetch_row($q)) {
            //$wkt_ms=strtotime("$d[0]T$d[1]")*1000;
            $rows1['data'][] = [$d[1], $d[2]];
            // $rows1['data'][] = $d[1];
            // $rows1['data'][] = $d[2];
            // $rows1['data'][] = $d[3];
        }
        //   echo "SELECT tanggal,waktu,curah_hujan from curah_hujan order by id ASC limit $j1,$j"; 
        $result = array();
        //array_push($result,$rows);
        array_push($result, $rows1);
        echo json_encode($result, JSON_NUMERIC_CHECK);
    } elseif ($produk_tipe == 'menitan') { //buat data realtime dynamic chart untuk data awal

        $tipe = $_GET['t'];
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        $waktu = $_GET['waktu'];
        // $tipe = $_GET['tipe'];

        if ($tipe == "rain_menit") {
            $row_name = 'Curah Hujan';
            $field_name = "curah_hujan";
        } elseif ($tipe == "sed_menit") {
            $row_name = 'Sed Sim';
            $field_name = "sed_sim";
        }

        $data = array();
        if (empty($tgl2) || $tgl1 == $tgl2) {
            $data['name'] = 'Time';
            $q = mysqli_query($link, "SELECT waktu as t1 FROM curah_hujan WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2') AND HOUR(waktu) = '$waktu' AND mod(minute(waktu),5) = 0 group by minute(waktu)");
            // echo "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE tanggal='$tgl1' GROUP BY HOUR(waktu)";
            $q2 = mysqli_query($link, "SELECT SUM($field_name) AS $field_name FROM curah_hujan where (tanggal BETWEEN '$tgl1' AND '$tgl2') AND HOUR(waktu) = '$waktu' group by UNIX_TIMESTAMP(waktu) DIV 300");
        } else;

        while ($d = mysqli_fetch_array($q)) {
            if (empty($tgl2) || $tgl1 == $tgl2) {
                $data['data'][] = $d['t1'];
            } else;
        }

        $data1 = array();
        $data1['name'] = $row_name;
        while ($d2 = mysqli_fetch_array($q2)) {
            $data1['data'][] = $d2[$field_name];
        }

        $result = array();
        array_push($result, $data);
        array_push($result, $data1);
        echo json_encode($result, JSON_NUMERIC_CHECK);


        // if ($tipe == "rain_menit") {
        //     $data['name'] = 'Curah_Hujan';
        //     $q = mysqli_query($link, "SELECT SUM(curah_hujan) from curah_hujan where (tanggal BETWEEN '$tgl1' AND '$tgl2') AND HOUR(waktu) = '$waktu' group by minute(waktu)");
        //     // echo "SELECT SUM(curah_hujan) AS Curah_Hujan from curah_hujan where tanggal ='$tanggal' AND HOUR(waktu) = '$waktu' group by minute(waktu)";
        // } elseif ($tipe == "sed") {
        //     $data['name'] = 'Sed_Sim';
        //     $q = mysqli_query($link, "SELECT SUM(sed_sim) from curah_hujan where (tanggal BETWEEN '$tgl1' AND '$tgl2') AND HOUR(waktu) = '$waktu' group by minute(waktu)");
        // }

    } else {

        $tipe = $_GET['t'];
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        // $sn = $_GET['sn'];
        $produk_tipe = $_GET['j'];

        if ($produk_tipe == "sed_sim") {
            if ($tipe == 'sed_sim') {
                $row_name = 'Sed Sim';
                $field_name = "sed_sim";
            } else;
        } else if ($produk_tipe == "rain") {
            if ($tipe == 'rain') {
                $row_name = 'Curah Hujan';
                $field_name = "curah_hujan";
            } else;
        }

        $rows = array();
        if (empty($tgl2) || $tgl1 == $tgl2) {
            $rows['name'] = 'Time';
            if ($produk_tipe == "sed_sim") {
                $q = mysqli_query($link, "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE tanggal='$tgl1' GROUP BY HOUR(waktu)");
                // echo "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE tanggal='$tgl1' GROUP BY HOUR(waktu)";
                $q2 = mysqli_query($link, "SELECT SUM($field_name) AS $field_name from curah_hujan where tanggal ='$tgl1' group by HOUR(waktu)");
                // echo "SELECT AVG($field_name) AS $field_name from curah_hujan where tanggal ='$tgl1' group by HOUR(waktu)";
            } else if ($produk_tipe == "rain") {
                $q = mysqli_query($link, "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE tanggal='$tgl1' GROUP BY HOUR(waktu)");
                // echo "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE tanggal='$tgl1' GROUP BY HOUR(waktu)";
                $q2 = mysqli_query($link, "SELECT SUM($field_name) AS $field_name from curah_hujan where tanggal ='$tgl1' group by HOUR(waktu)");
                // echo "SELECT AVG($field_name) AS $field_name from curah_hujan where tanggal ='$tgl1' group by HOUR(waktu)";
            }
        } else {
            $rows['name'] = 'Date';
            if ($produk_tipe == "sed_sim") {
                $q = mysqli_query($link, "SELECT tanggal as dr FROM curah_hujan WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2')  GROUP BY tanggal");
                // echo "SELECT tanggal as dr FROM curah_hujan WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2')  GROUP BY tanggal";
                $q2 = mysqli_query($link, "SELECT SUM($field_name)  AS $field_name from curah_hujan where tanggal BETWEEN '$tgl1' AND '$tgl2' group by tanggal");
            } else if ($produk_tipe == "rain") {
                $q = mysqli_query($link, "SELECT tanggal as dr FROM curah_hujan WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2')  GROUP BY tanggal");
                // echo "SELECT tanggal as dr FROM curah_hujan WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2')  GROUP BY tanggal";
                $q2 = mysqli_query($link, "SELECT SUM($field_name)  AS $field_name from curah_hujan where tanggal BETWEEN '$tgl1' AND '$tgl2' group by tanggal");
            }
        }
        while ($d = mysqli_fetch_array($q)) {
            if (empty($tgl2) || $tgl1 == $tgl2) {
                $rows['data'][] = $d['t1'];
            } else {
                $rows['data'][] = $sa->tgl_balik($d['dr']);
            }
        }

        $rows1 = array();
        $rows1['name'] = $row_name;
        while ($d2 = mysqli_fetch_array($q2)) {

            if ($tipe == 'sed_sim' || $tipe == 'tempf' || $tipe == 'tempa') {
                $rows1['data'][] = round($d2[$field_name], 1);
            } else {
                $rows1['data'][] = round($d2[$field_name], 0);
            }
        }

        $result = array();
        array_push($result, $rows);
        array_push($result, $rows1);
        //array_push($result,$rows2);
        echo json_encode($result, JSON_NUMERIC_CHECK);
    }
}
