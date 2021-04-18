<?php 
require_once "includes/header.php";
?>

<div class="row">
	<div class="col-sm">
		<div class="container-sm">
			<div class="card">
				<div class="card-body">
					<form method="post">
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
							<button class="btn btn-primary form-control">Login</button>
						</div>
					</form>
					<div class="d-flex justify-content-center my-2">
						<a href="/signup.php">Create an account</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm d-none d-sm-block"></div>
</div>

<?php 
require_once "includes/footer.php";
?>