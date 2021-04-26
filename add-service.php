<?php 
require_once "includes/header.php";

$serviceObj = new Service();
if(isset($_POST["type"])){
	if($_POST["type"]=="add_service"){
		if($serviceObj->post_item($_POST)){
			add_message("text-success", "Service successfully created.");
		} else {
			add_message("text-danger", "Failed: ".$serviceObj->error);
		}
	}
}
?>

<div class="container-sm">
	<center><h3>Add a service</h3></center>
	<form method="post">
		<input type="hidden" name="type" value="add_service">
		<input type="hidden" name="user" value="<?php echo $user['id']; ?>">
		<?php render_messages(); ?>
		<div class="form-group my-2">
			<div class="input-group">
				<div class="form-floating w-100">
					<input type="text" name="name" class="form-control" id="floatingName" required>
					<label for="floatingName">Service name</label>
				</div>
			</div>
		</div>
		<div class="form-group my-2">
			<div class="input-group">
				<div class="form-floating w-100">
					<input type="text" name="open" class="form-control" id="floatingOpen" required>
					<label for="floatingOpen">Service open hours</label>
				</div>
			</div>
		</div>
		<div class="form-group my-2">
			<div class="input-group">
				<div class="form-floating w-100">
					<textarea name="description" class="form-control" id="floatingDescription" required></textarea>
					<label for="floatingDescription">Service description</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-secondary form-control">Add</button>
		</div>
	</form>
</div>

<?php 
require_once "includes/footer.php";
?>