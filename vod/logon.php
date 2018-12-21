<!doctype html>
<html>
<head>

<style>

body{margin:0 auto;}

</style>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<meta charset="utf-8">
<title>用户注册</title>
</head>

<body>
<?php
include"head.php";
?>
<div class="jumbotron">
<form class="form-horizontal" method="post" action="log_on.php" enctype="multipart/form-data">

	<div class="container">
    	<div class="row">
    		<div class="col-md-4"></div>
    		<div class="col-md-4 text-center"><h2>用户注册</h2><br></div>
        	<div class="col-md-4"></div>
        </div>
        
		<div class="row">
			<label class="control-label col-md-4" for="username">用户昵称：</label>
			<div class="col-md-4"><input class="form-control" type="text" name="userName" id="username" placeholder="请输入您的昵称" required></div>
			<div class="col-md-4"></div>
		</div>
		
        <br />
        <div class="row">
			<label class="control-label col-md-4" for="password">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</label>
			<div class="col-md-4"><input class="form-control" type="password" name="password" id="password" placeholder="请输入您的密码" required></div>
			<div class="col-md-4"></div>
		</div>
        
         <br />
        <div class="row">
			<label class="control-label col-md-4" for="tx">头像上传：</label>
			<div class="col-md-4"><input type="file" name="icon" id="tx" required></div>
			<div class="col-md-4"></div>
		</div>
        
         <br />
        <div class="row">
			<label class="control-label col-md-4" for="email">邮箱地址：</label>
			<div class="col-md-4"><input class="form-control" type="email" name="mail" id="email" placeholder="请输入您的邮箱" required></div>
			<div class="col-md-4"></div>
		</div>
        
         <br />
        <div class="row">
			<label class="control-label col-md-4" for="phone">手机号码：</label>
			<div class="col-md-4"><input class="form-control" type="number" name="userTel" id="phone" placeholder="请输入联系号码" required></div>
			<div class="col-md-4"></div>
		</div>

 		<br />
        <div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 text-center"><input class=" btn btn-primary" type="submit" value="注册"></div>
			<div class="col-md-4"></div>
		</div>

	</div>
</form>
</div>
</body>
</html>
<!--密码：<input type="password" name="pwd" required><span>*</span><br /><br />-->
<!--头像上传：<input type="file" name="icon" required><span>*</span><br /><br />-->
<!--邮箱地址：<input type="email" name="mail" required><span>*</span><br /><br />-->
<!--手机号码：<input type="text" name="userTel" required><span>*</span><br /><br />-->
<!--<input type="submit" value="注册"><br /><br /><br /><br />-->