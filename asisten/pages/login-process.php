<?php

if (isset($_POST['submit'])) {
	$nim = $_POST['username'];
	$pass = $_POST['password'];

	if (!$nim or !$pass) {
		$error = "Dat belum lengkap!";
	} else {
		$pass_md5 = md5($pass);
		$q = mysqli_query($connect, "SELECT * FROM asisten WHERE nim='$nim' AND password='$pass_md5'");
		$c = mysqli_num_rows($q);
		if ($c == 1) {
			$data = mysqli_fetch_array($q);
			$_SESSION['login'] = $nim;
			$_SESSION['login_name'] = $data['nama'];
			header("location: index.php");
		} else {
			$error = "Username / Password Salah!";
		}
	}

	if(isset($error)) {
	?>
	<div class="alert alert-danger" id="login-alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?=$error?>
	</div>
	<?php
	}
}