<link rel="stylesheet" type="text/css" href="css/checkout.css">
<?php
   require("../lib.php");
   if(!isset($_SESSION["plazadakid_dangnhap"])) $_SESSION["plazadakid_dangnhap"]=0;
   if(!isset($_SESSION["plazadakid_user"])) $_SESSION["plazadakid_user"]=0;

   $username=$_SESSION["plazadakid_user"];

   if(isset($_POST["buy"])){
      if($username=="0") echo "<script>alert('Vui lòng đăng nhập để thanh toán!')</script>";
      else{
         $date = date("Y-m-d");
         $total = $_POST["total"];
         $table = mysqli_query($connect,"select * from `user` where username='$username'");
         $row = mysqli_fetch_array($table);
         $address = $row["address"];
         mysqli_query($connect,"insert into `order`(username,orderTime,`status`,deliveryAddress,total) values('$username','$date','chờ duyệt','$address',$total)");

         $table = mysqli_query($connect,"select * from `order` where username='$username' and orderTime='$date' and total=$total order by id desc");
         $row = mysqli_fetch_array($table);
         $id=$row["id"];
         foreach ($_SESSION["cart"] as $proId => $q){
            mysqli_query($connect,"insert into `orderdetail` values('$proId',$q,$id)");
            mysqli_query($connect,"update `product` set buyCount=buyCount+$q, count=count-$q where id='$proId'");
            unset($_SESSION["cart"][$proId]);
         }
         echo "<script>alert('Thanh toán thành công!, đơn hàng của bạn đang được xem xét.')</script>";
      }
   }
   $bodypage="body/cart.body.php";
	$selfpage="homepage/cart.php";
	include("template.php");
?>