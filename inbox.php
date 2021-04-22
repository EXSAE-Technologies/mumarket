<?php 
require_once "includes/header.php";
require_login();
$chat = new Chat();
$inbox = $chat->get_inbox($user["id"]);
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
<div class="container-sm p-2 bg-white bg-gradient shadow">
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

<?php 
require_once "includes/footer.php";
?>