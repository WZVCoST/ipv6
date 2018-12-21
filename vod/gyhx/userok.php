<?php
//获得用户ID
$userName = $_GET["usn"];
echo $userName;

//执行更新语句
include "inc/pdo.php";
$msgdelSql="UPDATE user SET class = 1 WHERE userName = '{$userName}'";//更新的语句
$msgdelQueryOut=$pdo->query($msgdelSql);

//返回上一页
echo "<script>window.history.go(-1);</script>";
?>