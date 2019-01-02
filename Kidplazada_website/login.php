<?php
    require("lib.php");
    if (isset($_REQUEST["username"]) && isset($_REQUEST["password"])) {
        $username = $_POST["username"];
        $pass = md5($_POST["password"]);
        $r = mysqli_query($connect,"select * from user where username='$username' and password='$pass'");
        if ($r != false && mysqli_num_rows($r)>0) {
            $_SESSION["plazadakid_dangnhap"]=mysqli_fetch_array($r)["role"];
            $_SESSION["plazadakid_user"]=$username;
        }
        else $_SESSION["plazadakid_dangnhap"]=-1;
    }
    $url=$_POST["selfpage"];
    header("Location: $url");
?>