<!-- Upload Process -->
<?php include __DIR__.'/upload-process.php'; ?>

<form action="" method="POST" role="form" enctype="multipart/form-data">
	
	<div class="form-group row">
	    <label class="col-md-4 form-control-label text-right">File</label>
	    <div class="col-md-5">
		  		<input type="file" id="file" name="file" style="display: none">
		  		<button type="button" class="btn btn-default" onclick="$('#file').click()">Browse</button>
		  		<span id="filename"></span>
			</label>
			<code>*.zip</code>
	    </div>
	</div>
	<div class="form-group row">
	    <label class="col-md-4 form-control-label text-right">NIM</label>
	    <div class="col-md-3">
	      <input type="text" class="form-control" placeholder="Nomor Mahasiswa" maxlength="8" id="nim" name="nim" required>
	      <span class="text-danger" id="nothing"></span>
	    </div>
	</div>
	<div class="form-group row">
	    <label class="col-md-4 form-control-label text-right">Nama</label>
	    <div class="col-md-5">
	      <input type="text" class="form-control" placeholder="Nama" disabled="disabled" id="nama">
	    </div>
	</div>
	<div class="form-group row">
	    <label class="col-md-4 form-control-label text-right">Asisten</label>
	    <div class="col-md-5">
	      <select name="asisten" id="input" class="form-control" required="required">
	      	<option value="" selected disabled>Pilih Asisten Anda</option>
	      	<?php 
	      	$q = mysqli_query($connect, "SELECT * FROM asisten ORDER BY nama");
	      	$c = mysqli_num_rows($q);
	      	if ($c > 0) {
	      		while ($data = mysqli_fetch_array($q)) {
	      			$nim = $data['nim'];
	      			$nama = $data['nama'];
	      			echo "<option value='$nim'>$nama</option>";
	      		}
	      	}
	      	?>
	      </select>
	    </div>
	</div>							

	
	<div class="form-group row">
	    <div class="col-md-offset-4 col-md-5">
	      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
	    </div>
	</div>
</form>