<?php 

if (isset($_POST['submit'])) {
	$nim = $_POST['nim'];
	$asisten = $_POST['asisten'];
	$file_name = $_FILES['file']['name'];
	$file_type = $_FILES['file']['type'];
	$file_tmp = $_FILES['file']['tmp_name'];

	// Get praktikan kelas --> sesuaikan dengan yang aktif
	$get = mysqli_query($connect, "SELECT kelas FROM praktikan WHERE nim='$nim'");
	$c = mysqli_num_rows($get);
	if ($c == 1) {
		$data = mysqli_fetch_array($get);
			$praktikan_kelas = $data['kelas'];
	}

	$dir = "uploads/$praktikan_kelas/";
	if (!file_exists($dir)) mkdir($dir, 0755, true);

	// Mengecek tipe file
	$ex = explode(".", $file_name);
	$type = $ex[count($ex) - 1];

	if (!$nim or !$asisten or !$file_name) {
		$error = "Data belum lengkap!";
	} else if ($type != "zip") {
		$error = "Tipe file tidak sesuai!";
	} else if(!in_array($praktikan_kelas, get_kelas_aktif())) {
		$error = "Sekarang bukan kelas Anda!";
	} else {
		$file_uploaded_name = $dir.$nim.".zip";
		$upload = move_uploaded_file($file_tmp, $file_uploaded_name);
		if (!$upload) {
			$error = "File gagal diunggah!";
		} else {
			$q = mysqli_query($connect, "INSERT INTO unggahan (nim, asisten, file) VALUES ('$nim','$asisten','$file_uploaded_name')");
			if (!$q) {
				$error = "Terjadi kesalahan!";
			} else {
				$success = "Data berhasil ditambahkan.";
			}
		}
	}

	if(isset($error)) {
	?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Gagal!</strong> <?=$error?>
	</div>
	<?php
	}

	if (isset($success)) {
	?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Berhasil!</strong> <?=$success?>
	</div>
	<?php
	}
}
