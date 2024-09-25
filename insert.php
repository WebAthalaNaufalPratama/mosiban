
<?php
session_start();

include 'inc/func.php';
$sa = new sedimen();
$link = $sa->koneksi();


$data = mysqli_query($link, "SELECT COUNT(id) as no FROM curah_hujan");
while ($d = mysqli_fetch_row($data)) {
    $jumlah = $d[0];
    echo $jumlah;
}
for ($x = 1; $x <= $jumlah; $x++) {

    mysqli_query($link, "UPDATE curah_hujan SET sn='2021100002'");
}
if (mysqli_affected_rows($conn) > 0) {
    echo "New record created successfully";
} else {
    echo "Error: " . $link . "<br>" . mysqli_error($link);
}

?>