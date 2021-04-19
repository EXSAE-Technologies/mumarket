<?php
require_once "database-connection.php";

class User extends Db{
	function __init__(){
		$this->table = "user";
		$this->fields = ["username"=>"", "email"=>"", "password"=>""];
	}
}

class Notification extends Db{
	function __init__(){
		$this->table = "notification";
		$this->fields = ["to_user"=>"", "message"=>"", "date_time"=>"", "status"=>"unread"];
	}
}
?>