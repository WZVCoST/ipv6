<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>取消收藏</title>
</head>

<body>
<?php
$followID=$_GET["followID"];
include "pdo.php";
//DELETE FROM 表名称 WHERE 列名称 = 值
echo $followID;
$unfollowSql="delete from follow where followID='{$followID}'";
$unfollowExe=$pdo->query($unfollowSql);
echo "<script>window.history.go(-1);</script>";
?>
</body>
</html>