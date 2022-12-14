<?php
session_start();

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: /composer/src/View/");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <?php
    ?>
</head>

<body>


	<div class="header">
		<!-- notification message -->
		<?php if (isset($_SESSION['username'])) : ?>
			<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
				<a class="navbar-brand" style="color:#ffffff">E-Commerce</a>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="true">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div id="navb" class="navbar-collapse collapse hide">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Page 1</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Page 2</a>
						</li>
					</ul>

					<ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
							<a class="nav-link" href="profile"><span class="fas fa-user"></span> My Profile</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="panier"><i class="fas fa-shopping-cart"></i> Panier</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link" href="?logout='1'"><span class="fas fa-sign-out-alt"></span> Logout</a>
						</li>
					</ul>
				</div>
			</nav>
		<?php endif ?>
		<?php if (!isset($_SESSION['username'])) : ?>
			<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
				<a class="navbar-brand" style="color:#ffffff">E-Commerce</a>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="true">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div id="navb" class="navbar-collapse collapse hide">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Page 1</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Page 2</a>
						</li>
					</ul>

					<ul class="nav navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="register"><span class="fas fa-user"></span> Sign Up</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="login"><span class="fas fa-sign-in-alt"></span> Login</a>
						</li>
					</ul>
				</div>
			</nav>
		<?php endif ?>
	</div>

</body>

</html>