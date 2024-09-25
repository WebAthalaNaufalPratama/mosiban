<?php
include "view.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>

    <?php
    header("Content-Type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data.xls");
    // header("Pragma : no-cache");
    // header("Expires : 0");
    ?>

    <table border="1">
        <tr>

            <?php
            if (isset($_GET['j'])) {
                $tgl1 = $_GET['tgl1'];
                $tgl2 = $_GET['tgl2'];
                $waktu1 = $_GET['waktu1'];
                if ($tgl1 == $tgl2 && $waktu1 == '') {
            ?>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Curah Hujan</th>
                    <th>Sed Sim</th>
                    <th>Deb Banjir</th>
                <?php
                } else if ($tgl1 != $tgl2 && $waktu1 == '') {
                ?>

                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Curah Hujan</th>
                    <th>Sed Sim</th>
                    <th>Deb Banjir</th>
                <?php
                } else if (($tgl1 == $tgl2 && $waktu1 != '')) {
                ?>

                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Curah Hujan</th>
                    <th>Sed Sim</th>
                    <th>Deb Banjir</th>

                <?php
                }
                ?>
        </tr>
    <?php
            }

    ?>
    <?php
    // koneksi database
    $link = mysqli_connect("localhost", "u968599804_sedimen", "*S3d1m3nt#", "u968599804_tank_sedimen");
    if (isset($_GET['j'])) {
        $tgl1 = $_GET['tgl1'];
        $tgl2 = $_GET['tgl2'];
        $waktu1 = $_GET['waktu'];

        // menampilkan data pegawai
        if ($tgl1 == $tgl2 && $waktu1 == '') {
            $data = mysqli_query($link, "SELECT SUM(curah_hujan), tanggal, waktu, SUM(sed_sim), SUM(deb_banjir) FROM curah_hujan WHERE lokasi='Kreo' AND tanggal ='$tgl1' group by HOUR(waktu)");
        } else if ($tgl1 != $tgl2 && $waktu1 == '') {

            $data = mysqli_query($link, "SELECT SUM(curah_hujan), tanggal, waktu, SUM(sed_sim), SUM(deb_banjir) FROM curah_hujan WHERE lokasi='Kreo' AND tanggal BETWEEN '$tgl1' AND '$tgl2' group by tanggal");
        } else if ($tgl1 == $tgl2 && $waktu1 != '') {

            $data = mysqli_query($link, "SELECT SUM(curah_hujan), tanggal, waktu, SUM(sed_sim), SUM(deb_banjir) FROM curah_hujan where lokasi='Kreo' AND (tanggal BETWEEN '$tgl1' AND '$tgl2') AND HOUR(waktu) = '$waktu1' group by UNIX_TIMESTAMP(waktu) DIV 300");
        }

        $no = 1;
        while ($a = mysqli_fetch_array($data)) {
            if ($tgl1 == $tgl2 && $waktu1 == '') {
    ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $a[1]; ?></td>
                    <td><?php echo $a[2]; ?></td>
                    <td><?php echo $a[0]; ?></td>
                    <td><?php echo $a[3]; ?></td>
                    <td><?php echo $a[4]; ?></td>
                    <td><?php echo $a[5]; ?></td>
                </tr>
            <?php
            } else if ($tgl1 != $tgl2 && $waktu1 == '') {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $a[1]; ?></td>
                    <td><?php echo $a[0]; ?></td>
                    <td><?php echo round($a[3],4); ?></td>
                    <td><?php echo $a[4]; ?></td>
                    <td><?php echo $a[5]; ?></td>
                </tr>
            <?php
            } else if ($tgl1 == $tgl2 && $waktu1 != '') {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $a[1]; ?></td>
                    <td><?php echo $a[2]; ?></td>
                    <td><?php echo $a[0]; ?></td>
                    <td><?php echo $a[3]; ?></td>
                    <td><?php echo $a[4]; ?></td>
                    <td><?php echo $a[5]; ?></td>
                </tr>
    <?php
            }
        }
    }
    ?>
    </table>
</body>

</html>