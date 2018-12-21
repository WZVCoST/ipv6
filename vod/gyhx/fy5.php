<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>走进景区</title>

    <!-- Bootstrap -->
    
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  
<style type="text/css">
body,button,input,select,h3,h6{
	font-family:Microsoft YaHei;
}
.head-top{
	background:#5fa022;
	padding:0.8em 0;
}
.navbar-brand{
	padding:0 0;
}
.navbar-brand>img{
	height:auto;
	margin-right:5px;
	margin-top:5px;
	width:250px;
}
.navbar-default{
	padding:1.5em 0;
	background-color:#f2f0f1;
	box-shadow:12px -5px 39px -12px;
}
.navbar-default .navbar-nav>li a{
	top:10px;
	padding:0.5em 2em;
	text-decoration:none;
	font-weight:600;
	font-size:1.2em;
	color:#919191;
}
.navbar-default .navbar-nav>li >a:hover,
.navbar-default .navbar-nav>li >a:focus{
	background:#600;
    color:white;
    border-radius:3px;
	-webkit-border-radius:3px;
}
.navbar-right>a{
    color:#600;
}
@media (max-width:970px){
   .navbar-default .navbar-nav>li a{
       font-size:1.1em;
   }
}
	  
.search{
	background-image:;
    background-size:cover;
    -webkit-background-size:cover;
	min-height:500px;
    margin-top:-20px;
}
.reservation{
	padding:60px 60px;
	width:50%;
	background:rgba(255,255,255,0.7);
	margin:0 auto;
	margin-top:15%;
	font-weight:500;
	color:#f2f0f1;
	font-size:1.2em;
	outline:none;
}
.btn{
	width:50%;
	background:#600;
	color:#fff;
	padding:5px;
	border:none;
	border-radius:4px;
    -webkit-border-radius:4px;
}
.form-control{
	color:#8e908d;
}
.searchbtn{
    text-align:center;
}
@media(max-width:786px){
   .reservation{
	   padding:20px 20px;
	   width:900%;
   }
}
.hot h3{
	margin-top:-20px;
	color:#1A1A1A;
	font-size:1.5em;
	font-weight:600;
	margin:0 0 1em;
	padding:0 0 0.5em;
	border-bottom:2px solid #eee;
}
.hot p{
	color:#5fa022;
	font-size:1em;
	font-weight:400;
	line-height:1.8em;
	margin:1em 0;
}
.hot{
	padding:3em 0;
	border:1px solid #eee;
	margin:0 0;
}
.hot h6{
	color:#C15162;
	font-size:1.5em;
	font-weight:400;
	margin:0.3em 0;
}
a.morebtn{
	display:block;
	font-size:1em;
	color:#FFF;
	text-decoration:none;
	font-weight:400;
	background:#600;
	padding:10px 18px;
	transition:0.5s all ease;
	-webkit-transition:0.5s all ease;
	border-radius:3px;
	-webkit-border-radius:3px;
}
a.morebtn:hover{
	background:#5fa022;
}
@media(max-width:1024px){
	a.morebtn{
		max-width:410px;
	}
}
.navbar-brand>img{
	height:auto;
	width:250px;
	margin-right:5px;
	margin-top:5px;
}
.nav-pills>li>a{
	color:#8e908d;
}
.nav-pills>li.active>a, .nav-pills>li.active>a:focus,.nav-pills>li.active>a:hover{
	color:#fff;
	background-color:#5A9522;
}
.choose{
	border:1px solid silver;
}
.tab-content{
	margin:5px;
	text-align:center;
}
.pic{
	margin:0 auto;
	width:800px;
	padding:20px;
}
.carousel{
	background:white;
}
@media(max-width:992px){
	.pic{
		width:415px;
	}
}
.footer p{
	color:#fff;
	font-size:1em;
	line-height:1.8em;
	vertical-align:middle;
	margin:0.4em 0;
}
.footer p a{
	color:#fff;
	text-decoration:none;
}
.footer{
	padding:1em 0;
	background-color:#600;
}
.footer-right ul{
	padding:0;
}
.footer-right li{
	display:inline-block;
	margin:0 1em;
}
.footer-left{
	float:left;
}
.footer-right{
	float:right;
}
.glyphicon{
	font-size:1.2em;
	color:#f2f0f1;
}
    .navbar-brand1 {	padding:0 0;
}

	
/*	第一大块*/
	/*  左边图片*/
	.left-imgbox{height:300px;width: 100%; background-size: cover;border-radius: 10px;}
	.left-img{height: 100%;}
	
