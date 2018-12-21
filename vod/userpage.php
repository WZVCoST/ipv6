
<style>

.imgsize{ width:150px; height:150px;}
.asize{ font-size:20px}
.update{ float:right}
.videoshow{ background-color:#CCC; padding:10px; border-radius:8px;}
.textareawidth{ width:100%;/*自动适应父布局宽度*/  
 overflow:auto;  
 word-break:break-all; }
.invideo{ background-color:#DDD; padding:8px;border-radius:8px;}
</style>

 



<?php
include"head.php";
//session_start();
if($_SESSION["userMail"] == NULL){echo "<script>alert('尚未登陆，请先登录');window.location ='login.php'</script>";exit();}

$userMail = $_SESSION["userMail"];
//echo "测试："."user:".$userMail;

include"pdo.php";

try{ 
		$query = "select * from users where mail='$userMail'";
		$result = $pdo->prepare($query);
		$result->execute();
$res=$result->fetch(PDO::FETCH_ASSOC);


//print_r($res);

$userName = $res["userName"];
}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}
			
			
$imgAddress=$res["icon"];
echo $imgAddress;


?>



<form class="form-horizontal" method="post" action="video_upload.php" enctype="multipart/form-data">
<div class="jumbotron">
	<div class="container">
    
    	<div class="row">
        	<div class="col-md-4"></div>
        	<div class="col-md-4 text-center">
            	<h1>用户中心</h1>
        	</div>
        	<div class="col-md-4"></div>
        </div>
        
        <div class="row">
        	<div class="col-md-4"></div>
            <div class="col-md-4 text-center">
            	<img src="<?php echo $imgAddress;?>" class="imgsize img-rounded img-circle" /><br />
                <label class="control-label"><?php echo $userName;?></label><br />
                <a href="log_out.php">注销</a>
            </div>
            <div class="col-md-4"></div>
        </div>
        <br />
        
    <div>
        <div class="row">
        <label class="control-label col-md-4" for="title"><p>我的收藏：</p></label>
        <div class="col-md-4">
        
			<?php
			//***输出收藏部分
			try{ 
					$query = "select * from follow where followUser='$userMail'";
					$result = $pdo->prepare($query);
					$result->execute();
		while($res=$result->fetch(PDO::FETCH_ASSOC))
		{
			//遍历视频*****内嵌套*****************************************************************************************
					try{ 
							$videoSql = "select * from video where videoID='{$res['followVideo']}'";
							$followVideoID = $pdo->prepare($videoSql);
							$followVideoID->execute();
				while($videoRes=$followVideoID->fetch(PDO::FETCH_ASSOC))
				{
					//echo $videoRes["videoAdd"];
							?>
                            
                    <!-- 输出小收藏的块*****************************************************************-->
							  <div class="text-left invideo">
					<h3>
						<a href="videoplay.php?new=<?php echo $videoRes["videoID"]; ?>"> 
						<?php echo $videoRes["videoTitle"]; ?>
						</a>
					</h3>
					<small><?php echo $videoRes["videoAbout"]; ?></small>
					
					</div>
				<br>
                 <!-- 结束小收藏的块*****************************************************************-->
                 
                    <?php
					}
					}catch(Exception $e){
					echo $e->getMessage()."<br>";
					}
			
			//echo $res["followVideo"];
			}
//print_r($res);
				
			}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}
?>
        </div>
        	<div class="col-md-4"></div>
		</div>
        <br />
    </div>

</div>


</body>
</html>
