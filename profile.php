<?php 
require_once "includes/header.php";
require_login();
?>

<div class="container-fluid">
	<div class="row bg-primary bg-gradient p-2">
		<div class="col-sm-4 d-flex justify-content-center align-items-center">
			<img src="/assets/images/login-screen.jpg" width="150" height="150" class="rounded">
		</div>
		<div class="col-sm-8">
			<ul class="list-group">
				<li class="list-group-item"><?php echo $user["username"]; ?></li>
				<li class="list-group-item"><?php echo $user["email"]; ?></li>
				<li class="list-group-item"><a href="/logout.php" class="btn btn-danger btn-sm w-100">Logout</a></li>
			</ul>
		</div>
	</div>
</div>

<?php 
require_once "includes/footer.php";
?>