/*	last*/
	.ms-imgbox{text-align: center;height: 190px; overflow: hidden;}
	.ms-img{width:auto;height:120px;}
</style>
</head>
<body>
<!-- header -->
<header>
    <div class=""></div>
    <nav class="navbar navbar-default" >
        <div class="container-fluid">
            <div class="container">
                <span class="navbar-header"><a href="#" class="navbar-brand1" ><img src="image/logo/logo.png" width="52" height="44"></a></span>
                <div class="navbar-header"><a href="#" class="navbar-brand1" ><img src="image/logo/logo2.png" width="209" height="77"></a><!-- 当进入最小设备时，导航条将隐藏，显示“汉堡按钮”，点击时可以切面显示导航条隐藏的信息
                          * data-target ：用于确定需要显示div
                      -->
                     
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                        <span class="sr-only">汉堡按钮</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
              </button>
              </div>
                <!-- 导航链接、表单和其他内容切换 -->
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">网站首页</a></li>
                        <li><a href="fy3.php">艺术殿堂</a></li>
                        <li><a href="fy1.php">走进景区</a></li>
<!--                        <li><a href="fy2.php">风土人情</a></li>-->
                        <li><a href="fy4.php">景点对焦</a></li>
                        <li><a href="fy5.php">文化产业</a></li>
<!--                        <li><a href="fy6.php">旅游动态</a></li>-->
                    </ul>
                </div>
          </div>
         </div>
    </nav>
</header>

<!--
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<div class="left-imgbox"><img src="image/6.jpg" width="616" height="419"></div>
		</div>
		<div class="col-md-7">
			<p style="font-size: 24px;">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;古堰画乡庙会活动首先举行抬龙王、穆龙的雕像和高举历代先贤画像的游行队伍，以及跑马灯、荷花灯、打莲香、篾龙、布龙、狮子灯、腰鼓等多支文艺队伍，共277人。古堰先贤巡游队伍和文艺踩街队伍从保定村出发,沿古堰画乡游步道到堰头村龙庙返回到古堰画乡码头。举行了隆重的祭拜古堰先贤仪式。然后，丽水鼓词、处州乱弹(班师回朝、八仙镇水牛)、翻龙泉、跑马灯、荷花灯等队伍现场进行了现场表演。观众达10000余人。

			</p>
		</div>
	</div>
    <hr>
    
		<div class="col-md-5">
			<div class="left-imgbox"><img src="image/10.jpg" width="616" height="419"></div>
		</div>
		<div class="col-md-7">
			<p style="font-size: 24px;">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;古堰画乡庙会活动首先举行抬龙王、穆龙的雕像和高举历代先贤画像的游行队伍，以及跑马灯、荷花灯、打莲香、篾龙、布龙、狮子灯、腰鼓等多支文艺队伍，共277人。古堰先贤巡游队伍和文艺踩街队伍从保定村出发,沿古堰画乡游步道到堰头村龙庙返回到古堰画乡码头。举行了隆重的祭拜古堰先贤仪式。然后，丽水鼓词、处州乱弹(班师回朝、八仙镇水牛)、翻龙泉、跑马灯、荷花灯等队伍现场进行了现场表演。观众达10000余人。

			</p>
		</div>
	</div>
    
    <br/>
-->
    
		<?php
	include "inc/pdo.php";
	?>
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
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="left-imgbox" style="background-image: url('<?php echo $res['messageImgAdd']; ?>')"></div>
			</div>
			<div class="col-md-7" style="overflow-y: hidden;">
				<p style="font-size: 24px;">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $res['messageContent']; ?>
				</p>
			</div>
		</div>
	</div>
							<hr />
						<?php
					}
				
			}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}

			?>
			    
    
  
</div>
	</div>
<!--footer-->  
<footer class="footer">
<div class="container">
<div class="footer-left">
<p>Copyrights&nbsp;&nbsp;@&nbsp;&nbsp;2018&nbsp;&nbsp; ZhangQing|&nbsp;&nbsp; 版权所有<a href="#"></a></p>
</div>
<div class="footer-right">
<ul>
<li><a href="#"><i class="glyphicon glyphicon-phone-alt">&nbsp;联系我们</i></a></li>
<li><a href="#"><i class="glyphicon glyphicon-map-marker">&nbsp;景点地址</i></a></li>
<li><a href="#"><i class="glyphicon glyphicon-question-sign">&nbsp;广告招租</i></a></li>
</ul>
</div>
</div>
</footer>
<!--footer-->
</body>
</html>
