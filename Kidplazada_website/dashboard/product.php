<?php
    require("../lib.php");

    if(!isset($_SESSION["plazadakid_dangnhap"]) || $_SESSION["plazadakid_dangnhap"]!=1) header("Location: ../error.html");
    
    if(isset($_POST["save"]) && $_POST["cname"]!="" && $_POST["cid"]!="" && $_POST["ccategory"]!="" && $_POST["cproducer"]!="" && $_POST["cprice"]!="" && $_POST["ccount"]!="" && $_POST["cnation"]!="" && $_POST["cdescription"]!=""){
        $cid=$_POST["cid"];
        $cname=$_POST["cname"];
        $ccategory=$_POST["ccategory"];
        $cproducer=$_POST["cproducer"];
        $cdes=$_POST["cdescription"];
        //$cimage="'".$_POST["cimage"]."'";
        $cprice=$_POST["cprice"];
        $ccount=$_POST["ccount"];
        $cnation=$_POST["cnation"];
        $id=$_POST["id"];
        if($_POST["cimage"]=="1"){
            if(isset($_SESSION["upimage"])){
                unlink("../homepage/$cimage");
                $cimage="'".$_SESSION["upimage"]."'";
                unset($_SESSION["upimage"]);
                mysqli_query($connect,"update product set id='$cid', name='$cname', category=$ccategory, producer=$cproducer,description='$cdes', image=$cimage, count=$ccount, price=$cprice, nation='$cnation' where id='$id'");
                header("Location: product.php");
            }
            else echo "<script>alert('Không tìm thấy ảnh upload!')</script>";
        }
        else{
            mysqli_query($connect,"update product set id='$cid', name='$cname', category=$ccategory, producer=$cproducer,description='$cdes', count=$ccount, price=$cprice, nation='$cnation' where id='$id'");
            header("Location: product.php");
        }
    }
    else{
        if(isset($_POST["save"])) echo "<script>alert('Phải nhập đầy đủ các thông tin!')</script>";
    }
    if(isset($_POST["upload"]) && isset($_FILES["nimage"]) && $_FILES["nimage"]["error"] == 0){
        $_SESSION["upimage"]="dbImage/".$_FILES["nimage"]["name"];
        move_uploaded_file($_FILES["nimage"]["tmp_name"],"../homepage/dbImage/".$_FILES["nimage"]["name"]);
    }
    if(isset($_POST["Add"]) && $_POST["nname"]!="" && $_POST["nid"]!="" && $_POST["ncategory"]!="" && $_POST["nproducer"]!="" && $_POST["nprice"]!="" && $_POST["ncount"]!="" && $_POST["nnation"]!="" && $_POST["ndescription"]!=""){
        $nid=$_POST["nid"];
        $nname=$_POST["nname"];
        $ncategory=$_POST["ncategory"];
        $nproducer=$_POST["nproducer"];
        $ndes=$_POST["ndescription"];
        $nprice=$_POST["nprice"];
        $ncount=$_POST["ncount"];
        $nnation=$_POST["nnation"];
        $nimage="null";
        if(isset($_SESSION["upimage"])){
            $nimage="'".$_SESSION["upimage"]."'";
            unset($_SESSION["upimage"]);
            mysqli_query($connect,"insert into product(id,name,category,producer,description,image,price,nation,count) values('$nid','$nname','$ncategory','$nproducer','$ndes',$nimage,'$nprice','$nnation','$ncount')");
            header("Location: product.php");
        }
        else echo "<script>alert('Phải upload ảnh lên mới thêm sản phẩm!')</script>";
    }
    else{
        if(isset($_POST["Add"])) echo "<script>alert('Phải nhập đầy đủ các thông tin!')</script>";
    }
    $bodypage = "body/product.body.php";
    include("template.php")
?>