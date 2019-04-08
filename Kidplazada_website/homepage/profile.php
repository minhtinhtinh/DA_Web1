<?php
require("../lib.php");
if(!isset($_SESSION["plazadakid_dangnhap"])) $_SESSION["plazadakid_dangnhap"]=0;
if(!isset($_SESSION["plazadakid_user"])) $_SESSION["plazadakid_user"]=0;
if($_SESSION["plazadakid_dangnhap"]<=0) header("Location: index.php");

$username=$_SESSION["plazadakid_user"];
$table=mysqli_query($connect,"select * from user where username='$username'");
$phone=null;
$address=null;
$pass=null;
$image=null;
while ($row=mysqli_fetch_array($table))
{
    $phone=$row["phone"];
    $address=$row["address"];
    $pass=$row["password"];
    $image=$row["image"];
}
if($image=="") $image="images/default-user.png";
$bodypage="body/profile.body.php";
$selfpage="homepage/index.php";
include("template.php");
?>