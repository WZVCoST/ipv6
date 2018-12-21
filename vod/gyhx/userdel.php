<?php
$userName = $_GET["usn"];
echo $userName;
include "inc/pdo.php";
$msgdelSql="delete from user where userName='{$userName}'";
$msgdelQueryOut=$pdo->query($msgdelSql);
echo "<script>window.history.go(-1);</script>";
?>