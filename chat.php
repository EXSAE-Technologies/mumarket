<?php 
require_once "includes/header.php";
require_login();

if(isset($_GET["chat"])){
	$from_user = $userObj->get($_GET["chat"]);
	if(!$from_user){
		header("Location: /inbox.php");
	}
} else {
	header("Location: /inbox.php");
}

$chat = new Chat();
$msgs = $chat->get_chat($from_user["id"]);
$inbox = $chat->get_inbox($user["id"]);

if(isset($_POST["type"])){
	if($_POST["type"] == "message"){
		if($chat->post_item(["from_user"=>$user["id"], "to_user"=>$_POST["to_user"], "message"=>$_POST["message"]])){
			header("Location: /chat.php?chat=".$from_user["id"]);
		} else {
			add_message("text-danger", "Faild: ".$chat->error);
		}
	}
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="/inbox.php">Inbox</a>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="/profile.php"><?php echo $from_user["username"]; ?></a>
			</li>
		</ul>
	</div>
</nav>
<div class="row g-0">
	<div class="d-none d-sm-block col-sm-4 possition-absolute">
		<div class="list-group">
			<?php 
			foreach($inbox as $msg){
			?>
			<a href="/chat.php?chat=<?php echo $msg['from_user']; ?>" class="list-group-item list-group-item-action active my-2" aria-current="true">
				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1"><?php echo $userObj->get($msg["from_user"])["username"]; ?></h5>
					<small>Y:m:d H:m:s</small>
				</div>
				<p class="mb-1"><?php echo $msg["message"]; ?></p>
				<small>unread</small>
			</a>
			<?php
			}
			?>
		</div>
	</div>
	<div class="col-sm-8">
		<?php render_messages(); ?>
		<div class="messages mb-5 d-flex flex-column-reverse">
			<?php
			foreach($msgs as $msg){
				if($msg["from_user"] == $user["id"]){
			?>
				<div class="message clearfix my-1">
					<div class="card text-end rounded-pill p-3 d-inline-block float-end">
						<h5 class="card-title"><?php echo $user["username"]; ?></h5>
						<p class="card-text"><?php echo $msg["message"]; ?></p>
					</div>
				</div>
			<?php
				} else {
			?>
				<div class="message clearfix my-1">
					<div class="card text-start rounded-pill p-3 d-inline-block float-start">
						<h5 class="card-title"><?php echo $from_user["username"]; ?></h5>
						<p class="card-text"><?php echo $msg["message"]; ?></p>
					</div>
				</div>
			<?php
				}
			}
			?>
		</div>
		<div class="fixed-bottom">
			<form method="post">
				<input type="hidden" name="type" value="message">
				<input type="hidden" name="to_user" value="<?php echo $from_user['id']; ?>">
				<div class="form-group">
					<div class="input-group">
						<textarea class="form-control" rows="1" name="message" placeholder="Type your message" required></textarea>
						<span class="input-group-addon h-100"><button type="submit" class="btn btn-primary h-100">Send</button></span>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
require_once "includes/footer.php";
?>