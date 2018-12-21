<?php
$userName = $_POST["userName"];
$userPassWord = md5($_POST["userPassWord"]);
$s = "<br />";

include("inc/pdo.php");

try{ 
		$query = "select * from user where userName='$userName'";
		$result = $pdo->prepare($query);
		$result->execute();
$res=$result->fetch(PDO::FETCH_ASSOC);
	var_dump($res);
if(empty($res))
	{
		 echo "<script>alert('未查找到此管理员!');window.location.href='adminlogin.php';</script>";
		}
	else
	{
		if($userPassWord == $res["userPassWord"])
		{
			session_start();
			//$_SESSION["admin"]=true;
			//$_SESSION["userName"]=$res["userName"];
			$_SESSION["userClass"]=$res["class"];
			if($_SESSION["userClass"] >=1)
			{
				$_SESSION["userName"]=$res["userName"];
				$_SESSION["iconAdd"]=$res["iconAdd"];
				echo "用户名：".$_SESSION["userName"]."<script>alert('管理员已登录!');window.location.href='backstage.php';</script>";
			}else
			{
				echo "<script>alert('您的用户未通过审核或异常！请更换用户登录。');window.location.href='adminlogin.php';</script>";
			}
			//echo "<script>window.location ='userpage.php';</script>";
			/*<!--echo "<script>window.history='userpage.php';</script>";-->*/
			}
			else{echo "<script>alert('密码验证时错误!');window.location.href='adminlogin.php';</script>";}
		}

	}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}
?>