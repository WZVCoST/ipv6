<?php
session_start();
$_SESSION["userClass"]=NULL;
$_SESSION["userName"]=NULL;
$_SESSION["iconAdd"]=NULL;
echo "<script>window.history.go(-1);</script>";
?>