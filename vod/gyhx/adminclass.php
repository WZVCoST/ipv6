<?php
//验证是否登录
session_start();
if($_SESSION["userName"] == NULL)
	{
		echo "<script>alert('尚未登陆，请先登录');window.location ='adminlogin.php'</script>";
		exit();
	}else{
		$userName = $_SESSION["userName"];
		$userClass = $_SESSION["userClass"];
		if($userClass<2){
		echo "<script>alert('等级不够，不能访问这个页面。');window.history.go(-1);</script>";
		exit();
		}
	}


?>
<!doctype html>
<html>
<head>

 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<title>管理员管理</title>
    <!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style>
		a:link{
		text-decoration:none;
	}
	a:visited{
		text-decoration:none;
	}
	a:hover{
		text-decoration:none;
	}
	a:active{
		text-decoration:none;
	}
	body{
		margin:0 auto;
	}
	.userLine{
		width:100%;
		height:62px;
		border-radius: 12px;
		background-color: #BCBAED;
		padding: 8px;
		font-size: 16px;
	}
	.userAction{
		width:80px;
		height: 45px;
		float:right;
	}
	.userActionLink{
		width:100%;
		height: 50%;
	}
</style>
</head>

<body>
<!--***************导航栏****************** -->
<nav class="navbar navbar-inverse" role="navigation" >
	<div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php">古堰画乡</a>
    </div>
    <div>
        <ul class="nav navbar-nav">
            <li><a href="backstage.php">消息管理</a></li>
            <li><a href="applicationadmin.php">管理员申请</a></li>
            <li class="active"><a href="adminclass.php">管理员管理</a></li>
			<?php
			if($_SESSION["userName"] == NULL){
				echo "<li><a href='adminlogin.php'>管理员登录</a></li>";
			}
else
			{
				echo "<li><a href='adminlogin.php'>切换管理员</a></li>";
			}
											 
			?>
        </ul>
    </div>
		<!--右边的用户-->
		<?php 
		if($_SESSION["userName"]!=NULL){ 
		echo "<div style='height: 46px;width: 140px;float: right;'>";
		echo "<div style='float: left;background-size: cover;	background-position:center; height: 45px; width: 45px; border-radius: 50%; background-image: url(".$_SESSION['iconAdd'].")';></div>";
		echo "<div style='float: left; padding: 15px; width: 80px; height: 40px; font-size: 16px;'><a href='log_out.php'>[注销]</a></div>";
		}else
		{
			echo "<div style='float: left; padding: 15px; width: 80px; height: 40px; font-size: 16px;'><a href='adminlogin.php'>[登录]</a></div>";
		}
		?>
<!--	</div>-->
	</div>
	
</nav>

<!--申请列表-->
<div>
			<?php
	include "inc/pdo.php";
	?>
			<!--********一块的遍历布局********-->
			<?php
				try{ 
					$query = "select * from user where class < 2";
					$result = $pdo->prepare($query);
					$result->execute();
				while($res=$result->fetch(PDO::FETCH_ASSOC))
					{
//						if($res["messageType"] != 1)
//						echo $res["userName"];
						
						?>
						<div class="container">
						<div class="col-sm-2"></div>
						<div class="col-sm-8">
							<div class="userLine">
							<!--头像-->
<div style="float: left;background-size: cover;	background-position:center; height: 45px; width: 45px; border-radius: 50%; background-image: url(<?php echo $_SESSION['iconAdd'];?>)"></div>
							<!--用户名-->
							<div style="height: 45px;width: 150px;overflow-x:hidden;float:left;padding: 5px;">
								<div style="height: 20px; font-size: 14px;">
									<?php echo $res["userName"]; ?>
								</div>
								<div>
									<div style="height: 18px; font-size: 12px;">
										<?php echo "手机号：".$res["phoneNum"]; ?>
									</div>
								</div>
							</div>
							<!--操作-->
							<div class="userAction">
								<div class="userActionLink"><?php if($res["class"] < 1){echo "<a href='userok.php?usn=".$res["userName"]."'>[同意]</a>";}else{echo "<div style='color:green'>已同意</div>";} ?></div>
			<div class="userActionLink"><a href="userdel.php?usn=<?php echo $res['userName']; ?>">[删除]</a></div>
							</div>
							</div>
						</div>
							</div>
						<div class="col-sm-2"></div>
						</div>
							
						<br />
						
						<?php
					}
				
			}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}

			?>
</div>
</body>
</html>