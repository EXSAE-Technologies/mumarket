<?php 
require_once "includes/header.php";
$serviceObj = new Service();
$services = $serviceObj->get_all();
?>

<div class="container-sm bg-white my-2 py-2">
	<h3>Services</h3>
	<div class="row row-cols-2 row-cols-sm-4">
		<?php
		foreach($services as $service){
		?>
		<div class="col">
			<div class="card">
				<img src="<?php echo $service['image']; ?>" class="">
				<ul class="list-group flush">
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