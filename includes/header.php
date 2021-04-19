<?php
require_once "models.php";
require_once "functions.php";

$user = get_logged_in_user();
$notification = new Notification();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/main.css">
    <title>MuMarket</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container-fluid">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target>
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="/">MuMarket</a>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="/">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/chat.php">Chat<span class="badge bg-primary rounded-pill">0</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/notification.php">Notification<span class="badge bg-primary rounded-pill">0</span></a>
				</li>
			</ul>
		</div>
		<?php
		if(logged_in()){
		?>
		<a href="" class="btn btn-primary"><?php echo $user["username"]; ?></a>
		<?php
		} else {
		?>
		<a href="/login.php" class="btn btn-primary">Log in</a>
		<?php
		}
		?>
	</div>
</nav>