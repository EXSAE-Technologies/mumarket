<?php
function logged_in(){
	$logged_in = false;

	if(isset($_COOKIE["mmuid"])){
		$mmuid = $_COOKIE["mmuid"];
		$logged_in = true;
	} else {
		$logged_in = false;
	}

	return $logged_in;
}

function get_logged_in_user(){
	if (logged_in()){
		$mmuid = $_COOKIE["mmuid"];
		$user = new User();
		return $user->get($mmuid);
	} else {
		return false;
	}
}
?>