<?php 
require_once "includes/header.php";
require_login();
setcookie("mmuid", $user["id"], time() - (86400 * 30), "/");
header("Location: /");
?>