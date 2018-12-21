<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>收藝处睆</title>
</head>

<body>
<?php
session_start();
$videoID=$_GET["videoID"];
$followUser=$_SESSION["userMail"];
echo $videoID.$followUser;
include "pdo.php";
$followInsSql="insert into follow(followUser,followVideo) values('{$followUser}','{$videoID}')";
$followInsert=$pdo->query($followInsSql);
echo "<script>window.history.go(-1);</script>"
?>
</body>
</html>