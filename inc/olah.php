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
        $fcm = $_POST['fcmToken'];

        $q = mysqli_query($link, "SELECT username FROM login WHERE username=\"$username\" AND password=\"$password\"");
        $j = mysqli_num_rows($q);
        
        $data = mysqli_query($link, "INSERT INTO fcm(id, fcm) VALUES ('$id', '$fcm')");
    
        // Check if the data was inserted successfully
        if ($data) {
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil disimpan ke database',
                'data' => [
                    'id' => $id,
                    'fcm' => $fcm,
                ],
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menyimpan data ke database',
            ];
        }
        // header('Content-Type: application/json');
        // echo json_encode($response);
        
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
        $q = mysqli_query($link, "SELECT id, Ha, ha1, a1, Ch, ha2, a2, a0, lokasi, tanggal, waktu from debit_sedimen WHERE lokasi='Kreo' ORDER BY tanggal DESC");
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
        }
        $daftar = array('id' => $id, 'Ha' => $Ha, 'ha1' => $ha1, 'a1' => $a1, 'Ch' => $Ch, 'ha2' => $ha2, 'a2' => $a2, 'a0' => $a0, 'lokasi' => $lokasi, 'tanggal' => $tanggal, 'waktu' => $waktu);
        echo json_encode($daftar);
    } elseif ($_POST['p'] == "daftardebitsedimenbanjir") {
        $q = mysqli_query($link, "SELECT id, HA1, HA2, HA3, HB, HC, A0, A1, A2, A3, B0, B1, C0, C1, S1, S2, S3 from debit_banjir WHERE lokasi='Kreo' ORDER BY tanggal DESC");
        // echo "SELECT username, nama, level, no_hp, alamat, kota, foto_profil from login ORDER BY username ASC";
        while ($d = mysqli_fetch_row($q)) {
            $id[] = $d[0];
            $HA1[] = $d[1];
            $HA2[] = $d[2];
            $HA3[] = $d[3];
            $HB[] = $d[4];
            $HC[] = $d[5];
            $A0[] = $d[6];
            $A1[] = $d[7];
            $A2[] = $d[8];
            $A3[] = $d[9];
            $B0[] = $d[10];
            $B1[] = $d[11];
            $C0[] = $d[12];
            $C1[] = $d[13];
            $S1[] = $d[14];
            $S2[] = $d[15];
            $S3[] = $d[16];
            
        }
        $daftar = array('id' => $id, 'HA1' => $HA1, 'HA2' => $HA2, 'HA3' => $HA3, 'HB' => $HB, 'HC' => $HC, 'A0' => $A0, 'A1' => $A1, 'A2' => $A2, 'A3' => $A3, 'B0' => $B0, 'B1' => $B1, 'C0' => $B0, 'C1' => $C1, 'S1' => $S1, 'S2' => $S2, 'S3' => $S3 );
        echo json_encode($daftar);
    } elseif ($_POST['p'] == "daftardebitsedimenbanjirkripik") {
        $q = mysqli_query($link, "SELECT id, HA1, HA2, HA3, HB, HC, A0, A1, A2, A3, B0, B1, C0, C1, S1, S2, S3 from debit_banjir WHERE lokasi='Kripik' ORDER BY tanggal DESC");
        // echo "SELECT username, nama, level, no_hp, alamat, kota, foto_profil from login ORDER BY username ASC";
        while ($d = mysqli_fetch_row($q)) {
            $id[] = $d[0];
            $HA1[] = $d[1];
            $HA2[] = $d[2];
            $HA3[] = $d[3];
            $HB[] = $d[4];
            $HC[] = $d[5];
            $A0[] = $d[6];
            $A1[] = $d[7];
            $A2[] = $d[8];
            $A3[] = $d[9];
            $B0[] = $d[10];
            $B1[] = $d[11];
            $C0[] = $d[12];
            $C1[] = $d[13];
            $S1[] = $d[14];
            $S2[] = $d[15];
            $S3[] = $d[16];
            
        }
        $daftar = array('id' => $id, 'HA1' => $HA1, 'HA2' => $HA2, 'HA3' => $HA3, 'HB' => $HB, 'HC' => $HC, 'A0' => $A0, 'A1' => $A1, 'A2' => $A2, 'A3' => $A3, 'B0' => $B0, 'B1' => $B1, 'C0' => $B0, 'C1' => $C1, 'S1' => $S1, 'S2' => $S2, 'S3' => $S3 );
        echo json_encode($daftar);
    } elseif ($_POST['p'] == "daftardebitsedimenbanjirgarang") {
        $q = mysqli_query($link, "SELECT id, HA1, HA2, HA3, HB, HC, A0, A1, A2, A3, B0, B1, C0, C1, S1, S2, S3 from debit_banjir WHERE lokasi='Garang' ORDER BY tanggal DESC");
        // echo "SELECT username, nama, level, no_hp, alamat, kota, foto_profil from login ORDER BY username ASC";
        while ($d = mysqli_fetch_row($q)) {
            $id[] = $d[0];
            $HA1[] = $d[1];
            $HA2[] = $d[2];
            $HA3[] = $d[3];
            $HB[] = $d[4];
            $HC[] = $d[5];
            $A0[] = $d[6];
            $A1[] = $d[7];
            $A2[] = $d[8];
            $A3[] = $d[9];
            $B0[] = $d[10];
            $B1[] = $d[11];
            $C0[] = $d[12];
            $C1[] = $d[13];
            $S1[] = $d[14];
            $S2[] = $d[15];
            $S3[] = $d[16];
            
        }
        $daftar = array('id' => $id, 'HA1' => $HA1, 'HA2' => $HA2, 'HA3' => $HA3, 'HB' => $HB, 'HC' => $HC, 'A0' => $A0, 'A1' => $A1, 'A2' => $A2, 'A3' => $A3, 'B0' => $B0, 'B1' => $B1, 'C0' => $B0, 'C1' => $C1, 'S1' => $S1, 'S2' => $S2, 'S3' => $S3 );
        echo json_encode($daftar);
    } elseif ($_POST['p'] == "daftardebitsedimenkripik") {
        $q = mysqli_query($link, "SELECT id, Ha, ha1, a1, Ch, ha2, a2, a0, lokasi, tanggal, waktu from debit_sedimen WHERE lokasi='Kripik' ORDER BY tanggal DESC");
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
        }
        $daftar = array('id' => $id, 'Ha' => $Ha, 'ha1' => $ha1, 'a1' => $a1, 'Ch' => $Ch, 'ha2' => $ha2, 'a2' => $a2, 'a0' => $a0, 'lokasi' => $lokasi, 'tanggal' => $tanggal, 'waktu' => $waktu);
        echo json_encode($daftar);
    } elseif ($_POST['p'] == "daftardebitsedimengarang") {
        $q = mysqli_query($link, "SELECT id, Ha, ha1, a1, Ch, ha2, a2, a0, lokasi, tanggal, waktu from debit_sedimen WHERE lokasi='Garang' ORDER BY tanggal DESC");
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
        $q = mysqli_query($link, "SELECT sed_sim, tanggal_server, waktu_server, curah_hujan, deb_banjir, lokasi from curah_hujan WHERE lokasi='Kreo' AND sn=202310240001 order by id DESC limit 1");
        while ($d = mysqli_fetch_row($q)) {
            $sed_sim = $d[0];
            $tanggal = $d[1];
            $waktu = $d[2];
            $curah_hujan = $d[3];
            $deb_banjir = $d[4];
            $lokasi = $d[5];
        }
        $data = array('sed_sim' => $sed_sim, 'tanggal' => $tanggal, 'waktu' => $waktu, 'curah_hujan' => $curah_hujan,'deb_banjir' => $deb_banjir, 'lokasi' => $lokasi);
        echo json_encode($data);
    } elseif ($_POST['p'] == "ambil_data_kripik") {
        // $sn = $_POST['sn'];
        // $produk_tipe = $_POST['produk_tipe'];

        // if ($produk_tipe == "Autofan") {
        $q = mysqli_query($link, "SELECT sed_sim, tanggal_server, waktu_server, curah_hujan, deb_banjir, lokasi from curah_hujan  WHERE lokasi='Kripik' AND sn=202310240002 order by id DESC limit 1");
        while ($d = mysqli_fetch_row($q)) {
            $sed_sim = $d[0];
            $tanggal = $d[1];
            $waktu = $d[2];
            $curah_hujan = $d[3];
            $deb_banjir = $d[4];
            $lokasi = $d[5];
        }
        $data = array('sed_sim' => $sed_sim, 'tanggal' => $tanggal, 'waktu' => $waktu, 'curah_hujan' => $curah_hujan,'deb_banjir' => $deb_banjir, 'lokasi' => $lokasi);
        echo json_encode($data);
    } elseif ($_POST['p'] == "ambil_data_garang") {
        // $sn = $_POST['sn'];
        // $produk_tipe = $_POST['produk_tipe'];

        // if ($produk_tipe == "Autofan") {
        $q = mysqli_query($link, "SELECT sed_sim, tanggal_server, waktu_server, curah_hujan, deb_banjir, lokasi from curah_hujan WHERE lokasi='Garang' AND sn=202310240003 order by id DESC limit 1");
        while ($d = mysqli_fetch_row($q)) {
            $sed_sim = $d[0];
            $tanggal = $d[1];
            $waktu = $d[2];
            $curah_hujan = $d[3];
            $deb_banjir = $d[4];
            $lokasi = $d[5];
        }
        $data = array('sed_sim' => $sed_sim, 'tanggal' => $tanggal, 'waktu' => $waktu, 'curah_hujan' => $curah_hujan,'deb_banjir' => $deb_banjir, 'lokasi' => $lokasi);
        echo json_encode($data);
    }elseif($_POST['p'] == "ambil_gambar_kreo")
    {
        $q = mysqli_query($link, "SELECT gambar FROM gambar WHERE lokasi='Kreo' order by id DESC limit 1");
        while($d = mysqli_fetch_row($q)){
            $gambar = $d[0];
        }
        $data = array('gambar' => $gambar);
        echo json_encode($data);
    }elseif($_POST['p'] == "ambil_gambar_kripik")
    {
        $q = mysqli_query($link, "SELECT gambar FROM gambar WHERE lokasi='Kripik' order by id DESC limit 1");
        while($d = mysqli_fetch_row($q)){
            $gambar = $d[0];
        }
        $data = array('gambar' => $gambar);
        echo json_encode($data);
    }elseif($_POST['p'] == "ambil_gambar_garang")
    {
        $q = mysqli_query($link, "SELECT gambar FROM gambar WHERE lokasi='Garang' order by id DESC limit 1");
        while($d = mysqli_fetch_row($q)){
            $gambar = $d[0];
        }
        $data = array('gambar' => $gambar);
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
        $q = mysqli_query($link, "SELECT sed_sim, tanggal_server, waktu_server, curah_hujan, deb_banjir, lokasi FROM curah_hujan WHERE lokasi='Kreo' order by id DESC limit 1");
        $d = mysqli_fetch_row($q);
        $sed_sim = $d[0];
        $tanggal = $d[1];
        $waktu = $d[2];
        $curah_hujan = $d[3];
        $deb_banjir = $d[4];
        $lokasi = $d[5];
        

        $data = array('sed_sim' => $sed_sim, 'tanggal' => $tanggal, 'waktu' => $waktu, 'curah_hujan' => $curah_hujan,  'deb_banjir' => $deb_banjir, 'lokasi' => $lokasi);
        echo json_encode($data);
    } elseif($produk_tipe == 'realtimekripik') {
        $q = mysqli_query($link, "SELECT sed_sim, tanggal_server, waktu_server, curah_hujan, deb_banjir, lokasi from curah_hujan WHERE lokasi='Kripik' order by id DESC limit 1");
        $d = mysqli_fetch_row($q);
        $sed_sim = $d[0];
        $tanggal = $d[1];
        $waktu = $d[2];
        $curah_hujan = $d[3];
        $deb_banjir = $d[4];
        $lokasi = $d[5];

        $data = array('sed_sim' => $sed_sim, 'tanggal' => $tanggal, 'waktu' => $waktu, 'curah_hujan' => $curah_hujan, 'deb_banjir' => $deb_banjir, 'lokasi' => $lokasi);
        echo json_encode($data);
    } elseif($produk_tipe == 'realtimegarang') {
        $q = mysqli_query($link, "SELECT sed_sim, tanggal_server, waktu_server, curah_hujan, deb_banjir, lokasi from curah_hujan WHERE lokasi='Garang' order by id DESC limit 1");
        $d = mysqli_fetch_row($q);
        $sed_sim = $d[0];
        $tanggal = $d[1];
        $waktu = $d[2];
        $curah_hujan = $d[3];
        $deb_banjir = $d[4];
        $lokasi = $d[5];

        $data = array('sed_sim' => $sed_sim, 'tanggal' => $tanggal, 'waktu' => $waktu, 'curah_hujan' => $curah_hujan, 'deb_banjir' => $deb_banjir, 'lokasi' => $lokasi);
        echo json_encode($data);
    } elseif ($produk_tipe == 'realtime_awal') {
        $timeFilter = isset($_GET['timeFilter']) ? $_GET['timeFilter'] : null;
        $time = isset($_GET['time']) ? $_GET['time'] : null;
        $menit = isset($_GET['menit']) ? $_GET['menit'] : null;
    
        $rows1 = array();
        $rows1['name'] = 'Curah Hujan';
    
        if ($timeFilter !== null && $time === null) {
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, curah_hujan FROM curah_hujan WHERE tanggal_server='$timeFilter' AND lokasi='Kreo' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif ($timeFilter !== null && $time !== null && $menit === null) {
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, curah_hujan FROM curah_hujan WHERE tanggal_server='$timeFilter' AND HOUR(waktu_server) = '$time' AND lokasi='Kreo' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif ($timeFilter !== null && $time !== null && $menit !== null) {
            $menitRange = explode('-', $menit);
            $menitStart = isset($menitRange[0]) ? intval($menitRange[0]) : 0;
            $menitEnd = isset($menitRange[1]) ? intval($menitRange[1]) : 59;
        
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, curah_hujan FROM curah_hujan WHERE tanggal_server='$timeFilter' AND HOUR(waktu_server) = '$time' AND MINUTE(waktu_server) >= '$menitStart' AND MINUTE(waktu_server) <= '$menitEnd' AND lokasi='Kreo' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif($timeFilter === null && $time === null && $menit === null){
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, curah_hujan FROM curah_hujan WHERE lokasi='Kreo' ORDER BY id ASC LIMIT 20");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        }
    
        $result = array($rows1);
        echo json_encode($result, JSON_NUMERIC_CHECK);
    }elseif ($produk_tipe == 'realtime_awal_kripik') {
        $timeFilter = isset($_GET['timeFilter']) ? $_GET['timeFilter'] : null;
        $time = isset($_GET['time']) ? $_GET['time'] : null;
        $menit = isset($_GET['menit']) ? $_GET['menit'] : null;
    
        $rows1 = array();
        $rows1['name'] = 'Curah Hujan';
    
        if ($timeFilter !== null && $time === null) {
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, curah_hujan FROM curah_hujan WHERE tanggal_server='$timeFilter' AND lokasi='Kripik' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif ($timeFilter !== null && $time !== null && $menit === null) {
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, curah_hujan FROM curah_hujan WHERE tanggal_server='$timeFilter' AND HOUR(waktu_server) = '$time' AND lokasi='Kripik' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif ($timeFilter !== null && $time !== null && $menit !== null) {
            $menitRange = explode('-', $menit);
            $menitStart = isset($menitRange[0]) ? intval($menitRange[0]) : 0;
            $menitEnd = isset($menitRange[1]) ? intval($menitRange[1]) : 59;
        
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, curah_hujan FROM curah_hujan WHERE tanggal_server='$timeFilter' AND HOUR(waktu_server) = '$time' AND MINUTE(waktu_server) >= '$menitStart' AND MINUTE(waktu_server) <= '$menitEnd' AND lokasi='Kripik' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif($timeFilter === null && $time === null){
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, curah_hujan FROM curah_hujan WHERE lokasi='Kripik' ORDER BY id ASC LIMIT 20");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        }
    
        $result = array($rows1);
        echo json_encode($result, JSON_NUMERIC_CHECK);
    
} elseif ($produk_tipe == 'realtime_awal_garang') {
    $timeFilter = isset($_GET['timeFilter']) ? $_GET['timeFilter'] : null;
    $time = isset($_GET['time']) ? $_GET['time'] : null;
    $menit = isset($_GET['menit']) ? $_GET['menit'] : null;

    $rows1 = array();
    $rows1['name'] = 'Curah Hujan';

    if ($timeFilter !== null && $time === null) {
        $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, curah_hujan FROM curah_hujan WHERE tanggal_server='$timeFilter' AND lokasi='Garang' ORDER BY id ASC");
        $rows1['data'] = array(); // Initialize the data array

        while ($d = mysqli_fetch_row($q)) {
            $rows1['data'][] = [$d[1], $d[2]];
        }
    } elseif ($timeFilter !== null && $time !== null && $menit === null) {
        $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, curah_hujan FROM curah_hujan WHERE tanggal_server='$timeFilter' AND HOUR(waktu_server) = '$time' AND lokasi='Garang' ORDER BY id ASC");
        $rows1['data'] = array(); // Initialize the data array

        while ($d = mysqli_fetch_row($q)) {
            $rows1['data'][] = [$d[1], $d[2]];
        }
    } elseif ($timeFilter !== null && $time !== null && $menit !== null) {
            $menitRange = explode('-', $menit);
            $menitStart = isset($menitRange[0]) ? intval($menitRange[0]) : 0;
            $menitEnd = isset($menitRange[1]) ? intval($menitRange[1]) : 59;
        
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, curah_hujan FROM curah_hujan WHERE tanggal_server='$timeFilter' AND HOUR(waktu_server) = '$time' AND MINUTE(waktu_server) >= '$menitStart' AND MINUTE(waktu_server) <= '$menitEnd' AND lokasi='Garang' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif($timeFilter === null && $time === null){
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, curah_hujan FROM curah_hujan WHERE lokasi='Garang' ORDER BY id ASC LIMIT 20");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        }

    $result = array($rows1);
    echo json_encode($result, JSON_NUMERIC_CHECK);
    
} elseif ($produk_tipe == 'realtime_awal1kripik') { //buat data realtime dynamic chart untuk data awal

        $timeFilter = isset($_GET['timeFilter']) ? $_GET['timeFilter'] : null;
        $time = isset($_GET['time']) ? $_GET['time'] : null;
        $menit = isset($_GET['menit']) ? $_GET['menit'] : null;
    
        $rows1 = array();
        $rows1['name'] = 'Sed Sim';
    
        if ($timeFilter !== null && $time === null) {
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, sed_sim FROM curah_hujan WHERE tanggal_server='$timeFilter' AND lokasi='Kripik' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif ($timeFilter !== null && $time !== null && $menit === null) {
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, sed_sim FROM curah_hujan WHERE tanggal_server='$timeFilter' AND HOUR(waktu_server) = '$time' AND lokasi='Kripik' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif ($timeFilter !== null && $time !== null && $menit !== null) {
            $menitRange = explode('-', $menit);
            $menitStart = isset($menitRange[0]) ? intval($menitRange[0]) : 0;
            $menitEnd = isset($menitRange[1]) ? intval($menitRange[1]) : 59;
        
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, sed_sim FROM curah_hujan WHERE tanggal_server='$timeFilter' AND HOUR(waktu_server) = '$time' AND MINUTE(waktu_server) >= '$menitStart' AND MINUTE(waktu_server) <= '$menitEnd' AND lokasi='Kripik' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif($timeFilter === null && $time === null){
                $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, sed_sim FROM curah_hujan WHERE lokasi='Kripik' ORDER BY id ASC LIMIT 20");
                $rows1['data'] = array(); // Initialize the data array
        
                while ($d = mysqli_fetch_row($q)) {
                    $rows1['data'][] = [$d[1], $d[2]];
                }
            }
    
        $result = array($rows1);
        echo json_encode($result, JSON_NUMERIC_CHECK);
    } elseif ($produk_tipe == 'realtime_awal1') { //buat data realtime dynamic chart untuk data awal

        $timeFilter = isset($_GET['timeFilter']) ? $_GET['timeFilter'] : null;
        $time = isset($_GET['time']) ? $_GET['time'] : null;
        $menit = isset($_GET['menit']) ? $_GET['menit'] : null;
    
        $rows1 = array();
        $rows1['name'] = 'Sed Sim';
    
        if ($timeFilter !== null && $time === null) {
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, sed_sim FROM curah_hujan WHERE tanggal_server='$timeFilter' AND lokasi='Kreo' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif ($timeFilter !== null && $time !== null && $menit === null) {
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, sed_sim FROM curah_hujan WHERE tanggal_server='$timeFilter' AND HOUR(waktu_server) = '$time' AND lokasi='Kreo' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif ($timeFilter !== null && $time !== null && $menit !== null) {
            $menitRange = explode('-', $menit);
            $menitStart = isset($menitRange[0]) ? intval($menitRange[0]) : 0;
            $menitEnd = isset($menitRange[1]) ? intval($menitRange[1]) : 59;
        
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, sed_sim FROM curah_hujan WHERE tanggal_server='$timeFilter' AND HOUR(waktu_server) = '$time' AND MINUTE(waktu_server) >= '$menitStart' AND MINUTE(waktu_server) <= '$menitEnd' AND lokasi='Kreo' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif($timeFilter === null && $time === null){
                $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, sed_sim FROM curah_hujan WHERE lokasi='Kreo' ORDER BY id ASC LIMIT 20");
                $rows1['data'] = array(); // Initialize the data array
        
                while ($d = mysqli_fetch_row($q)) {
                    $rows1['data'][] = [$d[1], $d[2]];
                }
            }
    
        $result = array($rows1);
        echo json_encode($result, JSON_NUMERIC_CHECK);
    }  elseif ($produk_tipe == 'realtime_awal1garang') { //buat data realtime dynamic chart untuk data awal

        $timeFilter = isset($_GET['timeFilter']) ? $_GET['timeFilter'] : null;
        $time = isset($_GET['time']) ? $_GET['time'] : null;
        $menit = isset($_GET['menit']) ? $_GET['menit'] : null;
    
        $rows1 = array();
        $rows1['name'] = 'Sed Sim';
    
        if ($timeFilter !== null && $time === null) {
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, sed_sim FROM curah_hujan WHERE tanggal_server='$timeFilter' AND lokasi='Garang' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif ($timeFilter !== null && $time !== null && $menit === null) {
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, sed_sim FROM curah_hujan WHERE tanggal_server='$timeFilter' AND HOUR(waktu_server) = '$time' AND lokasi='Garang' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif ($timeFilter !== null && $time !== null && $menit !== null) {
            $menitRange = explode('-', $menit);
            $menitStart = isset($menitRange[0]) ? intval($menitRange[0]) : 0;
            $menitEnd = isset($menitRange[1]) ? intval($menitRange[1]) : 59;
        
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, sed_sim FROM curah_hujan WHERE tanggal_server='$timeFilter' AND HOUR(waktu_server) = '$time' AND MINUTE(waktu_server) >= '$menitStart' AND MINUTE(waktu_server) <= '$menitEnd' AND lokasi='Garang' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif($timeFilter === null && $time === null){
                $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, sed_sim FROM curah_hujan WHERE lokasi='Garang' ORDER BY id ASC LIMIT 20");
                $rows1['data'] = array(); // Initialize the data array
        
                while ($d = mysqli_fetch_row($q)) {
                    $rows1['data'][] = [$d[1], $d[2]];
                }
            }
    
        $result = array($rows1);
        echo json_encode($result, JSON_NUMERIC_CHECK);
    } elseif ($produk_tipe == 'realtime_awal2') { //buat data realtime dynamic chart untuk data awal

        $timeFilter = isset($_GET['timeFilter']) ? $_GET['timeFilter'] : null;
        $time = isset($_GET['time']) ? $_GET['time'] : null;
        $menit = isset($_GET['menit']) ? $_GET['menit'] : null;
    
        $rows1 = array();
        $rows1['name'] = 'Deb Banjir';
    
        if ($timeFilter !== null && $time === null) {
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, deb_banjir FROM curah_hujan WHERE tanggal_server='$timeFilter' AND lokasi='Kreo' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif ($timeFilter !== null && $time !== null && $menit === null) {
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, deb_banjir FROM curah_hujan WHERE tanggal_server='$timeFilter' AND HOUR(waktu_server) = '$time' AND lokasi='Kreo' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif ($timeFilter !== null && $time !== null && $menit !== null) {
            $menitRange = explode('-', $menit);
            $menitStart = isset($menitRange[0]) ? intval($menitRange[0]) : 0;
            $menitEnd = isset($menitRange[1]) ? intval($menitRange[1]) : 59;
        
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, deb_banjir FROM curah_hujan WHERE tanggal_server='$timeFilter' AND HOUR(waktu_server) = '$time' AND MINUTE(waktu_server) >= '$menitStart' AND MINUTE(waktu_server) <= '$menitEnd' AND lokasi='Kreo' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif($timeFilter === null && $time === null){
                $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, deb_banjir FROM curah_hujan WHERE lokasi='Kreo' ORDER BY id ASC LIMIT 20");
                $rows1['data'] = array(); // Initialize the data array
        
                while ($d = mysqli_fetch_row($q)) {
                    $rows1['data'][] = [$d[1], $d[2]];
                }
            }
    
        $result = array($rows1);
        echo json_encode($result, JSON_NUMERIC_CHECK);
    } elseif ($produk_tipe == 'realtime_awal2kripik') { //buat data realtime dynamic chart untuk data awal

        $timeFilter = isset($_GET['timeFilter']) ? $_GET['timeFilter'] : null;
        $time = isset($_GET['time']) ? $_GET['time'] : null;
        $menit = isset($_GET['menit']) ? $_GET['menit'] : null;
    
        $rows1 = array();
        $rows1['name'] = 'Deb Banjir';
    
        if ($timeFilter !== null && $time === null) {
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, deb_banjir FROM curah_hujan WHERE tanggal_server='$timeFilter' AND lokasi='Kripik' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif ($timeFilter !== null && $time !== null && $menit === null) {
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, deb_banjir FROM curah_hujan WHERE tanggal_server='$timeFilter' AND HOUR(waktu_server) = '$time' AND lokasi='Kripik' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif ($timeFilter !== null && $time !== null && $menit !== null) {
            $menitRange = explode('-', $menit);
            $menitStart = isset($menitRange[0]) ? intval($menitRange[0]) : 0;
            $menitEnd = isset($menitRange[1]) ? intval($menitRange[1]) : 59;
        
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, deb_banjir FROM curah_hujan WHERE tanggal_server='$timeFilter' AND HOUR(waktu_server) = '$time' AND MINUTE(waktu_server) >= '$menitStart' AND MINUTE(waktu_server) <= '$menitEnd' AND lokasi='Kripik' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif($timeFilter === null && $time === null){
                $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, deb_banjir FROM curah_hujan WHERE lokasi='Kripik' ORDER BY id ASC LIMIT 20");
                $rows1['data'] = array(); // Initialize the data array
        
                while ($d = mysqli_fetch_row($q)) {
                    $rows1['data'][] = [$d[1], $d[2]];
                }
            }
    
        $result = array($rows1);
        echo json_encode($result, JSON_NUMERIC_CHECK);
    } elseif ($produk_tipe == 'realtime_awal2garang') { //buat data realtime dynamic chart untuk data awal

        $timeFilter = isset($_GET['timeFilter']) ? $_GET['timeFilter'] : null;
        $time = isset($_GET['time']) ? $_GET['time'] : null;
        $menit = isset($_GET['menit']) ? $_GET['menit'] : null;
    
        $rows1 = array();
        $rows1['name'] = 'Deb Banjir';
    
        if ($timeFilter !== null && $time === null) {
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, deb_banjir FROM curah_hujan WHERE tanggal_server='$timeFilter' AND lokasi='Garang' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif ($timeFilter !== null && $time !== null && $menit === null) {
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, deb_banjir FROM curah_hujan WHERE tanggal_server='$timeFilter' AND HOUR(waktu_server) = '$time' AND lokasi='Garang' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif ($timeFilter !== null && $time !== null && $menit !== null) {
            $menitRange = explode('-', $menit);
            $menitStart = isset($menitRange[0]) ? intval($menitRange[0]) : 0;
            $menitEnd = isset($menitRange[1]) ? intval($menitRange[1]) : 59;
        
            $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, deb_banjir FROM curah_hujan WHERE tanggal_server='$timeFilter' AND HOUR(waktu_server) = '$time' AND MINUTE(waktu_server) >= '$menitStart' AND MINUTE(waktu_server) <= '$menitEnd' AND lokasi='Garang' ORDER BY id ASC");
            $rows1['data'] = array(); // Initialize the data array
    
            while ($d = mysqli_fetch_row($q)) {
                $rows1['data'][] = [$d[1], $d[2]];
            }
        } elseif($timeFilter === null && $time === null){
                $q = mysqli_query($link, "SELECT tanggal_server, waktu_server, deb_banjir FROM curah_hujan WHERE lokasi='Garang' ORDER BY id ASC LIMIT 20");
                $rows1['data'] = array(); // Initialize the data array
        
                while ($d = mysqli_fetch_row($q)) {
                    $rows1['data'][] = [$d[1], $d[2]];
                }
            }
    
        $result = array($rows1);
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
        } elseif ($tipe == "deb_menit") {
            $row_name = 'Deb Banjir';
            $field_name = "deb_banjir";
        } 
        

        $data = array();
        if (empty($tgl2) || $tgl1 == $tgl2) {
            $data['name'] = 'Time';
            $q = mysqli_query($link, "SELECT waktu as t1 FROM curah_hujan WHERE lokasi='Kreo' (tanggal BETWEEN '$tgl1' AND '$tgl2') AND HOUR(waktu) = '$waktu'  group by UNIX_TIMESTAMP(waktu) DIV 300");
            // echo "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE tanggal='$tgl1' GROUP BY HOUR(waktu)";
            $q2 = mysqli_query($link, "SELECT SUM($field_name) AS $field_name FROM curah_hujan where lokasi='Kreo' (tanggal BETWEEN '$tgl1' AND '$tgl2') AND HOUR(waktu) = '$waktu'  group by UNIX_TIMESTAMP(waktu) DIV 300");
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

    }  elseif ($produk_tipe == 'menitanGarang') { //buat data realtime dynamic chart untuk data awal

        $tipe = $_GET['t'];
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        $waktu = $_GET['waktu'];
        // $tipe = $_GET['tipe'];

        if ($tipe == "rain_menit") {
            $row_name = 'Curah Hujan Kripik';
            $field_name = "curah_hujan";
        } elseif ($tipe == "sed_menit") {
            $row_name = 'Sed Sim Kripik';
            $field_name = "sed_sim";
        } elseif ($tipe == "deb_menit") {
            $row_name = 'Deb Banjir Kripik';
            $field_name = "deb_banjir";
        } 
        

        $data = array();
        if (empty($tgl2) || $tgl1 == $tgl2) {
            $data['name'] = 'Time';
            $q = mysqli_query($link, "SELECT waktu as t1 FROM curah_hujan WHERE lokasi='Kripik' (tanggal BETWEEN '$tgl1' AND '$tgl2') AND HOUR(waktu) = '$waktu'  group by UNIX_TIMESTAMP(waktu) DIV 300");
            // echo "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE tanggal='$tgl1' GROUP BY HOUR(waktu)";
            $q2 = mysqli_query($link, "SELECT SUM($field_name) AS $field_name FROM curah_hujan where lokasi='Kripik' (tanggal BETWEEN '$tgl1' AND '$tgl2') AND HOUR(waktu) = '$waktu'  group by UNIX_TIMESTAMP(waktu) DIV 300");
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
            } else if ($tipe == 'sed_simkripik') {
                $row_name = 'Sed Sim';
                $field_name = "sed_sim";
            }else if ($tipe == 'sed_simgarang') {
                $row_name = 'Sed Sim';
                $field_name = "sed_sim";
            } else;
        } else if ($produk_tipe == "rain") {
            if ($tipe == 'rain') {
                $row_name = 'Curah Hujan';
                $field_name = "curah_hujan";
            } else if ($tipe == 'rainkripik') {
                $row_name = 'Curah Hujan';
                $field_name = "curah_hujan";
            }else if ($tipe == 'raingarang') {
                $row_name = 'Curah Hujan';
                $field_name = "curah_hujan";
            } else;
        }  else if ($produk_tipe == "rainkripik") {
            if ($tipe == 'rainkripik') {
                $row_name = 'Curah Hujan Kripik';
                $field_name = "curah_hujan";
            } 
        } else if($produk_tipe == "deb_banjir"){
            if ($tipe == 'deb_banjir') {
                $row_name = 'Debit Banjir';
                $field_name = "deb_banjir";
            } else if ($tipe == 'deb_banjirkripik') {
                $row_name = 'Debit Banjir Kripik';
                $field_name = "deb_banjir";
            } else if ($tipe == 'deb_banjirgarang') {
                $row_name = 'Debit Banjir GARANG';
                $field_name = "deb_banjir";
            } else;
        } 
        // else if ($produk_tipe == "sed_simkripik") {
        //     if ($tipe == 'sed_simkripik') {
        //         $row_name = 'Sed Simkripik';
        //         $field_name = "sed_simkripik";
        //     } else;
        // } else if ($produk_tipe == "rainkripik") {
        //     if ($tipe == 'rain') {
        //         $row_name = 'Curah Hujankripik';
        //         $field_name = "curah_hujankripik";
        //     } else;
        // }

        $rows = array();
        if (empty($tgl2) || $tgl1 == $tgl2) {
            $rows['name'] = 'Time';
            if ($produk_tipe == "sed_sim") {
                $q = mysqli_query($link, "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE lokasi='Kreo' AND tanggal='$tgl1' GROUP BY HOUR(waktu)");
                // echo "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE tanggal='$tgl1' GROUP BY HOUR(waktu)";
                $q2 = mysqli_query($link, "SELECT SUM($field_name) AS $field_name from curah_hujan where lokasi='Kreo' AND tanggal ='$tgl1' group by HOUR(waktu)");
                // echo "SELECT AVG($field_name) AS $field_name from curah_hujan where tanggal ='$tgl1' group by HOUR(waktu)";
            } else if ($produk_tipe == "rain") {
                $q = mysqli_query($link, "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE lokasi='Kreo'  AND tanggal='$tgl1' GROUP BY HOUR(waktu)");
                // echo "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE tanggal='$tgl1' GROUP BY HOUR(waktu)";
                $q2 = mysqli_query($link, "SELECT SUM($field_name) AS $field_name from curah_hujan where lokasi='Kreo' AND tanggal ='$tgl1' group by HOUR(waktu)");
                // echo "SELECT AVG($field_name) AS $field_name from curah_hujan where tanggal ='$tgl1' group by HOUR(waktu)";
            } else if ($produk_tipe == "deb_banjir") {
                $q = mysqli_query($link, "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE lokasi='Kreo' AND tanggal='$tgl1' GROUP BY HOUR(waktu)");
                // echo "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE tanggal='$tgl1' GROUP BY HOUR(waktu)";
                $q2 = mysqli_query($link, "SELECT SUM($field_name) AS $field_name from curah_hujan where lokasi='Kreo' AND tanggal ='$tgl1' group by HOUR(waktu)");
                // echo "SELECT AVG($field_name) AS $field_name from curah_hujan where tanggal ='$tgl1' group by HOUR(waktu)";
            } else if ($produk_tipe == "sed_simkripik") {
                $q = mysqli_query($link, "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE lokasi='Kreo' AND tanggal='$tgl1' GROUP BY HOUR(waktu)");
                // echo "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE tanggal='$tgl1' GROUP BY HOUR(waktu)";
                $q2 = mysqli_query($link, "SELECT SUM($field_name) AS $field_name from curah_hujan where lokasi='Kreo' AND tanggal ='$tgl1' group by HOUR(waktu)");
                // echo "SELECT AVG($field_name) AS $field_name from curah_hujan where tanggal ='$tgl1' group by HOUR(waktu)";
            } else if ($produk_tipe == "rainkripik") {
                $q = mysqli_query($link, "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE lokasi='Kreo'  AND tanggal='$tgl1' GROUP BY HOUR(waktu)");
                // echo "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE tanggal='$tgl1' GROUP BY HOUR(waktu)";
                $q2 = mysqli_query($link, "SELECT SUM($field_name) AS $field_name from curah_hujan where lokasi='Kreo' AND tanggal ='$tgl1' group by HOUR(waktu)");
                // echo "SELECT AVG($field_name) AS $field_name from curah_hujan where tanggal ='$tgl1' group by HOUR(waktu)";
            } else if ($produk_tipe == "deb_banjirkripik") {
                $q = mysqli_query($link, "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE lokasi='Kripik' AND tanggal='$tgl1' GROUP BY HOUR(waktu)");
                // echo "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE tanggal='$tgl1' GROUP BY HOUR(waktu)";
                $q2 = mysqli_query($link, "SELECT SUM($field_name) AS $field_name from curah_hujan where lokasi='Kripik' AND tanggal ='$tgl1' group by HOUR(waktu)");
                // echo "SELECT AVG($field_name) AS $field_name from curah_hujan where tanggal ='$tgl1' group by HOUR(waktu)";
            } 
            // else if ($produk_tipe == "rainkripik") {
            //     $q = mysqli_query($link, "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE lokasi='Kripik'  AND tanggal='$tgl1' GROUP BY HOUR(waktu)");
            //     // echo "SELECT HOUR(waktu) as t1 FROM curah_hujan WHERE tanggal='$tgl1' GROUP BY HOUR(waktu)";
            //     $q2 = mysqli_query($link, "SELECT SUM($field_name) AS $field_name from curah_hujan where lokasi='Kreo' AND tanggal ='$tgl1' group by HOUR(waktu)");
            //     // echo "SELECT AVG($field_name) AS $field_name from curah_hujan where tanggal ='$tgl1' group by HOUR(waktu)";
            // }
        } else {
            $rows['name'] = 'Date';
            if ($produk_tipe == "sed_sim") {
                $q = mysqli_query($link, "SELECT tanggal as dr FROM curah_hujan WHERE lokasi='Kreo' AND (tanggal BETWEEN '$tgl1' AND '$tgl2')  GROUP BY tanggal");
                // echo "SELECT tanggal as dr FROM curah_hujan WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2')  GROUP BY tanggal";
                $q2 = mysqli_query($link, "SELECT SUM($field_name)  AS $field_name from curah_hujan where tanggal BETWEEN '$tgl1' AND '$tgl2' group by tanggal");
            } else if ($produk_tipe == "rain") {
                $q = mysqli_query($link, "SELECT tanggal as dr FROM curah_hujan WHERE lokasi='Kreo'  AND (tanggal BETWEEN '$tgl1' AND '$tgl2')  GROUP BY tanggal");
                // echo "SELECT tanggal as dr FROM curah_hujan WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2')  GROUP BY tanggal";
                $q2 = mysqli_query($link, "SELECT SUM($field_name)  AS $field_name from curah_hujan where tanggal BETWEEN '$tgl1' AND '$tgl2' group by tanggal");
            } else if ($produk_tipe == "deb_banjir") {
                $q = mysqli_query($link, "SELECT tanggal as dr FROM curah_hujan WHERE lokasi='Kreo'  AND (tanggal BETWEEN '$tgl1' AND '$tgl2')  GROUP BY tanggal");
                // echo "SELECT tanggal as dr FROM curah_hujan WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2')  GROUP BY tanggal";
                $q2 = mysqli_query($link, "SELECT SUM($field_name)  AS $field_name from curah_hujan where tanggal BETWEEN '$tgl1' AND '$tgl2' group by tanggal");
            } else if ($produk_tipe == "deb_banjirkripik") {
                $q = mysqli_query($link, "SELECT tanggal as dr FROM curah_hujan WHERE lokasi='Kripik'  AND (tanggal BETWEEN '$tgl1' AND '$tgl2')  GROUP BY tanggal");
                // echo "SELECT tanggal as dr FROM curah_hujan WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2')  GROUP BY tanggal";
                $q2 = mysqli_query($link, "SELECT SUM($field_name)  AS $field_name from curah_hujan where tanggal BETWEEN '$tgl1' AND '$tgl2' group by tanggal");
            } 
            // else if ($produk_tipe == "sed_simkripik") {
            //     $q = mysqli_query($link, "SELECT tanggal as dr FROM curah_hujan WHERE lokasi='Kripik' AND (tanggal BETWEEN '$tgl1' AND '$tgl2')  GROUP BY tanggal");
            //     // echo "SELECT tanggal as dr FROM curah_hujan WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2')  GROUP BY tanggal";
            //     $q2 = mysqli_query($link, "SELECT SUM($field_name)  AS $field_name from curah_hujan where tanggal BETWEEN '$tgl1' AND '$tgl2' group by tanggal");
            // } else if ($produk_tipe == "rainkripik") {
            //     $q = mysqli_query($link, "SELECT tanggal as dr FROM curah_hujan WHERE lokasi='Kripik'  AND (tanggal BETWEEN '$tgl1' AND '$tgl2')  GROUP BY tanggal");
            //     // echo "SELECT tanggal as dr FROM curah_hujan WHERE (tanggal BETWEEN '$tgl1' AND '$tgl2')  GROUP BY tanggal";
            //     $q2 = mysqli_query($link, "SELECT SUM($field_name)  AS $field_name from curah_hujan where tanggal BETWEEN '$tgl1' AND '$tgl2' group by tanggal");
            // }
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

            if ($tipe == 'sed_sim' || $tipe == 'tempf' || $tipe == 'tempa' || 'deb_banjirkripik' || $tipe == 'deb_banjir') {
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
