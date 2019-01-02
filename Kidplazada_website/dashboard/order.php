<?php
    require("../lib.php");

    if(!isset($_SESSION["plazadakid_dangnhap"]) || $_SESSION["plazadakid_dangnhap"]!=1) header("Location: ../error.html");
    
    if(isset($_POST["cstatus"])){
        $cstatus=$_POST["cstatus"];
        $id=$_POST["id"];
        mysqli_query($connect,"update `order` set status='$cstatus' where id='$id'");
        header("Location: order.php");
    }
    $bodypage = "body/order.body.php";
    include("template.php")
?>