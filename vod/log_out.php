<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>注销账户</title>
</head>

<body>
<?php
session_start();
if($_SESSION["userMail"] != NULL)
{
	$_SESSION["userMail"] = NULL;
	$_SESSION["admin"] = false;
	echo "<script>window.history.go(-1);</script>";
	}else{
		echo "<script>alert('您未登录！');window.location ='login.php';</script>";
		}
?>
</body>
</html>