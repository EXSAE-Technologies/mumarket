<?php 
require_once "includes/header.php";

if(isset($_POST["type"])){
	if($_POST["type"] == "signup"){
		if($_POST["password"] != $_POST["repassword"]){
			add_message("text-danger", "Password and repeat password do not much.");
		} else {
			$_POST["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
			$all_users = $userObject->get_all();
			$available = true;
			
			if($all_users){
				foreach($all_users as $u){
					if($u["username"] == $_POST["username"]){
						$available = false;
						break;
					}
				}				
			}

			if($available){
				$data = $userObject->fields;
				foreach ($_POST as $key => $value) {
					if(array_key_exists($key, $data)){
						$data[$key] = $value;
					}
				}
				if(!$userObject->post_item($data)){
					add_message("text-danger", $userObject->error);
				} else {
					add_message("text-success", "Account successfully created, you can now login.");
				}
				
			} else {
				add_message("text-warning", "The username is already registered. Pick a different username or login if you already have an account.");
			}
		}
	}
}
?>

<div class="row">
	<div class="col-sm bg-primary bg-gradient h-100 p-4">
		<div class="container-sm">
			<div class="card">
				<div class="card-body">
					<?php render_messages(); ?>
					<form method="post">
						<input type="hidden" name="type" value="signup">
						<div class="form-group my-2">
							<div class="input-group">
								<div class="form-floating w-100">
									<input type="text" name="username" class="form-control" id="floatingUsername" required>
									<label for="floatingUsername">Username</label>
								</div>
							</div>
						</div>
						<div class="form-group my-2">
							<div class="input-group">
								<div class="form-floating w-100">
									<input type="email" name="email" class="form-control" id="floatingEmail" required>
									<label for="floatingEmail">E-mail Address</label>
								</div>
							</div>
						</div>
						<div class="form-group my-2">
							<div class="input-group">
								<div class="form-floating w-100">
									<input type="password" name="password" class="form-control" id="floatingPassword" required>
									<label for="floatingPassword">Password</label>
								</div>
							</div>
						</div>
						<div class="form-group my-2">
							<div class="input-group">
								<div class="form-floating w-100">
									<input type="password" name="repassword" class="form-control" id="floatingRePassword" required>
									<label for="floatingRePassword">Repeat Password</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<button class="btn btn-secondary form-control">Create</button>
						</div>
					</form>
					<div class="d-flex justify-content-center my-2">
						<a href="/login.php">Login</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm d-none p-4 login-screen d-sm-flex align-items-center justify-content-center">
		<h3 class="shadow-lg text-primary"><center>Welcome to MuMarket.<br> Join us and countless many others.<center></h3>
	</div>
</div>

<?php 
require_once "includes/footer.php";
?>