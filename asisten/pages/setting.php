<?php include 'setting-process.php' ?>

<form action="" method="POST" role="form">

	<div class="form-group row">
	    <label class="col-md-4 form-control-label text-right">NIM</label>
	    <div class="col-md-3">
	      <input type="text" class="form-control" name="nim" value="<?=$_SESSION['login']?>" disabled>
	      <span class="text-danger" id="nothing"></span>
	    </div>
	</div>
	<div class="form-group row">
	    <label class="col-md-4 form-control-label text-right">Nama</label>
	    <div class="col-md-5">
	      <input type="text" class="form-control" value="<?=$_SESSION['login_name']?>" name="name">
	    </div>
	</div>
	<div class="form-group row">
	    <label class="col-md-4 form-control-label text-right">Password Lama</label>
	    <div class="col-md-5">
	      <input type="password" class="form-control" name="old-password" placeholder="Password Lama">
	    </div>
	</div>
	<div class="form-group row">
	    <label class="col-md-4 form-control-label text-right">Password Baru</label>
	    <div class="col-md-5">
	      <input type="password" class="form-control" name="new-password" placeholder="Password Baru">
	    </div>
	</div>
	
	<div class="form-group row">
	    <div class="col-md-offset-4 col-md-5">
	      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
	    </div>
	</div>
</form>