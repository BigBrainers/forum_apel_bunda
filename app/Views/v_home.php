<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to Apel Bunda</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/styles.css"/>
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<header>	
	<?= $this->include('navbar')?>
	</header>
	<div class="jumbotron jumbotron-cust bg-dark center">
		<div class="container container-cust h-100">
			<div class="row align-items-center h-100">
				<div class="col col-md-6 mx-auto">
				<h1 class="display-4">Apel Bunda</h1>
				<p class="lead">Forum untuk sharing masalah bunda ya bund.</p>
				</div>
				<div class="col col-md-6 text-center">
				<img class="image-fp" src="images/fp.png" alt="">
				</div>
			</div>
		</div>
		</div>

	<?php
		if (session('id') == null){
			echo '
			<nav class="navbar navbar-dark navbar-bottom navbar-expand fixed-bottom">
				<ul class="navbar-nav nav-justified w-100">
					<li class="nav-item">
						<a href="'. base_url("register/").'" class="nav-link">Sign Up</a>
					</li>
					<li class="nav-item">
						<a href="'. base_url("login/").'" class="nav-link">Login</a>
					</li>
				</ul>
			</nav>';
		} else {
			echo $this->include('navbar-bottom');
			echo '
			<a type="button" class=" btn-act text-white">
				+
			</a>
			. $this->include("add-modal").';
		}
	?>
</body>
</html>
