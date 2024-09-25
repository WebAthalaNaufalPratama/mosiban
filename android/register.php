<?php

$koneksi = mysqli_connect("localhost","u1041609_sedimen","*S3d1m3nt#","u1041609_tank_sedimen");
 
class usr{}

	$username = $_POST["username"];
	$no_hp = $_POST["no_hp"];
	$password = $_POST['password'];
	$nama = $_POST["nama"];

   if ((empty($username))) {
		$response = new usr();
		$response->success = false;
		$response->message = "Kolom email tidak boleh kosong";
		die(json_encode($response));
	} else if ((empty($password))) {
		$response = new usr();
		$response->success = false;
		$response->message = "Kolom password tidak boleh kosong";
		die(json_encode($response));
	} else if ((empty($nama))) {
		$response = new usr();
		$response->success = false;
		$response->message = "Kolom nama tidak boleh kosong";
		die(json_encode($response));
	}else if ((empty($no_hp))) {
		$response = new usr();
		$response->success = false;
		$response->message = "Kolom kontak tidak boleh kosong";
		die(json_encode($response));
	} else {
		if (!empty($username) && ($password) && ($no_hp)){
			$num_rows = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM login WHERE username='".$username."'"));

			if ($num_rows == 0){
				$query = mysqli_query($koneksi, "INSERT INTO login(username, password, nama, no_hp) VALUE ('$username',md5('$password'),'$nama','$no_hp')");

				if ($query){
					$response = new usr();
					$response->success = true;
					$response->message = "Register berhasil, silahkan login.";
					$response->data = [
                            'username' => $username,
                            'nama' => $nama,
                            'no_hp'=> $no_hp
                        ];
					die(json_encode($response));

				} else {
					$response = new usr();
					$response->success = false;
					$response->message = "Username sudah ada";
					die(json_encode($response));
				}
			} else {
				$response = new usr();
				$response->success = false;
				$response->message = "Username sudah ada";
				die(json_encode($response));
			}
		}
	}

	mysqli_close($koneksi);
 
 ?>