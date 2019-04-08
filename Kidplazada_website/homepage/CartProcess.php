<?php
require_once 'cart.inc';

session_start();
if (!isset($_SESSION["cart"])) {
	$_SESSION["cart"] = array();
}

$else = 0;
if (isset($_POST["addcart"])) {
	$proId = $_POST["id"];
	$q = $_POST["amount"];

	add_item($proId, $q);
	
	if (isset($_SERVER['HTTP_REFERER'])) {
	   $url = $_SERVER['HTTP_REFERER'];
	   header("location: $url");
	}
}
else $else++;

if (isset($_POST["delcart"])) {
	$proId = $_POST["id"];

	delete_item($proId);
	
	if (isset($_SERVER['HTTP_REFERER'])) {
	   $url = $_SERVER['HTTP_REFERER'];
	   header("location: $url");
	}
}
else $else++;

if (isset($_POST["changecart"])) {
	$proId = $_POST["id"];

	update_item($proId, $_POST["quantity"]);
	
	if (isset($_SERVER['HTTP_REFERER'])) {
	   $url = $_SERVER['HTTP_REFERER'];
	   header("location: $url");
	}
}
else $else++;

if($else==3) header("Location: index.php");
?>