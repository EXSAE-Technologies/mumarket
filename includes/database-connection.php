<?php

class Db{

	public $servername = "localhost";
	public $username = "root";
	public $password = "";
	public $dbname = "mumarket";
	public $conn;
	public $error;

	function __construct(){
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($this->conn->connect_error) {
			$this->error = $this->conn->connect_error;
		}
	}

	function get_item_by_id($table_name, $item_id){
		$sql = "SELECT * FROM ".$table_name." WHERE id=".$item_id;
		$result = $this->conn->query($sql);
		if ($result){
			$data = $result->fetch_assoc();
			return $data;
		} else {
			$this->error = $this->conn->error;
			return FALSE;
		}
	}

	function get_all_items($table_name){
		$sql = "SELECT * FROM ".$table_name;
		$result = $this->conn->query($sql);
		if($result){
			$data = $result->fetch_all();
			$r = array();
			foreach($data as $datum){
				array_push($r, $this->get_item_by_id($table_name, $datum[0]));
			}
			return $r;
		} else {
			$this->error = $this->conn->error;
			return FALSE;
		}
	}

	function get_all(){
		$data = $this->get_all_items($this->table_name);
		return $data;
	}

	function post_item($table_name, $data){
		$sql = "INSERT INTO ".$table_name." (id";
		$sql2 = ") VALUES ('0'";
		foreach($data as $key=>$value){
			$sql .= ",".$key;
			$sql2 .= ",'".$value."'";
		}
		$sql .= ");";
		$result = $this->conn->query($sql);
		if ($result != TRUE){
			$this->error = $this->conn->error;
		}
		return $result;
	}

	function update_item_by_id($table_name, $id, $data){
		$sql = "UPDATE ".$table_name." SET ";
		$i = 0;
		foreach($data as $key=>$value){
			if ($i == 0){
				$sql .= $key."='".$value."'";
			} else {
				$sql .= ", ".$key."='".$value."'";
			}
			$i++;
		}
		$sql .= " WHERE id=$id;";
		$result = $this->conn->query($sql);
		if ($result != TRUE){
			$this->error = $this->conn->error;
		}
		return $sql;
	}

	function delete_item_by_id($table_name, $id){
		$sql = "DELETE FROM $table_name WHERE id=$id";
		$result = $this->conn->query($sql);
		if ($result != TRUE){
			$this->error = $this->conn->error;
		}
	}

}

?>
