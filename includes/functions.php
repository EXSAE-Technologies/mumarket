<?php
$messages = array();

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

function require_login(){
	$next = $_SERVER['SCRIPT_NAME'];
	if(!logged_in()){
		header("Location: /login.php?next=".$next);
	}
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

function add_message($tags, $message){
	$GLOBALS["messages"] = array_merge($GLOBALS["messages"], [["message"=>$message, "tags"=>$tags]]);
}

function render_messages(){
	$messages = $GLOBALS["messages"];

	if(count($messages) >= 0){
		$html = '<ul class="list-group">';
		foreach ($messages as $msg) {
			$html .= '<li class="list-group-item my-2 '.$msg["tags"].'">'.$msg["message"].'</li>';
		}
		$html .= '</ul>';
	} else {
		$html = "";
	}

	echo $html;
}

?>