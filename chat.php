<?php 
require_once "includes/header.php";
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="">From</a>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="/chat.php">Chat</a>
			</li>
		</ul>
	</div>
</nav>
<div class="row g-0">
	<div class="d-none d-sm-block col-sm-4 possition-absolute">
		<div class="list-group">
			<a href="#" class="list-group-item list-group-item-action active" aria-current="true">
				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">Username</h5>
					<small>Y:m:d H:m:s</small>
				</div>
				<p class="mb-1">Some placeholder content in a paragraph.</p>
				<small>And some small print.</small>
			</a>
			<a href="#" class="list-group-item list-group-item-action">
				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">Username</h5>
					<small class="text-muted">Y:m:d H:m:s</small>
				</div>
				<p class="mb-1">Some placeholder content in a paragraph.</p>
				<small class="text-muted">And some muted small print.</small>
			</a>
			<a href="#" class="list-group-item list-group-item-action">
				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">Username</h5>
					<small class="text-muted">Y:m:d H:m:s</small>
				</div>
				<p class="mb-1">Some placeholder content in a paragraph.</p>
				<small class="text-muted">And some muted small print.</small>
			</a>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="messages mb-5">
			<div class="message clearfix">
				<div class="card text-end rounded-pill p-3 d-inline-block float-end">
					<h5 class="card-title">From</h5>
					<p class="card-text">This is some sample message</p>
				</div>
			</div>
			<div class="message clearfix">
				<div class="card text-start rounded-pill p-3 d-inline-block float-start">
					<h5 class="card-title">From</h5>
					<p class="card-text">This is some sample message</p>
				</div>
			</div>
			<div class="message clearfix">
				<div class="card text-end rounded-pill p-3 d-inline-block float-end">
					<h5 class="card-title">From</h5>
					<p class="card-text">This is some sample message</p>
				</div>
			</div>
			<div class="message clearfix">
				<div class="card text-start rounded-pill p-3 d-inline-block float-start">
					<h5 class="card-title">From</h5>
					<p class="card-text">This is some sample message</p>
				</div>
			</div>
			<div class="message clearfix">
				<div class="card text-end rounded-pill p-3 d-inline-block float-end">
					<h5 class="card-title">From</h5>
					<p class="card-text">This is some sample message</p>
				</div>
			</div>
			<div class="message clearfix">
				<div class="card text-start rounded-pill p-3 d-inline-block float-start">
					<h5 class="card-title">From</h5>
					<p class="card-text">This is some sample message</p>
				</div>
			</div>
			<div class="message clearfix">
				<div class="card text-end rounded-pill p-3 d-inline-block float-end">
					<h5 class="card-title">From</h5>
					<p class="card-text">This is some sample message</p>
				</div>
			</div>
			<div class="message clearfix">
				<div class="card text-start rounded-pill p-3 d-inline-block float-start">
					<h5 class="card-title">From</h5>
					<p class="card-text">This is some sample message</p>
				</div>
			</div>
		</div>
		<div class="fixed-bottom">
			<form>
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" name="message" placeholder="Type something">
						<span class="input-group-addon"><button type="submit" class="btn btn-primary">Send</button></span>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
require_once "includes/footer.php";
?>