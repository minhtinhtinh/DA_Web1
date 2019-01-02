<?php
	require("../lib.php");

	if(!isset($_SESSION["plazadakid_dangnhap"])) $_SESSION["plazadakid_dangnhap"]=0;
	if(!isset($_SESSION["plazadakid_user"])) $_SESSION["plazadakid_user"]=0;

   $username=$_SESSION["plazadakid_user"];

   $bodypage="body/about.body.php";
   $selfpage="homepage/about.php";
   include("template.php");
?>