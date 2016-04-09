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
		</tr>
	</thead>
	<tbody class="searchable">
		<?php
		$kelas_aktif = get_kelas_aktif();
		$kelas = "";
		foreach ($kelas_aktif as $k) {
			$kelas .= "'".$k."',";
		}
		$kelas = rtrim($kelas,',');

		$q = mysqli_query($connect, "SELECT u.nim, u.waktu, u.file, p.nama, p.kelas FROM unggahan u JOIN praktikan p ON u.nim=p.nim WHERE p.kelas IN ($kelas) ORDER BY p.nim");
		@$c = mysqli_num_rows($q);
		if ($c > 0) {
			$no = 1;
			while ($data = mysqli_fetch_array($q)) {
				$nim = $data['nim'];
				$nama = $data['nama'];
				$kelas = $data['kelas'];
				$waktu = $data['waktu'];

				echo "<tr>";
				echo "<td>".$no++."</td>";
				echo "<td>".$kelas."</td>";
				echo "<td>".$nim."</td>";
				echo "<td>".$nama."</td>";
				echo "<td>".$waktu."</td>";
				echo "</tr>";
			}
		} else {
			echo "<tr>";
			echo "<td colspan='5' align='center'><p>Belum ada praktikan yang mengumpulkan.</p></td>";
			echo "</tr>";
		}
		?>
	</tbody>
</table>