<?php
    require("../lib.php");
    function kt($string){
       if($string=="_chuanhapdulieu" || $string=="_saidulieu") return false;
       else return true;
    }
    function isConnected()
    {
       if (@fsockopen("www.google.com", 80)) return true;
       else return false;
    }
    if(!isset($_SESSION["plazadakid_dangnhap"])) $_SESSION["plazadakid_dangnhap"]=0;
    if(!isset($_SESSION["plazadakid_user"])) $_SESSION["plazadakid_user"]=0;
    if($_SESSION["plazadakid_dangnhap"]!=0 && $_SESSION["plazadakid_dangnhap"]!=-1) header("Location: index.php");

    $username=$_SESSION["plazadakid_user"];
    //capcha
    $re_name="_chuanhapdulieu";
    $re_pass="_chuanhapdulieu";
    $re_phone="_chuanhapdulieu";
    $re_address="_chuanhapdulieu";
    if(isset($_POST['submit'])){
       $captcha = false;
       if(isset($_POST['g-recaptcha-response'])) $captcha = $_POST['g-recaptcha-response'];
       if(isset($_POST["re_name"])) $re_name=$_POST["re_name"];
       if(isset($_POST["phone"])) $re_phone=$_POST["phone"];
       if(isset($_POST["address"])) $re_address=$_POST["address"];
       if(isset($_POST["re_pass"])) $re_pass=$_POST["re_pass"];
       if($captcha && isConnected()){
          $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Le9YnsUAAAAAC0gvAaLQPZ0U4JO6Zm_2E6eQZW3&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
          $response = strpos($response,'"success": true');
          if($response != false){
            $r = mysqli_query($connect,"select * from user where username='$re_name'");
            if($r!=false && mysqli_num_rows($r)>0) $re_name = "_saidulieu";
            $r = mysqli_query($connect,"select * from user where phone='$re_phone'");
            if($r!=false && mysqli_num_rows($r)>0) $re_phone = "_saidulieu";
            if(isset($_POST["pass2"]) && $_POST["pass2"]!=$re_pass) $re_pass = "_saidulieu";
            if (kt($re_name) && kt($re_phone) && kt($re_address) && kt($re_pass)) {
               $re_pass=md5($re_pass);
               mysqli_query($connect,"insert into user values('$re_name','$re_pass',2,'$re_phone','$re_address')");
               $_SESSION["plazadakid_user"]=$re_name;
               $_SESSION["plazadakid_dangnhap"]=2;
               header("Location: index.php");
            }
            else echo "<script>alert('Đăng ký thất bại!')</script>";
          }
       }
       else{
          echo "<script>alert('Chưa xác nhập captcha hoặc không có kết nối mạng!')</script>";
       }
    }
    $bodypage="body/register.body.php";
    $selfpage="homepage/index.php";
    include("template.php");
?>