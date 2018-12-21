
<style>

.imgsize{ width:100px; height:100px}
.asize{ font-size:20px}
.update{ float:right}
.videoshow{ background-color:#CCC; padding:10px; border-radius:8px;}
.go-release{ font-size:13px;}
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
            	<h1>我的发布</h1>
        	</div>
        	<div class="col-md-4"></div>
        </div>
        <br />
        <div class="row">
        	<div class="col-md-4"></div>
            <div class="col-md-4 text-center">
            	<img src="<?php echo $imgAddress;?>" class="imgsize img-rounded img-circle" /><br />
                <label class="control-label"><?php echo $userName;?></label><br />
            </div>
            <div class="col-md-4"></div>
        </div>
        <br />
       <?php //我的发布***************************************************************************************************** ?> 
    <div>
        <div class="row">
        <div class="control-label col-md-4"></div>
        <div class="col-md-4">
        
			<?php
			try{ 
					$query = "select * from video where ownedUser='$userMail'";
					$result = $pdo->prepare($query);
					$result->execute();
		while($res=$result->fetch(PDO::FETCH_ASSOC))
		{
			//遍历视频*************************
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
        <div class="row">
        	<div class="col-md-4"></div>
            <div class="col-md-4 text-right">
            	<p><a href="release.php" class="go-release">去发布 ></a></p>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
        
         

</body>
</html>
