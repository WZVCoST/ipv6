
<style>

.imgsize{ width:100px; height:100px}
.asize{ font-size:20px}
.update{ float:right}
.videoshow{ background-color:#CCC; padding:10px; border-radius:8px;}
.textareawidth{ width:100%;/*自动适应父布局宽度*/  
 overflow:auto;  
 word-break:break-all; }
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
            	<img src="<?php echo $imgAddress;?>" class="imgsize" /><br />
                <label class="control-label"><?php echo $userName;?></label><br />
                <a href="log_out.php">注销</a>
            </div>
            <div class="col-md-4"></div>
        </div>
        <br />
        
    <div>
        <div class="row">
        <label class="control-label col-md-4" for="title"><p>我的发布：</p></label>
        <div class="col-md-4">
        
			<?php
			try{ 
					$query = "select * from video where ownedUser='$userMail'";
					$result = $pdo->prepare($query);
					$result->execute();
		while($res=$result->fetch(PDO::FETCH_ASSOC))
		{
			//遍历视频**********************************************************************************************
			echo "<div class='videoshow'>
					<a href='videoplay.php?new=".$res['videoID']."'class='asize'>".$res["videoTitle"]."</a>
					<br />
					<small>".$res["videoAbout"]."</small>
					<a href='update.php?videoID=".$res['videoID']."' class='update'>更改信息</a>
				</div>
				<br />";
			

			}


print_r($res);
				
			}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}
?>
        </div>
        <div class="col-md-4"></div>
		</div>
        <br />
    </div>
        
           <div class="row">
        	<div class="col-md-4"></div>
        	<div class="col-md-4 text-center">
            	<h3>视频上传</h3>
        	</div>
        	<div class="col-md-4"></div>
        </div>
        <br />
        
         <div class="row">
        <label class="control-label col-md-4" for="title">视频标题：</label>
        <div class="col-md-4">
        <input class="form-control" type="text" name="videoTitle" placeholder="输入标题名称" id="title" required>
        </div>
        <div class="col-md-4"></div>
		</div>
        <br />
        
         <div class="row">
        <label class="control-label col-md-4" for="about">视频描述：</label>
        <div class="col-md-4">
        <textarea class="active textareawidth" name="videoAbout" id="about" rows="3" required></textarea>
        </div>
        <div class="col-md-4"></div>
		</div>
        <br />
        
        <div class="row">
			<label class="control-label col-md-4" >视频上传：</label>
			<div class="col-md-4 text-center">
            	<input type="file" name="videoFile" required><br />
                <button class="btn btn-default" type="submit">开始上传</button>
            </div>
			<div class="col-md-4"></div>
		</div>
        
    </div>
</div>
</form>

</body>
</html>
