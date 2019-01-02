<?php
	require("../lib.php");

	if(!isset($_SESSION["plazadakid_dangnhap"])) $_SESSION["plazadakid_dangnhap"]=0;
	if(!isset($_SESSION["plazadakid_user"])) $_SESSION["plazadakid_user"]=0;

	$username=$_SESSION["plazadakid_user"];
	$condition = "1=1";
	if(isset($_GET["producerID"]) && $_GET["producerID"]!="all") $condition=$condition." and producer=".$_GET["producerID"];
	if(isset($_GET["categoryID"]) && $_GET["categoryID"]!="all") $condition=$condition." and category=".$_GET["categoryID"];
	if(isset($_GET["search"])) $condition=$condition." and name like binary '%".strtolower($_GET["search"])."%'";
	if(isset($_GET["range"])) $condition=$condition." and price<=".$_GET["range"];
	$string="&".$_SERVER['QUERY_STRING'];
	if(strpos($string,"page")!=false) $string=substr($string,7);
	$bodypage="body/shop.body.php";
	$selfpage="homepage/shop.php";
	include("template.php");
?>