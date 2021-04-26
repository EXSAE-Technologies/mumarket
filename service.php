<?php 
require_once "includes/header.php";

if(!isset($_GET["id"])){
	header("Location: /services.php");
} else {
	$serviceObj = new Service();
	$service = $serviceObj->get($_GET["id"]);
	if(!$service){
		header("Location: /services.php");
	}
}

$is_owner = false;
if($service["user"] == $user["id"]){
	$is_owner = true;
}

$buttonObj = new Button();
$buttons = $buttonObj->get_where(["service"=>$_GET["id"]]);

$productObj = new Product();
$products = $productObj->get_where(["service"=>$_GET["id"]]);

if(isset($_POST["type"])){
	#code
}

if(isset($_GET["delete-service"])){
	if($is_owner){
		if($serviceObj->delete_item_by_id($service["id"])){
			header("Location: /services.php");
		} else {
			add_message("text-danger", "Faild: ".$serviceObj->error);
		}
	}
}
?>

<div class="container-fluid">
	<div class="row bg-primary bg-gradient p-2">
		<div class="col-sm-4 d-flex justify-content-center align-items-center">
			<img src="<?php echo $service['image']; ?>" width="150" height="150" class="rounded">
		</div>
		<div class="col-sm-8">
			<ul class="list-group">
				<li class="list-group-item"><?php echo $service['name']; ?></li>
				<li class="list-group-item">Open <?php echo $service['open']; ?></li>
			</ul>
		</div>
	</div>
</div>
<div class="container-sm bg-white">
	<?php
	if($buttons){
	?>
	<div class="buttons p-2 d-flex justify-content-evenly">
		<?php
		foreach($buttons as $button){
			if($button["type"] == "email"){
		?>
			<a href="mailto:<?php echo $button["action"]; ?>" class="btn btn-outline-primary"><?php echo $button["name"]; ?></a>
		<?php
			} elseif($button["type"] == "call"){
		?>
			<a href="tel:<?php echo $button["action"]; ?>" class="btn btn-outline-primary"><?php echo $button["name"]; ?></a>
		<?php
			} elseif($button["type"] == "social"){
		?>
			<a href="<?php echo $button["action"]; ?>" class="btn btn-outline-primary"><?php echo $button["name"]; ?></a>
		<?php
			}
		}
		?>
	</div>
	<?php
	}
	?>
	<div class="main">
		<div class="border my-2">
			<center>
				<h3>File Upload</h3>
				<p>Upload a file to be worked on by <?php echo $service["name"]; ?></p>
				<p>Note that if the files are many compress them into a zip file so that they can be uploaded as one</p>
			</center>
			<form method="post" enctype="multipart/form-data">
				<input type="hidden" name="client" value="<?php echo $user['id']; ?>">
				<div class="form-group">
					<div class="input-group">
						<input type="file" name="file" class="form-control" required>
					</div>
				</div><br>
				<div class="form-group">
					<label>File description:</label>
					<div class="input-group">
						<textarea name="description" class="form-control" required></textarea>
					</div>
				</div>
				<br>
				<button type="submit" class="btn btn-outline-primary form-control">Upload File</button>
			</form>
			<script type="text/javascript">
				document.onload =function(){
					tinymce.init({
						el: "textarea"
					});
				};
			</script>
		</div>
		<?php
		if($products){
		?>
		<div class="border my-2">
			<h3>Product Catalogue</h3>
			<div class="row row-cols-2 row-cols-sm-4">
				<?php
				foreach($products as $product){
				?>
				<div class="col">
					<div class="card">
						<img src="<?php echo $service['image']; ?>" class="">
						<ul class="list-group flush">
							<li class="list-group-item"><?php echo $product['name']; ?></li>
							<li class="list-group-item"><?php echo $product['price']; ?></li>
						</ul>
					</div>
				</div>
				<?php
				}
				?>
			</div>
		</div>
		<?php
		}
		?>
		<div class="border my-2">
			<h3>Service description</h3>
			<?php echo $service["description"]; ?>
		</div>
	</div>
	<hr>
	<?php
	if($is_owner){
	?>
	<center><a href="?id=<?php echo $service["id"]; ?>&delete-service" class="btn btn-outline-danger">Delete Service</a></center>
	<?php
	}
	?>
</div>

<?php 
require_once "includes/footer.php";
?>