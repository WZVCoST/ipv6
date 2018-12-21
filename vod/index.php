<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style>
.bordercolor{border:1px solid #888}
.videodiv1{ background-color:#CCC}
.videobox{float:left;}
.invideo{ background-color:#DDD; padding:8px;border-radius:8px;}
.bigvideo{ background-color:#999}
</style>
<title>VOD视频主页</title>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>

<body>
 <?php
 include"head.php";
 include"pdo.php";
 	try{ 
			$query = "select * from video";
			$result = $pdo->prepare($query);
			$result->execute();
			$res=$result->fetch(PDO::FETCH_ASSOC);
			
			}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}
 ?>
<div class="jumbotron">
	<h1 class="text-center">VOD系统</h1>
    <div class="container">
    	
<!--    	<div class="row text-center">
        	<div class="col-md-4"></div>
        	<div class="col-md-4">
            	<h3>
                	<a href="login.php">去登录 ></a>
                </h3>
            </div>
        	<div class="col-md-4"></div>
        </div>
        
       
    	<div class="row text-center">
        	<div class="col-md-4"></div>
        	<div class="col-md-4">
            	<h3>
                	<a href="logon.php">注册 ></a>
                </h3>
            </div>
        	<div class="col-md-4"></div>
        </div>
              
        
    	<div class="row text-center">
        	<div class="col-md-4"></div>
        	<div class="col-md-4">
            	
            </div>
        	<div class="col-md-4"></div>
        </div>-->
        <?php //******大视频********************************************************************?>
        <div class="row">
        	<div>
            	<h2><?php echo $res["videoTitle"];?></h2>
                <div class="col-md-8 bigvideo">
                    <video width="100%" height="450px" controls class="block-color">
      				<source src="<?php echo $res["videoAdd"]; ?>" type="video/mp4">
                    您的浏览器不支持Video标签。
                </video>
                </div>
            </div>
            <?php //************热门块******************************************************************8?>
            <div class="col-md-4">
                        <h3>
                	热门：
                </h3>
            	
				<?php //**********?>
                <?php
				 	try{ 
					$query = "select * from video";
					$result = $pdo->prepare($query);
					$result->execute();
		while($res=$result->fetch(PDO::FETCH_ASSOC))
		{
			?>
            <div class="text-left invideo">
            <h3>
                <a href="videoplay.php?new=<?php echo $res["videoID"]; ?>"> 
                <?php echo $res["videoTitle"]; ?>
                </a>
            </h3>
            <small><?php echo $res["videoAbout"]; ?></small>
            
            </div>
		<br>
            <?php
			}


//print_r($res);
				
			}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}
				?>
                <br>
            </div><!-- 右边热门的div-->
            
        </div>        
        <!--row**************-->
        <br />
        <div class="row text-left">
        	<div class="col-md-4"></div>
        	<div class="col-md-4 bordercolor">
            	<h4>测试账户:<br /><small>用于临时测试和开发</small></h4>
                <pre>
						账号：admintest@vod.com
						密码：123123
                </pre>
            </div>
        	<div class="col-md-4"></div>
        </div>
        
        
    </div>
</div>
</body>
</html>
