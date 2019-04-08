<?php
require_once './cart.inc';

 //session_start();
// if (!isset($_SESSION["cart"])) {
// 	$_SESSION["cart"] = array();
// }

if (isset($_POST["btnAddItemToCart"])) {
	$proId = $_POST["addProductID"];
	$q = $_POST["addQuantity"];

	add_item($proId, $q);

	// if (array_key_exists($proId, $_SESSION["cart"])) {
	// 	$_SESSION["cart"][$proId] += $q;
	// } else {
	// 	$_SESSION["cart"][$proId] = $q;
	// }
	if (isset($_SERVER['HTTP_REFERER'])) {
	    $url = $_SERVER['HTTP_REFERER'];
	    header("location: $url");
	}
}
else
{
	header("location: index.php");
}
?>