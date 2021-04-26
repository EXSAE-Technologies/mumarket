<?php 
require_once "includes/header.php";
require_login();

$serviceObj = new Service();
$services = $serviceObj->get_where(["user"=>$user["id"]]);
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
<div class="container-sm">
	<div class="buttons p-2 d-flex justify-content-evenly bg-white mb-2">
		<a href="/add-service.php" class="btn btn-outline-primary">Add Service</a>
	</div>
	<div class="row row-cols-2 row-cols-sm-4">
		<?php
		foreach($services as $service){
		?>
		<div class="col">
			<div class="card">
				<img src="<?php echo $service['image']; ?>" class="">
				<ul class="list-group list-group-flush">
					<li class="list-group-item"><?php echo $service['name']; ?></li>
					<li class="list-group-item"><a href="/service.php?id=<?php echo $service['id']; ?>" class="btn btn-outline-primary w-100">View</a></li>
				</ul>
			</div>
		</div>
		<?php
		}
		?>
	</div>
</div>
<?php 
require_once "includes/footer.php";
?>