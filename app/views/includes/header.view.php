<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="<?= ROOT ?>/assets/images/icon.jpg">
	<title><?= APP_NAME ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= ROOT ?>/assets/css/styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-success">
		<div class="container">
			<a class="navbar-brand" href="/workstreet/public/listings"><?= APP_NAME ?></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="/workstreet/public/listings">Home</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="/workstreet/public/listings/create">New Listing</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="/workstreet/public/about">About</a>
					</li>
				</ul>

				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<span class="p-3 text-light">
								<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
									<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
									<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
								</svg>&nbsp; <?= $user['company'] ?>

							</span>
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="/workstreet/public/users/profile?user_id=<?= $user['user_id'] ?>"><span class="fw-bold"> Profile </span> </a></li>
							<?php if ($_SESSION['user_role'] == 1) { ?>
								<li><a class="dropdown-item" href="/workstreet/public/admin" tabindex="-1" aria-disabled="true">Dashboard</a></li>
							<?php } ?>
							<li><a class="dropdown-item" href="/workstreet/public/users/logout" tabindex="-1" aria-disabled="true">Logout</a></li>
						</ul>
					</li>
				</ul>

			</div>
		</div>
	</nav>