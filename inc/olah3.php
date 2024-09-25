<?php

date_default_timezone_set('Asia/Jakarta');
include "func.php";
$sa = new sedimen();
$link = $sa->koneksi();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
    
    if ($p === 'kreo') {
        
        $id = $_GET['id'];
        $sn = 202310240001;
        $curah_hujan = $_GET['curah_hujan'];
        $tanggal = $_GET['tanggal'];
        $waktu = $_GET['waktu'];
        $lokasi = 'Kreo';
    
        $s = mysqli_query($link, "SELECT Ha, ha1, a1, Ch, ha2, a2 FROM debit_sedimen WHERE lokasi='$lokasi' ORDER BY id DESC");
        $p_row = mysqli_fetch_row($s);
        $Ha = $p_row[0];
        $ha1 = $p_row[1];
        $a1 = $p_row[2];
        $Ch = $p_row[3];
        $ha2 = $p_row[4];
        $a2 = $p_row[5];
        
        $sed1 = ((($Ha + $curah_hujan) * $Ch) - $ha1) * $a1;
        $sed2 = ((($Ha + $curah_hujan) * $Ch) - $ha2) * $a2;
        $sed_sim = max($sed1 + $sed2, 0);
    

        $q = mysqli_query($link, "SELECT HA1, HA2, HA3, HB, HC, A0, A1, A2, A3, B0, B1, C0, C1, S1, S2, S3 FROM debit_banjir WHERE lokasi='$lokasi' ORDER BY id DESC");
        $d = mysqli_fetch_row($q);
    
        $HA1 = $d[0];
        $HA2 = $d[1];
        $HA3 = $d[2];
        $HB = $d[3];
        $HC = $d[4];
        $A0 = $d[5];
        $A1 = $d[6];
        $A2 = $d[7];
        $A3 = $d[8];
        $B0 = $d[9];
        $B1 = $d[10];
        $C0 = $d[11];
        $C1 = $d[12];
        $S1 = $d[13];
        $S2 = $d[14];
        $S3 = $d[15];
        
        $Q1 = max(($Ha + $curah_hujan - $HA1) * $A1, 0);
        $Q2 = max(($Ha + $curah_hujan - $HA2) * $A2, 0);
        $Q3 = max(($Ha + $curah_hujan - $HA3) * $A3, 0);
        $Qa0 = ($Ha + $curah_hujan) * $A0;
        $Q4 = max(($Ha1 + $Qa0 - $HB) * $B1, 0);
        $Qb0 = ($Ha1 + $Qa0) * $B0;
        $Q5 = max(($Ha2 + $Qb0 - $HC) * $C1, 0);
        $Qc0 = ($Ha2 + $Qb0) * $C0;
        $deb_banjir = $Q1 + $Q2 + $Q3 + $Q4 + $Q5;
    
        $currentDateTimeServer = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $waktu_server = $currentDateTimeServer->format('Y-m-d H:i:s');
    
        $specifiedDateTime = new DateTime($waktu);
    
        $delay = $currentDateTimeServer->getTimestamp() - $specifiedDateTime->getTimestamp();
    
        // Calculate hours, minutes, and seconds
        $hours = floor($delay / 3600);
        $minutes = floor(($delay % 3600) / 60);
        $seconds = $delay % 60;
    
        $data = mysqli_query($link, "INSERT INTO curah_hujan(id, sn, curah_hujan, tanggal, waktu, tanggal_server, waktu_server, lokasi, sed_sim, deb_banjir, delay) VALUES ('$id', '$sn', '$curah_hujan', '$tanggal', '$waktu', CURDATE(), '$waktu_server', '$lokasi', '$sed_sim', '$deb_banjir', '$delay')");
    
        if ($data) {
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil disimpan ke database',
                'data' => [
                    'id' => $id,
                    'sn' => $sn,
                    'curah_hujan' => $curah_hujan,
                    'tanggal' => $tanggal,
                    'waktu' => $waktu,
                    'lokasi' => $lokasi,
                    'sed_sim' => $sed_sim,
                    'deb_banjir' => $deb_banjir,
                    'delay' => $delay,
                    'waktu_server' => $waktu_server,
                ],
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menyimpan data ke database',
            ];
        }
    
        header('Content-Type: application/json');
        echo json_encode($response);

        
    }elseif ($p === 'notif') {
        $id = $_GET['id'];
        $fcm = $_GET['fcm'];
        
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
        header('Content-Type: application/json');
        echo json_encode($response);
    
        // Function to send push notification
        function sendPushNotification($fcm_token, $title, $message, $id = null, $action = null) {
            // Your previous logic for determining the notification content based on 'siaga' value
            $notif = mysqli_query($link, "SELECT deb_banjir FROM curah_hujan");
            $p = mysqli_fetch_row($notif);
            $siaga = $p[0];
            if ($siaga >= 200) {
                $title = 'SIAGA';
                $body = 'AWAS AKAN BANJIR';
            } else {
                $title = 'AMAN';
                $body = 'AMAN BRO';
            }
    
            // Rest of your FCM notification logic remains unchanged
            // ...
    
            // Ensure to return after sending the notification
            return $result;
        }
    
        // Call the function to send notification
        sendPushNotification($fcm, '', '');
    }elseif($p === 'kreoKamera'){
        $id = $_GET['id'];
        $gambar = $_GET['gambar'];
        $lokasi = 'Kreo';
        
        $data = mysqli_query($link, "INSERT INTO gambar(id, lokasi, gambar) VALUES ('$id', '$lokasi','$gambar')");
        
        if ($data) {
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil disimpan ke database',
                'data' => [
                    'id' => $id,
                    'lokasi' => $lokasi,
                    'gambar' => $gambar,
                ],
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menyimpan data ke database',
            ];
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }elseif ($p === 'kripik') {
        $id = $_GET['id'];
        $sn = 202310240002;
        $curah_hujan = $_GET['curah_hujan'];
        $tanggal = $_GET['tanggal'];
        $waktu = $_GET['waktu'];
        $lokasi = 'Kripik';
        // $delay= $_GET['delay'];
    
        $q = mysqli_query($link, "SELECT HA1, HA2, HA3, HB, HC, A0, A1, A2, A3, B0, B1, C0, C1, S1, S2, S3 FROM debit_banjir WHERE lokasi='$lokasi' ORDER BY id DESC");
        $d = mysqli_fetch_row($q);
        $s = mysqli_query($link, "SELECT Ha, ha1, a1, Ch, ha2, a2 FROM debit_sedimen WHERE lokasi='$lokasi' ORDER BY id DESC");
        $p = mysqli_fetch_row($s); // Mengubah $p menjadi $s
        $Ha = $p[0];
        $ha1 = $p[1];
        $a1 = $p[2];
        $Ch = $p[3];
        $ha2 = $p[4];
        $a2 = $p[5];
        $sed1 = ((($Ha + $curah_hujan) * $Ch) - $ha1) * $a1;
        $sed2 = ((($Ha + $curah_hujan) * $Ch) - $ha2) * $a2;
        $sed_sim = max($sed1 + $sed2, 0);
    
        $HA1 = $d[0];
        $HA2 = $d[1];
        $HA3 = $d[2];
        $HB = $d[3];
        $HC = $d[4];
        $A0 = $d[5];
        $A1 = $d[6];
        $A2 = $d[7];
        $A3 = $d[8];
        $B0 = $d[9];
        $B1 = $d[10];
        $C0 = $d[11];
        $C1 = $d[12];
        $S1 = $d[13];
        $S2 = $d[14];
        $S3 = $d[15];
        $Q1 = max(($Ha + $curah_hujan - $HA1) * $A1, 0);
        $Q2 = max(($Ha + $curah_hujan - $HA2) * $A2, 0);
        $Q3 = max(($Ha + $curah_hujan - $HA3) * $A3, 0);
        $Qa0 = ($Ha + $curah_hujan) * $A0;
        $Q4 = max(($Ha1 + $Qa0 - $HB) * $B1, 0);
        $Qb0 = ($Ha1 + $Qa0) * $B0;
        $Q5 = max(($Ha2 + $Qb0 - $HC) * $C1, 0);
        $Qc0 = ($Ha2 + $Qb0) * $C0;
        $deb_banjir = $Q1 + $Q2 + $Q3 + $Q4 + $Q5;
        
    
        // Ambil waktu server saat ini sesuai zona waktu 'Asia/Jakarta'
        $currentDateTimeServer = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $waktu_server = $currentDateTimeServer->format('Y-m-d H:i:s');
    
        $specifiedDateTime = new DateTime($waktu);
    
        $delay = $currentDateTimeServer->getTimestamp() - $specifiedDateTime->getTimestamp();
    
        // Calculate hours, minutes, and seconds
        $hours = floor($delay / 3600);
        $minutes = floor(($delay % 3600) / 60);
        $seconds = $delay % 60;
    
        $data = mysqli_query($link, "INSERT INTO curah_hujan(id, sn, curah_hujan, tanggal, waktu, tanggal_server, waktu_server, lokasi, sed_sim, deb_banjir, delay) VALUES ('$id', '$sn', '$curah_hujan', '$tanggal', '$waktu', CURDATE(), '$waktu_server', '$lokasi', '$sed_sim', '$deb_banjir', '$delay')");
    
        if ($data) {
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil disimpan ke database',
                'data' => [
                    'id' => $id,
                    'sn' => $sn,
                    'curah_hujan' => $curah_hujan,
                    'tanggal' => $tanggal,
                    'waktu' => $waktu,
                    'lokasi' => $lokasi,
                    'sed_sim' => $sed_sim,
                    'deb_banjir' => $deb_banjir,
                    'delay' => $delay,
                ],
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menyimpan data ke database',
            ];
        }
    
        header('Content-Type: application/json');
        echo json_encode($response);
    }elseif($p === 'kripikKamera'){
        $id = $_GET['id'];
        $gambar = $_GET['gambar'];
        $lokasi = 'Kripik';
        
        $data = mysqli_query($link, "INSERT INTO gambar(id, lokasi, gambar) VALUES ('$id', '$lokasi','$gambar')");
        
        if ($data) {
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil disimpan ke database',
                'data' => [
                    'id' => $id,
                    'lokasi' => $lokasi,
                    'gambar' => $gambar,
                ],
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menyimpan data ke database',
            ];
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
    } elseif ($p === 'barang') {
        $id = $_GET['id'];
        $sn = 202310240003;
        $curah_hujan = $_GET['curah_hujan'];
        $tanggal = $_GET['tanggal'];
        $waktu = $_GET['waktu'];
        $lokasi = 'Garang';
        // $delay= $_GET['delay'];
    
        $q = mysqli_query($link, "SELECT HA1, HA2, HA3, HB, HC, A0, A1, A2, A3, B0, B1, C0, C1, S1, S2, S3 FROM debit_banjir WHERE lokasi='$lokasi' ORDER BY id DESC");
        $d = mysqli_fetch_row($q);
        $s = mysqli_query($link, "SELECT Ha, ha1, a1, Ch, ha2, a2 FROM debit_sedimen WHERE lokasi='$lokasi' ORDER BY id DESC");
        $p = mysqli_fetch_row($s); // Mengubah $p menjadi $s
        $Ha = $p[0];
        $ha1 = $p[1];
        $a1 = $p[2];
        $Ch = $p[3];
        $ha2 = $p[4];
        $a2 = $p[5];
        $sed1 = ((($Ha + $curah_hujan) * $Ch) - $ha1) * $a1;
        $sed2 = ((($Ha + $curah_hujan) * $Ch) - $ha2) * $a2;
        $sed_sim = max($sed1 + $sed2, 0);
    
        $HA1 = $d[0];
        $HA2 = $d[1];
        $HA3 = $d[2];
        $HB = $d[3];
        $HC = $d[4];
        $A0 = $d[5];
        $A1 = $d[6];
        $A2 = $d[7];
        $A3 = $d[8];
        $B0 = $d[9];
        $B1 = $d[10];
        $C0 = $d[11];
        $C1 = $d[12];
        $S1 = $d[13];
        $S2 = $d[14];
        $S3 = $d[15];
        $Q1 = max(($Ha + $curah_hujan - $HA1) * $A1, 0);
        $Q2 = max(($Ha + $curah_hujan - $HA2) * $A2, 0);
        $Q3 = max(($Ha + $curah_hujan - $HA3) * $A3, 0);
        $Qa0 = ($Ha + $curah_hujan) * $A0;
        $Q4 = max(($Ha1 + $Qa0 - $HB) * $B1, 0);
        $Qb0 = ($Ha1 + $Qa0) * $B0;
        $Q5 = max(($Ha2 + $Qb0 - $HC) * $C1, 0);
        $Qc0 = ($Ha2 + $Qb0) * $C0;
        $deb_banjir = $Q1 + $Q2 + $Q3 + $Q4 + $Q5;
        
        $sed_sim = max($sed_sim, 0);
        $deb_banjir = max($deb_banjir, 0);
    
        // Ambil waktu server saat ini sesuai zona waktu 'Asia/Jakarta'
        $currentDateTimeServer = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $waktu_server = $currentDateTimeServer->format('Y-m-d H:i:s');
    
        $specifiedDateTime = new DateTime($waktu);
    
        $delay = $currentDateTimeServer->getTimestamp() - $specifiedDateTime->getTimestamp();
    
        // Calculate hours, minutes, and seconds
        $hours = floor($delay / 3600);
        $minutes = floor(($delay % 3600) / 60);
        $seconds = $delay % 60;
    
        $data = mysqli_query($link, "INSERT INTO curah_hujan(id, sn, curah_hujan, tanggal, waktu, tanggal_server, waktu_server, lokasi, sed_sim, deb_banjir, delay) VALUES ('$id', '$sn', '$curah_hujan', '$tanggal', '$waktu', CURDATE(), '$waktu_server', '$lokasi', '$sed_sim', '$deb_banjir', '$delay')");
    
        if ($data) {
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil disimpan ke database',
                'data' => [
                    'id' => $id,
                    'sn' => $sn,
                    'curah_hujan' => $curah_hujan,
                    'tanggal' => $tanggal,
                    'waktu' => $waktu,
                    'lokasi' => $lokasi,
                    'sed_sim' => $sed_sim,
                    'deb_banjir' => $deb_banjir,
                    'delay' => $delay,
                ],
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menyimpan data ke database',
            ];
        }
    
        header('Content-Type: application/json');
        echo json_encode($response);
    }elseif($p === 'garangKamera'){
        $id = $_GET['id'];
        $gambar = $_GET['gambar'];
        $lokasi = 'Garang';
        
        $data = mysqli_query($link, "INSERT INTO gambar(id, lokasi, gambar) VALUES ('$id', '$lokasi','$gambar')");
        
        if ($data) {
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil disimpan ke database',
                'data' => [
                    'id' => $id,
                    'lokasi' => $lokasi,
                    'gambar' => $gambar,
                ],
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Gagal menyimpan data ke database',
            ];
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
    } elseif($p = 'getDataAll'){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Headers: Content-Type");
        
        $data_kreo = mysqli_query($link, "SELECT tanggal, waktu, curah_hujan, sed_sim, deb_banjir FROM curah_hujan WHERE lokasi='Kreo' order by tanggal DESC, waktu DESC LIMIT 1");
        $data_kripik = mysqli_query($link, "SELECT tanggal, waktu, curah_hujan, sed_sim, deb_banjir FROM curah_hujan WHERE lokasi='Kripik' order by tanggal DESC, waktu DESC LIMIT 1");
        $data_garang = mysqli_query($link, "SELECT tanggal, waktu, curah_hujan, sed_sim, deb_banjir FROM curah_hujan WHERE lokasi='Garang' order by tanggal DESC, waktu DESC LIMIT 1");
        
        $q_kreo = mysqli_fetch_assoc($data_kreo);
        $q_kripik = mysqli_fetch_assoc($data_kripik);
        $q_garang = mysqli_fetch_assoc($data_garang);
        
        $result = array(
            'kreo' => $q_kreo,    
            'kripik' => $q_kripik,    
            'garang' => $q_garang,    
        );
        
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    
}


?>
