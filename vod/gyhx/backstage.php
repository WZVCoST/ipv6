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
	}

?>
<!doctype html>
<html>
<head>

 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
<title>消息后台管理</title>
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
	
	#messageContent{height:150px; width: 100%}
	
	.messageList{width:100%;height:120px;background-color:#F4F4F4;border-radius: 5px;}
	.msgUp{
		height:38%; 
		width: 100%;
		border-radius: 5px; 
		background-color:#8FDF89; 
		overflow:hidden;
		font-size: 27px;
		padding: 5px;
		background-position-x: center;
		background-position-y: center; 
		background-size: cover;
		color:aliceblue;
		}
	.ox{
		width: 34px;
		height: 34px;
		background-color: #FFFFFF; 
		color:#D02326;
		border-radius: 50%;
		font-size: 26px;
		text-align: center;
		float: left;
		margin-right: 10px;
	}
	
	.msgDown{
		width:100%;
		height: 62%;
		border-radius: 5px;overflow-y: scroll;
		font-size: 16px;
		padding: 5px;
		color:#8A8A8A;
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
            <li class="active"><a href="backstage.php">消息管理</a></li>
            <li><a href="applicationadmin.php">管理员申请</a></li>
            <li><a href="adminclass.php">管理员管理</a></li>
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
	

	<div style="padding: 20px; font-size: 40px;">信息发布<hr color="#979797" /></div>
	<div class="container" style="background-color: #DFDFDF">
	<form class="form-horizontal" method="post" action="message_release.php" enctype="multipart/form-data">
		<div class="row">

<!--			<label class="control-label col-sm-4" for="username"></label>-->
<!--			<div class="col-sm-8"><h1>发布信息</h1></div>-->
		</div>
		<br /><br />
		<div class="row">
			<label class="control-label col-sm-4" for="messageTitle">信息标题：</label>
			<div class="col-sm-4"><input class="form-control" type="text" name="messageTitle" id="username" placeholder="填写标题信息" required></div>
			<div class="col-sm-4"></div>
		</div>
		<br />
		<div class="row">
			<label class="control-label col-sm-4" for="messageContent">信息内容：</label>
			<div class="col-sm-4"><textarea class="form-control" name="messageContent" id="messageContent" placeholder="编写消息内容" required></textarea></div>
			<div class="col-sm-4"></div>
		</div>
		
		<br />
		<div class="row">
			<label class="control-label col-sm-4" for="messageType"> 消息类型：</label>
			<div class="col-sm-4">
				<select class="form-control" data-style="btn-info" name="messageType">
					<option value=1>走进景区</option>
					<option value=2>景点对焦</option>
					<option value=3>文化产业</option>
				</select>
			</div>
			<div class="col-sm-4"></div>
		</div>
		
		
		<br />
		<div class="row">
			<label class="control-label col-sm-4" for="username"> 配图上传：</label>
			<div class="col-sm-4">
				<input type="file" name="messageImgAdd" id="tx" required>
			</div>
			<div class="col-sm-4"></div>
		</div>

		
		<br />
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 text-center"><input class=" btn btn-primary" type="submit" value="发布"></div>
			<div class="col-md-4"></div>
		</div>
		<br />
	</div>
	
	
</div>


<!-- 消息管理部分 -->

<?php
	include "inc/pdo.php";
	
?>


<div style="padding: 20px; font-size: 40px;">信息管理<hr color="#979797" /></div>

<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<h2>走进景区</h2>
			
			<!--********一块的遍历布局********-->
			<?php
				try{ 
					$query = "select * from message where messageType = 1";
					$result = $pdo->prepare($query);
					$result->execute();
				while($res=$result->fetch(PDO::FETCH_ASSOC))
					{
//						if($res["messageType"] != 1)
						?>
						<hr />
						
						<div class="messageList">
							<!--上半块-->
							<div style="background-image: url('<?php echo $res['messageImgAdd']; ?>')" class="msgUp"><a href="message_del.php?msgid=<?php echo $res['messageID'];?>"><div class="ox">X</div></a><?php echo $res["messageTitle"];?></div>
							<!--下半块-->
							<div class="msgDown">
								<?php  echo $res["messageContent"]; ?>
							</div>
						</div>
						
						<?php
					}
				
			}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}

			?>
			
		</div>
		
		<div class="col-sm-4">
			<h2>景点对焦</h2>
			
						
			<!--********一块的遍历布局********-->
			<?php
				try{ 
					$query = "select * from message where messageType = 2";
					$result = $pdo->prepare($query);
					$result->execute();
				while($res=$result->fetch(PDO::FETCH_ASSOC))
					{
//						if($res["messageType"] != 1)
						?>
						<hr />
						
						<div class="messageList">
							<!--上半块-->
							<div style="background-image: url('<?php echo $res['messageImgAdd']; ?>')" class="msgUp"><a href="message_del.php?msgid=<?php echo $res['messageID'];?>"><div class="ox">X</div></a><?php echo $res["messageTitle"];?></div>
							<!--下半块-->
							<div class="msgDown">
								<?php  echo $res["messageContent"]; ?>
							</div>
						</div>
						
						<?php
					}
				
			}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}

			?>
			
		</div>
		<div class="col-sm-4">
			<h2>文化产业</h2>
			
						
			<!--********一块的遍历布局********-->
			<?php
				try{ 
					$query = "select * from message where messageType = 3";
					$result = $pdo->prepare($query);
					$result->execute();
				while($res=$result->fetch(PDO::FETCH_ASSOC))
					{
//						if($res["messageType"] != 1)
						?>
						<hr />
						
						<div class="messageList">
							<!--上半块-->
							<div style="background-image: url('<?php echo $res['messageImgAdd']; ?>')" class="msgUp"><a href="message_del.php?msgid=<?php echo $res['messageID'];?>"><div class="ox">X</div></a><?php echo $res["messageTitle"];?></div>
							<!--下半块-->
							<div class="msgDown">
								<?php  echo $res["messageContent"]; ?>
							</div>
						</div>
						
						<?php
					}
				
			}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}

			?>
			
		</div>
	</div>
</div>

<br /><br /><br /><br />

</body>
</html>