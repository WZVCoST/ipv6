<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登录提交</title>
</head>

<body>
<?php
$userMail = $_POST["mail"];
$userPwd = md5($_POST["password"]);

//echo "传输：".$userMail."<br>".$userPwd;

include"pdo.php";
try{ 
		$query = "select * from users where mail='$userMail'";
		$result = $pdo->prepare($query);
		$result->execute();
$res=$result->fetch(PDO::FETCH_ASSOC);
if(empty($res))
	{
		 echo "<script>alert('没有此邮箱账户!');window.location ='login.php';</script>";
		}
	else
	{
		if($userPwd == $res["pwd"])
		{
			session_start();
			//$_SESSION["admin"]=true;
			$_SESSION["userMail"]=$userMail;
			$_SESSION["userName"]=$res["userName"];
			echo "<script>window.location ='userpage.php';</script>";
			/*<!--echo "<script>window.history='userpage.php';</script>";-->*/
			echo $_SESSION["userMail"];
			}
			else{"<script>alert('密码验证时错误!');</script>";}
		}
//print_r($res);

/*		while($res=$result->fetch(PDO::FETCH_ASSOC)){
			echo "<br><br>";
			echo $res["mail"];
			}*/

		}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}
			
			

?>
</body>


</html>