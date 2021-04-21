<?php 
require_once "includes/header.php";

if(isset($_POST["type"])){
	$userObject = new User();
	if($_POST["type"] == "login"){
		$all_users = $userObject->get_all();
		$me = false;
		foreach($all_users as $u){
			if($u["username"] == $_POST["username"]){
				$me = $u;
				break;
			}
		}
		if($me){
			if(password_verify($_POST["password"], $me["password"])){
				setcookie("mmuid", $me["id"], time() + (86400 * 30), "/");
				header("Location: /");
			} else {
				add_message("text-danger", "Password incorrect.");
			}
		} else {
			add_message("text-danger", "User not recognised.");
		}
	}
}

?>

<div class="row">
	<div class="col-sm bg-primary bg-gradient h-100 p-4">
		<div class="container-sm">
			<div class="card shadow">
				<div class="card-body">
					<form method="post">
						<input type="hidden" name="type" value="login">
						<?php render_messages(); ?>
						<div class="form-group my-2">
							<div class="input-group">
								<div class="form-floating w-100">
									<input type="text" name="username" class="form-control" id="floatingUsername">
									<label for="floatingUsername">Username</label>
								</div>
							</div>
						</div>
						<div class="form-group my-2">
							<div class="input-group">
								<div class="form-floating w-100">
									<input type="password" name="password" class="form-control" id="floatingPassword">
									<label for="floatingPassword">Password</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<button class="btn btn-secondary form-control">Login</button>
						</div>
					</form>
					<div class="d-flex justify-content-center my-2">
						<a href="/signup.php">Create an account</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm d-none p-4 login-screen d-sm-flex align-items-center justify-content-center">
		<h3 class="shadow-lg text-primary">Welcome to MuMarket</h3>
	</div>
</div>

<?php 
require_once "includes/footer.php";
?>