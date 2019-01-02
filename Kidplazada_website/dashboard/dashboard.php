<?php
    require("../lib.php");

    if(!isset($_SESSION["plazadakid_dangnhap"]) || $_SESSION["plazadakid_dangnhap"]!=1) header("Location: ../error.html");
    if(isset($_POST["cday"]) && isset($_POST["save"])){
        $days=$_POST["cday"];
        $id=$_POST["id"];
        mysqli_query($connect,"update `order` set deliveryDays=$days where id=$id");
        header("Location: dashboard.php");
    }
    $bodypage = "body/dashboard.body.php";
    include("template.php")
?>