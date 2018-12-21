<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>古堰画乡</title>

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
	text-align: center;
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

	
/*	神奇四块*/
	.div-box{height:140px; width: 100%; overflow: hidden;}
	.line-text{font-size:17px;}
/*轮播*/
	.lbimg{width:100%;}
	.lbdiv{width:100%; height: 550px; overflow: hidden;}
/*民宿*/
	.ms-imgbox{text-align: center;height: 190px; overflow: hidden;}
	.ms-img{width:auto;height:120px;}
	
	.last-img{width:160px;}
	
/*服务指南*/
	.ser-box{
		width: 100%;
		height: 200px; text-align: center;
		padding-top: 80px;
		border-radius: 10px;
		background-size:cover;
		background-position:center;
		overflow: hidden;
		margin: 10px;
		font-size: 28px;
		color: #FFFFFF;
		cursor: pointer;
	}
</style>

<script>
	
</script>
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
                       <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
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
<!-- header -->
<div class="search">
	<div id="myCarousel" class="carousel slide">
	<!-- 轮播（Carousel）指标 -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>   
	<!-- 轮播（Carousel）项目 -->
	<div class="carousel-inner">
		<div class="item active">
			<div class="lbdiv">
				<img src="image/7.jpg" class="lbimg" alt="First slide">
			</div>
		</div>
		<div class="item">
			<div class="lbdiv">
				<img src="image/9.jpg" class="lbimg" alt="Second slide">
			</div>
		</div>
		<div class="item">
			<div class="lbdiv">
				<img src="image/gyhx.jpg" class="lbimg" alt="Third slide">
			</div>
		</div>
	</div>
	<!-- 轮播（Carousel）导航 -->
	<a class="carousel-control left" href="#myCarousel" 
	   data-slide="prev">&lsaquo;</a>
	<a class="carousel-control right" href="#myCarousel" 
	   data-slide="next">&rsaquo;</a>
</div> 
</div>
<div class="hot">
<div class="container">
<div class="col-md-3">
<h3>网站公告&nbsp;<span style="color: #000000; font-size: 16px;" class="glyphicon glyphicon-file"></span></h3>
<div class="div-box">
	<ul class="line-text">
		<li><a href="#">节假日期间门票将会优惠</a></li>
		<li><a href="#">两天后有篝火晚会</a></li>
		<li><a href="#">游客现在可以关注我们</a></li>
		<li><a href="#">现在可免费领取灯笼</a></li>
		<li><a href="#">请带走垃圾，保护环境。</a></li>
	</ul>
</div>
</div>
<div class="col-md-3">
<h3>网站新闻&nbsp;<span style="color: #000000; font-size: 16px;" class="glyphicon glyphicon-globe"></span></h3>
<div class="div-box">
	<ul class="line-text">
		<li><a href="#">风景区已经成为丽水之美</a></li>
		<li><a href="#">这个美国籍小男孩火了</a></li>
		<li><a href="#">丽水莲都最美爸爸</a></li>
		<li><a href="#">相信这个人会火的</a></li>
		<li><a href="#">这天晚上警察来到了这里</a></li>
	</ul>
</div>
</div>
<div class="col-md-3">
<h3>休闲娱乐&nbsp;<span style="color: #000000; font-size: 16px;" class="glyphicon glyphicon-send"></span></h3>
<img src="image/5.jpg" class="img-responsive" alt="蒙特斯大虾">
</div>
<div class="col-md-3">
<h3>路线推荐&nbsp;<span style="color: #000000; font-size: 16px;" class="glyphicon glyphicon-map-marker"></span></h3>
<img src="image/lx/timg.jpg" class="img-responsive" alt="路线推荐" >
</div>
</div>
</div>
<!--热卖商品结束-->


