<?php 
include '../config.php'; 
include '../function.php'; 
?>
<?php 
session_start();
if (!isset($_SESSION['login'])) {
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Upload - Praktikum Struktur Data</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Custrom -->
	<link rel="stylesheet" href="../css/custom.css">
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Praktikum Struktur Data</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav navbar-right top-menu">
					<li><a href="index.php?page=kelas">Kelas</a></li>
					<li><a href="index.php">Unggahan</a></li>
					<li class="dropdown">
		              	<a href="#" title="<?=$_SESSION['login_name']?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$_SESSION['login']?> <span class="caret"></span></a>
		              	<ul class="dropdown-menu">
			                <li><a href="index.php?page=setting">Ubah Password</a></li>
			                <li><a href="logout.php">Logout</a></li>
		              	</ul>
		            </li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-6">
								<h3 class="panel-title">Live Coding</h3>
							</div>
							<div class="col-md-6 text-right">
								<?php 
								$kelas = get_kelas_aktif();
								echo "<b>Kelas aktif</b> ";
								if (count($kelas) > 0) {
									foreach ($kelas as $k) {
										echo "<span class='label label-success'>".$k."</span> ";
									}
								} else {
									echo "<span class='label label-danger'>Tidak ada kelas aktif</span>";
								}
								?>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<?php 
						$page = isset($_GET['page']) ? $_GET['page'] : 'unggahan';
						if (file_exists("pages/".$page.".php")) {
							include 'pages/'.$page.'.php';
						} else {
							echo "<h1 align='center'>Error 404 Not Found</h1>";
							echo "<p align='center'>The page you are looking for not found!</p>";
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>

  </body>
</html>