<?php 
if(isset($_GET['showall'])) {
	$checked = "checked";
	$where = "";
	$link = "index.php?page=unggahan&showall=true";
} else {
	$where = "AND u.asisten='$_SESSION[login]'";
	$link = "index.php?page=unggahan";
}

// Remove
if (isset($_GET['remove'])) {
	$nim_rem = $_GET['remove'];
	$nim_kelas = $_GET['kelas'];
	$rem_file = unlink("../uploads/$nim_kelas/$nim_rem.zip");
	if ($rem_file) {
		$q = mysqli_query($connect, "DELETE FROM unggahan WHERE nim='$nim_rem'");
	}
	if ($q) {
		@show_success("Unggahan praktikan $nim_rem berhasil dihapus.");
	} else {
		@show_error("Terjadi kesalahan!");
	}
}
?>

<input type="checkbox" id="show-all" <?=@$checked?>> Semua Praktikan <br><br>
<div class="input-group"> <span class="input-group-addon">Filter</span>
    <input id="filter" type="text" class="form-control" placeholder="Type here...">
</div>

<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th width="50">No</th>
			<th>Kelas</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Waktu Upload</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody class="searchable">
		<?php
		$q = mysqli_query($connect, "SELECT u.nim, u.waktu, u.file, p.nama, p.kelas FROM unggahan u JOIN praktikan p ON u.nim=p.nim WHERE 1=1 $where ORDER BY p.nim");
		$c = mysqli_num_rows($q);
		if ($c > 0) {
			$no = 1;
			while ($data = mysqli_fetch_array($q)) {
				$nim = $data['nim'];
				$nama = $data['nama'];
				$kelas = $data['kelas'];
				$waktu = $data['waktu'];
				$file = $data['file'];

				echo "<tr>";
				echo "<td>".$no++."</td>";
				echo "<td>".$kelas."</td>";
				echo "<td>".$nim."</td>";
				echo "<td>".$nama."</td>";
				echo "<td>".$waktu."</td>";
				echo "<td>
					<a href=\"../$file\"><i class='fa fa-download' title='Download'></i></a>
					<a href='$link&remove=$nim&kelas=$kelas' onclick=\"return confirm('Anda yakin ingin menghapus data ini?')\"><i class='fa fa-trash' title='Hapus'></i></a>
					  </td>";
				echo "</tr>";
			}
		} else {
			echo "<tr>";
			echo "<td colspan='6' align='center'><p>Belum ada praktikan yang mengumpulkan.</p></td>";
			echo "</tr>";
		}
		?>
	</tbody>
</table>