<!--民宿-->
<div class="container">
	<div class="row">
		<div class="col-md-10"></div>
		<div class="col-md-2" style="">
			<div style="height: 40px; background-color:#600; width: 100%; border-radius: 2px; margin:8px; text-align: center; padding-top: 6px; color: #FFFFFF;font-size: 18px;">民&nbsp;&nbsp;宿</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 ms-imgbox"><img class="ms-img" src="image/minsu/1.jpg" ><br /><br />泳池美浴</div>
		<div class="col-md-2 ms-imgbox"><img class="ms-img" src="image/minsu/2.jpg" ><br /><br />土家风情</div>
		<div class="col-md-2 ms-imgbox"><img class="ms-img" src="image/minsu/3.jpg" ><br /><br />风味木房</div>
		<div class="col-md-2 ms-imgbox"><img class="ms-img" src="image/minsu/4.jpg" ><br /><br />砖瓦平台</div>
		<div class="col-md-2 ms-imgbox"><img class="ms-img" src="image/minsu/5.jpg" ><br /><br />品味小茶</div>
		<div class="col-md-2 ms-imgbox"><img class="ms-img" src="image/minsu/6.jpg" ><br /><br />幽静楼阁</div>
	</div>
</div> 
<!--民宿结束-->

<!--服务指南-->
<hr />
<div class="container">
	<div class="row">
		<div class="col-md-10"></div>
		<div class="col-md-2" style="">
			<div style="height: 40px; background-color:#600; width: 100%; border-radius: 2px; margin:8px; text-align: center; padding-top: 6px; color: #FFFFFF;font-size: 18px;">服&nbsp;务&nbsp;指&nbsp;南</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="ser-box" style="background-image: url(image/minsu/8.jpg);">客房预订</div>
		</div>
		<div class="col-md-3" style="padding-left: 20px;">
			<h3>在线预定</h3>
			<hr />
			<p style="font-size: 16px;">
				·<a href="#">客房查询</a><br />
				·<a href="#">客房介绍了解</a><br />
				·<a href="#">人工服务</a><br />
				·<a href="#">客房投诉链接</a><br />
				·<a href="#">联系方式</a><br />
	
			</p>
		</div>
		<div class="col-md-3">
			<div class="ser-box" style="background-image: url(image/7.jpg);">旅游向导</div>
		</div>
		<div class="col-md-3" style="padding-left: 20px;">
			<h3>向导帮助</h3>
			<hr />
			<p style="font-size: 16px;">
				·<a href="#">组团、跟团旅游</a><br />
				·<a href="#">背景了解</a><br />
				·<a href="#">景点了解</a><br />
				·<a href="#">导游预约查询</a><br />
				·<a href="#">相机租用服务</a><br />
	
			</p>
		</div>

	</div>
</div>

<!--风景欣赏-->     
<hr />
<div class="container">
	<div class="row">
		<div class="col-md-10"></div>
		<div class="col-md-2" style="">
			<div style="height: 40px; background-color:#600; width: 100%; border-radius: 2px; margin:8px; text-align: center; padding-top: 6px; color: #FFFFFF;font-size: 18px;">风&nbsp;景&nbsp;欣&nbsp;赏</div>
		</div>
	</div>
</div>
<div class="container hidden-xs">
<div id="" class=" slide" data-ride="carousel">
<!--轮播（Carousel）项目-->
<div class="carousel-inner">
<div class="item active">
<div class="pic">
<img src="image/10.jpg" class="last-img" alt="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="image/11.jpg" class="last-img" alt="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="image/6.jpg" class="last-img" alt="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="image/13.jpg" class="last-img" alt="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
</div>
<div class="item">
<div class="pic">
<img src="image/6.jpg" class="last-img" alt="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="image/10.jpg" class="last-img" alt="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="image/13.jpg" class="last-img" alt="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="image/11.jpg" class="last-img" alt="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
</div>
</div>
<!--轮播（Carousel）导航-->
<!--
<a class="carousel-control left" href="#myCarousel" role="button" data-slide="prev">&lsaquo;</a>
<a class="carousel-control right" href="#myCarousel" role="button" data-slide="next">&rsaquo;</a>
-->
</div>
</div>
<!--轮播广告结束--> 
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
