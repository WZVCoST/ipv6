<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style>
body{ margin-bottom:50px;}
.button1{ width:80%;}
.div1{ background-color:#CCC}
.userAbout{ float:right}
nav p {color:#CCC;
        padding-top:15px;}
.rfloat{ float:right}

</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                　
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="index.php">首 页</a>
            </div>
            <div class="collapse navbar-collapse navbar-responsive-collapse">
            <!--********collapse navbar-collapse navbar-responsive-collapse-->
                <ul class="nav navbar-nav">
                    <li><a href="release.php">视频发布</a></li>
                    <li class="dropdown">
                    <a href="##" data-toggle="dropdown" class="dropdown-toggle">用户中心<span class="caret"></span></a>
					<ul class="dropdown-menu">
                    	<li><a href="login.php">登录</a></li>
                        <li><a href="logon.php">注册</a></li>
                        <li><a href="userpage.php">个人主页</a></li>
                    	<li><a href="myrelease.php">我的发布</a></li>
                    </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
				 <?php
				session_start();
				if(empty($_SESSION["userMail"])){
				echo "<li><a href='login.php'>登录</a></li>
                    	<li><a href='logon.php'>注册</a></li>";
				}else{echo "<li><p>你好,".$_SESSION["userName"]."<a href='log_out.php'>[注销]</a></p></li>";}
			    ?>
				</ul>
                
            </div>
        </div>
</nav>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
