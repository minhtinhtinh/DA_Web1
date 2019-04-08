<?php
    require("../lib.php");

    if(!isset($_SESSION["plazadakid_dangnhap"]) || $_SESSION["plazadakid_dangnhap"]!=1) header("Location: ../error.html");
    
    if(isset($_POST["save"]) && $_POST["cname"]!="" && $_POST["caddress"]!=""){
        $cname=$_POST["cname"];
        $caddress=$_POST["caddress"];
        $cphone=$_POST["cphone"];
        $id=$_POST["id"];
        mysqli_query($connect,"update producer set name='$cname', address='$caddress', phone='$cphone' where id='$id'");
        header("Location: producer.php");
    }
    else{
        if(isset($_POST["Add"])) echo "<script>alert('Phải nhập đầy đủ các thông tin!')</script>";
    }
    if(isset($_POST["add"]) && $_POST["nname"]!="" && $_POST["naddress"]!="" && $_POST["nphone"]!=""){
        $nname=$_POST["nname"];
        $naddress=$_POST["naddress"];
        $nphone=$_POST["nphone"];
        $r=mysqli_query($connect,"select * from producer where name='$nname'");
        if($r!=false && mysqli_num_rows($r)==0) mysqli_query($connect,"insert into producer(name,address,phone) values('$nname','$naddress','$nphone')");
        header("Location: producer.php");
    }
    else{
        if(isset($_POST["add"])) echo "<script>alert('Phải nhập đầy đủ các thông tin!')</script>";
    }
    $bodypage = "body/producer.body.php";
    include("template.php")
?>