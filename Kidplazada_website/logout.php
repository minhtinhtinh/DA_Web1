<?php
    session_start();
    $_SESSION["plazadakid_dangnhap"]="0";
    $_SESSION["plazadakid_user"]="0";
    session_destroy();
    $url=$_GET["selfpage"];
    header("Location: $url");
?>
