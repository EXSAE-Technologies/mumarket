<?php 
require_once "includes/header.php";
require_login();

$chat = new Chat();
if(isset($_POST["type"])){
	if($_POST["type"]=="new_message"){
		$to_user = $userObj->get_by_username($_POST["username"]);
		if($to_user){
			if($chat->post_item(["from_user"=>$user["id"], "to_user"=>$to_user["id"], "message"=>$_POST["message"]])){
				add_message("text-success", "Message sent successfully!");
			} else {
				add_message("text-danger", "Failed: ".$chat->error);
			}
		} else {
			add_message("text-warning", "User not recognised.");
		}
	}
}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="/inbox.php">Inbox</a>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="/new-message.php">New</a>
			</li>
		</ul>
	</div>
</nav>
<div class="container-sm bg-white p-2">
	<center><h3>Compose a message</h3></center>
	<?php render_messages(); ?>
	<form method="post">
		<input type="hidden" name="type" value="new_message">
		<div class="form-group my-2">
			<label>To:</label>
			<div class="input-group">
				<input type="text" name="username" class="form-control" placeholder="Enter username of receipient." required>
			</div>
		</div>
		<div class="form-group my-2">
			<label>Message</label>
			<div class="input-group">
				<textarea class="form-control" name="message" placeholder="Type your message" required></textarea>
			</div>
		</div>
		<button class="btn btn-primary w-100">Send</button>
	</form>
</div>

<?php 
require_once "includes/footer.php";
?>