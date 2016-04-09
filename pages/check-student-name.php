<?php 
require '../config.php';

$nim = $_POST['nim'];

$q = mysqli_query($connect, "SELECT nama FROM praktikan WHERE nim='$nim'");
$c = mysqli_num_rows($q);
if ($c > 0) {
	$data = mysqli_fetch_array($q);
		$nama = $data['nama'];

	echo $nama;
}