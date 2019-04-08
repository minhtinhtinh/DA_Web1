<?php
    require("../lib.php");
    if(!isset($_SESSION["plazadakid_dangnhap"]) || $_SESSION["plazadakid_dangnhap"]!=1) header("Location: ../error.html");
    if(isset($_GET["cmd"])){
        mysqli_query($connect,$_GET["cmd"]);
        if(isset($_GET["delimage"])) unlink("../homepage/".$_GET["delimage"]);
        if(isset($_GET["update"])){
            $table = mysqli_query($connect,"select * from orderdetail where orderID='".$_GET["update"]."'");
            while($row = mysqli_fetch_array($table)){
                $quantity = $row["count"];
                $id = $row["product"];
                mysqli_query($connect,"update product set buyCount=buyCount+$quantity, count=count-$quantity where id='$id'");
            }
        }
        $url=$_GET["selfpage"];
        header("Location: $url");
    }
    else header("Location: ../error.html");
?>