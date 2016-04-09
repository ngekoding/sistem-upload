<?php 
include '../config.php';

if (isset($_POST['submit'])) {
	$old_password = $_POST['old-password'];
	$new_password = $_POST['new-password'];
	$name = $_POST['name'];

	$old_password_md5 = md5($old_password);
	$new_password_md5 = md5($new_password);

	// Cek old password
	$cek = mysqli_query($connect, "SELECT * FROM asisten WHERE password='$old_password_md5' AND nim='$_SESSION[login]'");
	$c = mysqli_num_rows($cek);

	if (!$name) {
		$error = "Data belum lengkap!";
	} else if (!empty($old_password) && $c == 0) {
		$error = "Password Lama salah!";
	} else if (!empty($old_password) && empty($new_password)) {
		$error = "Password Baru belum diisi!";
	} else {
		if (!empty($old_password) && !empty($new_password)) {
			$change_password = " password='$new_password_md5', ";
		} else {
			$change_password = "";
		}

		$q = mysqli_query($connect, "UPDATE asisten SET $change_password nama='$name' WHERE nim='$_SESSION[login]'");
		if ($q) {
			$success = "Data Berhasil diubah.";
			$_SESSION['login_name'] = $name;
		} else {
			$error = "Terjadi kesalahan!";
		}
	}

	@show_error($error);
	@show_success($success);
}