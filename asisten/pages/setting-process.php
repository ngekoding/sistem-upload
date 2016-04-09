<?php 
include '../config.php';

if (isset($_POST['submit'])) {
	$old_password = $_POST['old-password'];
	$new_password = $_POST['new-password'];
	
	$old_password_md5 = md5($old_password);
	$new_password_md5 = md5($new_password);

	// Cek old password
	$cek = mysqli_query($connect, "SELECT * FROM asisten WHERE password='$old_password_md5' AND nim='$_SESSION[login]'");
	$c = mysqli_num_rows($cek);

	if (!$old_password || !$new_password) {
		$error = "Data belum lengkap!";
	} else if ($c == 0) {
		$error = "Password Lama salah!";
	} else {
		$q = mysqli_query($connect, "UPDATE asisten SET password='$new_password_md5' WHERE nim='$_SESSION[login]'");
		if ($q) {
			$success = "Password berhasil diubah.";
		} else {
			$error = "Terjadi kesalahan!";
		}
	}

	@show_error($error);
	@show_success($success);
}