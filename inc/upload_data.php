
<?php
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

// menghubungkan dengan koneksi
include "olah.php";
$link = $sa->koneksi();


if (isset($_POST['upload'])) {
    // Pastikan file yang diunggah adalah file Excel (XLS)
    if ($_FILES['file']['type'] == 'application/vnd.ms-excel') {
        $file_path = $_FILES['file']['tmp_name'];
        
        // Load file Excel dengan PhpSpreadsheet
        $spreadsheet = IOFactory::load($file_path);
        $worksheet = $spreadsheet->getActiveSheet();
        
        // Mendapatkan data dari lembar kerja Excel ke dalam $data_array
        $data_array = $worksheet->toArray();

        // Mulai dari baris kedua (indeks 1) karena baris pertama adalah header
        array_shift($data_array);
        
        mysqli_query($link, "DELETE FROM debit_sedimen WHERE lokasi='Kreo'");
        
        
        // Simpan data ke dalam database
        foreach ($data_array as $row) {
            $Ha = $row[0];
            $Ha1 = $row[1];
            $a1 = $row[2];
            $Ch = $row[3];
            $ha2 = $row[4];
            $a2 = $row[5];
            $a0 = $row[6];
            $lokasi ='Kreo';
            
            

            // Simpan data ke dalam tabel database
            mysqli_query($link, "INSERT INTO debit_sedimen (Ha, Ha1, a1, Ch, ha2, a2, a0, lokasi, tanggal, waktu) VALUES ('$Ha', '$Ha1', '$a1', '$Ch', '$ha2', '$a2', '$a0', '$lokasi', CURDATE(), CURTIME())");
        }

        // Alihkan halaman ke index.php
        header("location:../login/index.php?p=configuration");

    } else {
        echo "Tipe file tidak valid. Hanya file XLS yang diperbolehkan.";
    }
}

if (isset($_POST['upload3'])) {
    // Pastikan file yang diunggah adalah file Excel (XLS)
    if ($_FILES['file']['type'] == 'application/vnd.ms-excel') {
        $file_path = $_FILES['file']['tmp_name'];
        
        // Load file Excel dengan PhpSpreadsheet
        $spreadsheet = IOFactory::load($file_path);
        $worksheet = $spreadsheet->getActiveSheet();
        
        // Mendapatkan data dari lembar kerja Excel ke dalam $data_array
        $data_array = $worksheet->toArray();

        // Mulai dari baris kedua (indeks 1) karena baris pertama adalah header
        array_shift($data_array);
        
        mysqli_query($link, "DELETE FROM debit_sedimen WHERE lokasi='Kripik'");
        
        
        // Simpan data ke dalam database
        foreach ($data_array as $row) {
            $Ha = $row[0];
            $Ha1 = $row[1];
            $a1 = $row[2];
            $Ch = $row[3];
            $ha2 = $row[4];
            $a2 = $row[5];
            $a0 = $row[6];
            $lokasi ='Kripik';
            

            // Simpan data ke dalam tabel database
            mysqli_query($link, "INSERT INTO debit_sedimen (Ha, Ha1, a1, Ch, ha2, a2, a0, lokasi, tanggal, waktu) VALUES ('$Ha', '$Ha1', '$a1', '$Ch', '$ha2', '$a2', '$a0','$lokasi', CURDATE(), CURTIME())");
        }

        // Alihkan halaman ke index.php
        // header("location:../login/index.php?p=configuration");
        header("location:../login/index.php?p=configuration");

    } else {
        echo "Tipe file tidak valid. Hanya file XLS yang diperbolehkan.";
    }
}

