<?php
    session_start();
    $connect = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connect,"kidplazadadb");
    mysqli_query($connect, "Set NAMES 'utf8'");
    //code
?>