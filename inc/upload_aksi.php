<?php
// Menghubungkan dengan koneksi
include "olah.php";
$link = $sa->koneksi();
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['upload'])) {
    if ($_FILES['file']['type'] == 'application/vnd.ms-excel' || $_FILES['file']['type'] == 'text/csv' || $_FILES['file']['type'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
        $file_path = $_FILES['file']['tmp_name'];
        
        if ($_FILES['file']['type'] == 'application/vnd.ms-excel') {
            // Jika file adalah XLS
            require('php-excel-reader/excel_reader2.php');
            require('SpreadsheetReader.php');
            $data = new Spreadsheet_Excel_Reader($file_path, false);
        } elseif ($_FILES['file']['type'] == 'text/csv' || $_FILES['file']['type'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
            // Jika file adalah CSV atau XLSX
            // Baca data dari file CSV (misalnya, menggunakan fgetcsv) atau file XLSX (gunakan pustaka khusus untuk XLSX)
            if ($_FILES['file']['type'] == 'text/csv') {
                // Baca data dari file CSV
                $csvData = array_map('str_getcsv', file($file_path));
            } elseif ($_FILES['file']['type'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
                // Baca data dari file XLSX (anda perlu pustaka tambahan untuk XLSX)
                // Contoh menggunakan PhpSpreadsheet:
                
                
                $spreadsheet = IOFactory::load($file_path);
                $worksheet = $spreadsheet->getActiveSheet();
                $csvData = [];
                foreach ($worksheet->getRowIterator() as $row) {
                    $rowData = [];
                    foreach ($row->getCellIterator() as $cell) {
                        $rowData[] = $cell->getValue();
                    }
                    $csvData[] = $rowData;
                }
            }
        }

        if (isset($data)) {
            for ($i = 2; $i <= $data->rowcount(0); $i++) {
                // Proses data XLS
                $Ha = $data->val($i, 1);
                $ha1 = $data->val($i, 2);
                $a1 = $data->val($i, 3);
                $Ch = $data->val($i, 4);
                $ha2 = $data->val($i, 5);
                $a2 = $data->val($i, 6);
                $a0 = $data->val($i, 7);
                $lokasi = $data->val($i, 8);
                mysqli_query($link, "INSERT INTO debit_sedimen (Ha, ha1, a1, Ch, ha2, a2, a0, lokasi, tanggal, waktu) VALUES ('$Ha', '$ha1', '$a1', '$Ch', '$ha2', '$a2', '$a0', '$lokasi', CURDATE(), CURTIME())");
            }
        } elseif (isset($csvData)) {
            // Proses data CSV atau XLSX
            foreach ($csvData as $row) {
                $Ha = $row[0];
                $ha1 = $row[1];
                $a1 = $row[2];
                $Ch = $row[3];
                $ha2 = $row[4];
                $a2 = $row[5];
                $a0 = $row[6];
                $lokasi = $row[7];
                mysqli_query($link, "INSERT INTO debit_sedimen (Ha, ha1, a1, Ch, ha2, a2, a0, lokasi, tanggal, waktu) VALUES ('$Ha', '$ha1', '$a1', '$Ch', '$ha2', '$a2', '$a0', '$lokasi', CURDATE(), CURTIME())");
            }
        }

        unlink($_FILES['file']['name']);
        header("location:../login/index.php?p=configuration");
    } else {
        echo "Tipe file tidak valid. Hanya file XLS, XLSX, atau CSV yang diperbolehkan.";
    }
}
?>
