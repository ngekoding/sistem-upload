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

function show_error($msg) {
	if(isset($msg)) {
	?>
	<div class="alert alert-danger fade in">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Gagal!</strong> <?=$msg?>
	</div>
	<?php
	}
}

function show_success($msg) {
	if (isset($msg)) {
	?>
	<div class="alert alert-success fade in">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Berhasil!</strong> <?=$msg?>
	</div>
	<?php
	}
}
?>