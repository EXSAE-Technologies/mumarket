<?php
require_once "database-connection.php";

class User extends Db{
	function __init__(){
		$this->table = "user";
		$this->fields = ["username"=>"", "email"=>"", "password"=>""];
	}

	function get_by_username($username){
		$sql = "SELECT * FROM user WHERE username='".$username."';";
		return $this->return_one($sql);
	}
}

class Notification extends Db{
	function __init__(){
		$this->table = "notification";
		$this->fields = ["to_user"=>"", "message"=>"", "date_time"=>"", "status"=>"unread"];
	}
}

class Chat extends Db{
	function __init__(){
		$this->table = "chat";
		$this->fields = ["from_user"=>"", "to_user"=>"", "message"=>""];
	}

	function get_inbox($user_id){
		$sql = "SELECT * FROM ".$this->table." WHERE to_user='".$user_id."' ORDER BY id DESC;";
		$msgs = $this->return_many($sql);
		$senders = array();
		$inbox = array();
		foreach($msgs as $msg){
			if(in_array($msg["from_user"], $senders)){
				continue;
			} else {
				array_push($inbox, $msg);
				array_push($senders, $msg["from_user"]);				
			}
		}
		return $inbox;
	}

	function get_chat($user_id){
		$sql = "SELECT * FROM chat WHERE to_user='".$user_id."' OR from_user='".$user_id."';";
		return $this->return_many($sql);
	}
}

class Service extends Db{
	function __init__(){
		$this->table = "service";
		$this->fields = ["user"=>"", "name"=>"", "image"=>"/assets/images/login-screen.jpg", "description"=>"", "open"=>""];
	}
}

class Button extends Db{
	function __init__(){
		$this->table = "button";
		$this->fields = ["service"=>"", "name"=>"", "action"=>"", "type"=>""];
	}
}

class Product extends Db{
	function __init__(){
		$this->table = "product";
		$this->fields = ["service"=>"", "name"=>"", "description"=>"", "image"=>"", "price"=>""];
	}
}
?>