<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Kelas</th>
			<th>Waktu</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php
		// Update status
		if (isset($_GET['toggle'])) {
			$id = $_GET['toggle'];
			$get = mysqli_query($connect, "SELECT status FROM kelas WHERE id='$id'");
			$data = mysqli_fetch_array($get);
				$cur_status = $data['status'];
			$up_status = $cur_status == 0 ? 1 : 0;
			$update = mysqli_query($connect, "UPDATE kelas SET status='$up_status' WHERE id='$id'") or die(mysqli_error());
			header("location: index.php?page=kelas");
		}
		$q = mysqli_query($connect, "SELECT * FROM kelas order by id");
		$c = mysqli_num_rows($q);
		if ($c > 0) {
			$no = 1;
			while ($data = mysqli_fetch_array($q)) {
				$id = $data['id'];
				$ket = $data['ket'];
				$status = $data['status'] == 0 ? 
						"<a title='Ubah Status' href='index.php?page=kelas&toggle=$id'><span class='label label-danger'>Tidak Aktif</span></a>" :
						"<a title='Ubah Status' href='index.php?page=kelas&toggle=$id'><span class='label label-success'>Aktif</span></a>";

				echo "<tr>";
				echo "<td>".$no++."</td>";
				echo "<td>".$id."</td>";
				echo "<td>".$ket."</td>";
				echo "<td>".$status."</td>";
				echo "</tr>";
			}
		} else {
			echo "<p>Belum ada kelas.</p>";
		}
		?>
	</tbody>
</table>