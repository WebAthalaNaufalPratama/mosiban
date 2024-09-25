<?php
/* Getting file name */
$filename = $_FILES['file']['name'];

$koneksi = mysqli_connect("localhost","u1041609_sedimen","*S3d1m3nt#","u1041609_tank_sedimen");
 
/* Location */
$location = "../img/" . $filename;
$uploadOk = 1;
$imageFileType = pathinfo($location, PATHINFO_EXTENSION);

/* Valid Extensions */
$valid_extensions = array("jpg", "jpeg", "png");
/* Check file extension */
if (!in_array(strtolower($imageFileType), $valid_extensions)) {
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo 0;
} else {
    /* Upload file */
    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
        echo $location;
    } else {
        echo 0;
    }
}