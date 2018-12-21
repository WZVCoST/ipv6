<?php
include "head.php";
?>
<!doctype html>
<html>
<head>
<style>
.textareawidth{ width:100%;/*自动适应父布局宽度*/  
 }
</style>
<meta charset="utf-8">
<title>更新数据</title>
</head>

<body>
<div class="jumbotron";>
<br />
<?php
$videoID=$_GET["videoID"];
include "pdo.php";
try{ 
	$query = "select * from video where videoID='$videoID'";
	$result = $pdo->prepare($query);
	$result->execute();
	$res=$result->fetch(PDO::FETCH_ASSOC);
	setcookie('vdoID',$videoID);
			}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}
?>
<form action="up_date.php" method="post" class="form-horizontal">
<div class="container">
    <div class="row">
        <label class="control-label col-md-4" for"videotitle">更新的视频标题：</label>
        <div class="col-md-4">
            <input class="form-control" id="videotitle" name="reVideoTitle" placeholder="<?php echo $res['videoTitle'];?>" required>
        </div>
        <div class="col-md-4"></div>
    </div>
    <br />
    
        <div class="row">
        	<label class="control-label col-md-4" for"videotitle">更新的视频信息：</label>
        <div class="col-md-4">
           <textarea class="textareawidth" name="reVideoAbout" rows="3" placeholder="<?php echo $res['videoAbout'];?>" required></textarea>
        </div>
        <div class="col-md-4"></div>
    </div>
    <br />
    
    <div class="row">
    	<div class="col-md-4"></div>
        <div class="col-md-4 text-center">
        	<button class="btn btn-default">保存更改</button>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
</form>
</div>
<?php //************************************************************************************?>

</body>
</html>