if (isset($_POST['upload5'])) {
    // Pastikan file yang diunggah adalah file Excel (XLS)
    if ($_FILES['file']['type'] == 'application/vnd.ms-excel') {
        $file_path = $_FILES['file']['tmp_name'];
        
        // Load file Excel dengan PhpSpreadsheet
        $spreadsheet = IOFactory::load($file_path);
        $worksheet = $spreadsheet->getActiveSheet();
        
        // Mendapatkan data dari lembar kerja Excel ke dalam $data_array
        $data_array = $worksheet->toArray();

        // Mulai dari baris kedua (indeks 1) karena baris pertama adalah header
        array_shift($data_array);
        
        mysqli_query($link, "DELETE FROM debit_sedimen WHERE lokasi='Garang'");
        
        
        // Simpan data ke dalam database
        foreach ($data_array as $row) {
            $Ha = $row[0];
            $Ha1 = $row[1];
            $a1 = $row[2];
            $Ch = $row[3];
            $ha2 = $row[4];
            $a2 = $row[5];
            $a0 = $row[6];
            $lokasi ='Garang';
            
            

            // Simpan data ke dalam tabel database
            mysqli_query($link, "INSERT INTO debit_sedimen (Ha, Ha1, a1, Ch, ha2, a2, a0, lokasi, tanggal, waktu) VALUES ('$Ha', '$Ha1', '$a1', '$Ch', '$ha2', '$a2', '$a0', '$lokasi', CURDATE(), CURTIME())");
        }

        // Alihkan halaman ke index.php
        // header("location:../login/index.php?p=configuration");
        header("location:../login/index.php?p=configuration");

    } else {
        echo "Tipe file tidak valid. Hanya file XLS yang diperbolehkan.";
    }
}




if (isset($_POST['upload2'])) {
    // Pastikan file yang diunggah adalah file Excel (XLS)
    if ($_FILES['file']['type'] == 'application/vnd.ms-excel') {
        $file_path = $_FILES['file']['tmp_name'];
        
        // Load file Excel dengan PhpSpreadsheet
        $spreadsheet = IOFactory::load($file_path);
        $worksheet = $spreadsheet->getActiveSheet();

        // Mendapatkan data dari lembar kerja Excel ke dalam $data_array
        $data_array = $worksheet->toArray();

        // Mulai dari baris kedua (indeks 1) karena baris pertama adalah header
        array_shift($data_array);
        
        mysqli_query($link, "DELETE FROM debit_banjir WHERE lokasi='Kreo'");
        
        // Simpan data ke dalam database
        foreach ($data_array as $row) {
            $HA1 = $row[0];
            $HA2 = $row[1];
            $HA3 = $row[2];
            $HB = $row[3];
            $HC = $row[4];
            $A0 = $row[5];
            $A1 = $row[6];
            $A2 = $row[7];
            $A3 = $row[8];
            $B0 = $row[9];
            $B1 = $row[10];
            $C0 = $row[11];
            $C1 = $row[12];
            $S1 = $row[13];
            $S2 = $row[14];
            $S3 = $row[15];
            $lokasi = 'Kreo';

            // Simpan data ke dalam tabel database
            mysqli_query($link, "INSERT INTO debit_banjir (HA1, HA2, HA3, HB, HC, A0, A1, A2, A3, B0, B1, C0, C1, S1, S2, S3, lokasi, tanggal, waktu) VALUES ('$HA1', '$HA2', '$HA3', '$HB', '$HC', '$A0', '$A1', '$A2', '$A3', '$B0', '$B1', '$C0', '$C1', '$S1', '$S2', '$S3', $lokasi, CURDATE(), CURTIME())");
        }

        // Alihkan halaman ke index.php
        // header("location:../login/index.php?p=configuration");
        header("location:../login/index.php?p=configuration");

    } else {
        echo "Tipe file tidak valid. Hanya file XLS yang diperbolehkan.";
    }
}

