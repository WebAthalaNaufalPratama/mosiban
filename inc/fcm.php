<?php
    include "func.php";
    $sa = new sedimen();
    $link = $sa->koneksi();
    
    $sql = mysqli_query($link, "SELECT fcm FROM fcm ORDER BY id DESC LIMIT 1");
    
    if ($sql->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($sql)) {
            $deviceToken = $row['fcm'];
            
            $url = "https://fcm.googleapis.com/fcm/send";
            $serverKey = 'AAAAwsML0uw:APA91bGuAEPA_sHLOoEZmPzzl0SCjwCGgxNwJ7jfLkB_OyHZW3m2o1huJlWsqFTo7Qc3MMSUeI_74VB6OTwkLDB5W6dhgiil22nB-C1XU56V0aYXL0Eg3uR-OsScJDkpRHfgpuRjDdns'; 
            $header = [
                'authorization: key=' . $serverKey,
                'content-type: application/json'
            ];    
        
            // Lakukan query untuk mendapatkan informasi untuk notifikasi
            $notif = mysqli_query($link, "SELECT deb_banjir FROM curah_hujan ORDER BY id DESC LIMIT 1");
            $p = mysqli_fetch_row($notif);
            $siaga = $p[0];
            if ($siaga >= 200) {
                $title = 'SIAGA';
                $body = 'AWAS AKAN BANJIR';
            } else {
                $title = 'AMAN';
                $body = 'AMAN BRO';
            }
            
            $notification = [
                'title' => $title,
                'body' => $body
            ];
        
            $fcmNotification = [
                'to' => $deviceToken,
                'notification' => $notification,
            ];
        
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_ENCODING, '');
            curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        
            $result = curl_exec($ch);
            $err = curl_error($ch);
            
            curl_close($ch);
            // return $result;
            if($err){
                echo "cURL ERROR #:" . $err;
            }else{
                echo $result;
            }
            // Lakukan log atau sesuatu jika diperlukan setelah pengiriman notifikasi
        }
    }
?>