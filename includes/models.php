<?php
require_once "database-connection.php";

class User extends Db{
	function __init__(){
		$fields = ["username"=>"", "email"=>"", "password"=>""];
		$this->fields = array_merge($this->fields, $fields);
	}
}

?>