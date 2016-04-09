<?php
function get_kelas_aktif() {
	global $connect;
	$q = mysqli_query($connect, "SELECT * FROM kelas WHERE status='1'");
	$c = mysqli_num_rows($q);
	$kelas = array();
	if ($c > 0) {
		while ($data = mysqli_fetch_array($q)) {
			$id = $data['id'];
			array_push($kelas, $id);
		}
	}
	return $kelas;
}
?>