<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Page Pemain</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/datatables.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container-fluid">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<nav class="navbar navbar-default" role="navigation">
							<div class="container-fluid">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
									<a class="navbar-brand" href="http://localhost/utsframework/index.php/klub" >Back</a>
								</div>
						
								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse navbar-ex1-collapse">
									<ul class="nav navbar-nav">
										<li class="active"><a href="<?php echo site_url('pemain/index') ?>" >List Pemain
										<?php echo $klub[0]->nama ?>
										 </a></li>
									</ul>
									<ul class="nav navbar-nav navbar-right">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
											<ul class="dropdown-menu">
												<li><a href="#">Action</a></li>
												<li><a href="#">Another action</a></li>
												<li><a href="#">Something else here</a></li>
												<li><a href="#">Separated link</a></li>
											</ul>
										</li>
									</ul>
								</div><!-- /.navbar-collapse -->
						</div>
						</nav>

					</div>	
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h1>Daftar Pemain
						<?php echo $klub[0]->nama ?>
						 <a href="<?php echo site_url('pemain/create/').$klub[0]->id ?>" type="button" class="btn btn-info">Input Data</a></h1> 	
						<div class="table-responsive">
							<table class="table table-hover" id="datafortable">
								<thead>
									<tr>
										<th>Nama Pemain</th>
										<th>Posisi</th>
										<th>Tanggal Lahir</th>
										<th>Nama Klub</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($pemain_list as $key) { ?>
									<tr>
										<td><?php echo $key->pemain ?></td>
										<td><?php echo $key->posisi ?></td>
										<td><?php echo $key->tanggalLahir ?></td>
										<td><?php echo $key->klub ?></td>
										<td>
											<a href="<?php echo site_url('pemain/update/').$key->idpemain?>" type="button" class="btn btn-success">Edit</a>
											<a href="<?php echo site_url('pemain/delete/').$key->idpemain.'/'.$key->fk_klub ?>" type="button" class="btn btn-danger">Hapus</a>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>



		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url('')?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url('')?>assets/datatables.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>

 		<script type="text/JavaScript">
			$(document).ready(function(){
				$('#datafortable').DataTable();
			});
			
		</script>
	</body>
</html>