if (isset($_POST['upload4'])) {
    // Pastikan file yang diunggah adalah file Excel (XLS)
    if ($_FILES['file']['type'] == 'application/vnd.ms-excel') {
        $file_path = $_FILES['file']['tmp_name'];
        
        // Load file Excel dengan PhpSpreadsheet
        $spreadsheet = IOFactory::load($file_path);
        $worksheet = $spreadsheet->getActiveSheet();

        // Mendapatkan data dari lembar kerja Excel ke dalam $data_array
        $data_array = $worksheet->toArray();

        // Mulai dari baris kedua (indeks 1) karena baris pertama adalah header
        array_shift($data_array);
        
        mysqli_query($link, "DELETE FROM debit_banjir WHERE lokasi='Kripik'");
        
        // Simpan data ke dalam database
        foreach ($data_array as $row) {
            $HA1 = $row[0];
            $HA2 = $row[1];
            $HA3 = $row[2];
            $HB = $row[3];
            $HC = $row[4];
            $A0 = $row[5];
            $A1 = $row[6];
            $A2 = $row[7];
            $A3 = $row[8];
            $B0 = $row[9];
            $B1 = $row[10];
            $C0 = $row[11];
            $C1 = $row[12];
            $S1 = $row[13];
            $S2 = $row[14];
            $S3 = $row[15];
            $lokasi = 'Kripik';
            

            // Simpan data ke dalam tabel database
            mysqli_query($link, "INSERT INTO debit_banjir (HA1, HA2, HA3, HB, HC, A0, A1, A2, A3, B0, B1, C0, C1, S1, S2, S3, lokasi, tanggal, waktu) VALUES ('$HA1', '$HA2', '$HA3', '$HB', '$HC', '$A0', '$A1', '$A2', '$A3', '$B0', '$B1', '$C0', '$C1', '$S1', '$S2', '$S3', $lokasi, CURDATE(), CURTIME())");
        }

        // Alihkan halaman ke index.php
        // header("location:../login/index.php?p=configuration");
        // header("location: ../login/index.php?p=configuration&berhasil=Data berhasil diimpor.");
        header("location:../login/index.php?p=configuration");

    } else {
        echo "Tipe file tidak valid. Hanya file XLS yang diperbolehkan.";
    }
}

if (isset($_POST['upload6'])) {
    // Pastikan file yang diunggah adalah file Excel (XLS)
    if ($_FILES['file']['type'] == 'application/vnd.ms-excel') {
        $file_path = $_FILES['file']['tmp_name'];
        
        // Load file Excel dengan PhpSpreadsheet
        $spreadsheet = IOFactory::load($file_path);
        $worksheet = $spreadsheet->getActiveSheet();

        // Mendapatkan data dari lembar kerja Excel ke dalam $data_array
        $data_array = $worksheet->toArray();

        // Mulai dari baris kedua (indeks 1) karena baris pertama adalah header
        array_shift($data_array);
        
        mysqli_query($link, "DELETE FROM debit_banjir WHERE lokasi='Garang'");
        
        // Simpan data ke dalam database
        foreach ($data_array as $row) {
            $HA1 = $row[0];
            $HA2 = $row[1];
            $HA3 = $row[2];
            $HB = $row[3];
            $HC = $row[4];
            $A0 = $row[5];
            $A1 = $row[6];
            $A2 = $row[7];
            $A3 = $row[8];
            $B0 = $row[9];
            $B1 = $row[10];
            $C0 = $row[11];
            $C1 = $row[12];
            $S1 = $row[13];
            $S2 = $row[14];
            $S3 = $row[15];
            $lokasi = 'Garang';

            // Simpan data ke dalam tabel database
            mysqli_query($link, "INSERT INTO debit_banjir (HA1, HA2, HA3, HB, HC, A0, A1, A2, A3, B0, B1, C0, C1, S1, S2, S3, lokasi, tanggal, waktu) VALUES ('$HA1', '$HA2', '$HA3', '$HB', '$HC', '$A0', '$A1', '$A2', '$A3', '$B0', '$B1', '$C0', '$C1', '$S1', '$S2', '$S3', $lokasi, CURDATE(), CURTIME())");
        }

        // Alihkan halaman ke index.php
        // header("location:../login/index.php?p=configuration");
        header("location:../login/index.php?p=configuration");

    } else {
        echo "Tipe file tidak valid. Hanya file XLS yang diperbolehkan.";
    }
}

?>
