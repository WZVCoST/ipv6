<?php session_start(); ?>
<!doctype html>
<html>
<head>

 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<title>后台登录</title>
    <!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style>
	body{
		margin:0 auto;
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
            <li><a href="adminclass.php">管理员管理</a></li>
			<?php
			if(!isset($_SESSION["userName"])){
				echo "<li class='active'><a href='adminlogin.php'>管理员登录</a></li>";
			}
else
			{
				echo "<li class='active'><a href='adminlogin.php'>切换管理员</a></li>";
			}
											 
			?>
        </ul>
    </div>
		<!--右边的用户-->
		<?php 
		if(isset($_SESSION["userName"])){ 
		echo "<div style='height: 46px;width: 140px;float: right;'>";
		echo "<div style='float: left;background-size: cover;	background-position:center; height: 45px; width: 45px; border-radius: 50%; background-image: url(".$_SESSION['iconAdd'].")';></div>";
		echo "<div style='float: left; padding: 15px; width: 80px; height: 40px; font-size: 16px;'><a href='log_out.php'>[注销]</a></div>";
		}else
		{
			echo "<div style='float: right; padding: 15px; width: 80px; height: 40px; font-size: 16px;'><a href='adminlogin.php'>[登录]</a></div>";
		}
		?>
<!--	</div>-->
	</div>
	
</nav>

	<?php
	//名词变量
	$do = "0";
				if(!isset($_SESSION["userName"])){
				$do = "登录";
			}
			else
			{
				$do = "切换";
			}
					
	?>

	<!--  ************表单部分	-->
	<div class="container">
	<form class="form-horizontal" method="post" action="admin_login.php" enctype="multipart/form-data">
		<br />
		<div class="row">

			<label class="control-label col-sm-4" for="username"></label>
			<div class="col-sm-8"><h1>后台管理员<?php echo $do; ?></h1></div>
			
		</div>
		<br /><br />
		<div class="row">
			<label class="control-label col-sm-4" for="username">用户名|身份：</label>
			<div class="col-sm-4"><input class="form-control" type="text" name="userName" id="username" placeholder="请输入您的用户名" required></div>
			<div class="col-sm-4"></div>
		</div>
		<br />
		<div class="row">
			<label class="control-label col-sm-4" for="username">请输入密码：</label>
			<div class="col-sm-4"><input class="form-control" type="password" name="userPassWord" id="username" placeholder="请输入您的管理员密码" required></div>
			<div class="col-sm-4"></div>
		</div>
		<br />
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 text-center"><input class=" btn btn-primary" type="submit" value="<?php echo $do; ?>"></div>
			<div class="col-md-4" style="padding-top: 20px;"><a href="applicationadmin.php">管理员申请></a></div>
		</div>
	</div>
</body>
</html>