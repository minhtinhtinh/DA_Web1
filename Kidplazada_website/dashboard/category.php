<?php
    require("../lib.php");

    if(!isset($_SESSION["plazadakid_dangnhap"]) || $_SESSION["plazadakid_dangnhap"]!=1) header("Location: ../error.html");
    
    if(isset($_POST["Save"]) && isset($_POST["cname"]) && isset($_POST["cdescription"])){
        $cname=$_POST["cname"];
        $cdes=$_POST["cdescription"];
        $id=$_POST["id"];
        mysqli_query($connect,"update category set name='$cname', description='$cdes' where id='$id'");
        header("Location: category.php");
    }
    else{
        if(isset($_POST["Save"])) echo "<script>alert('Phải nhập đầy đủ các thông tin!')</script>";
    }
    if(isset($_POST["Add"]) && isset($_POST["nname"]) && isset($_POST["ndescription"])){
        $nname=$_POST["nname"];
        $ndes=$_POST["ndescription"];
        mysqli_query($connect,"insert into category(name,description) values('$nname','$ndes')");
        header("Location: category.php");
    }
    else{
        if(isset($_POST["Add"])) echo "<script>alert('Phải nhập đầy đủ các thông tin!')</script>";
    }
    $bodypage = "body/category.body.php";
    include("template.php")
?>