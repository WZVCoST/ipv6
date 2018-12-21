<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>评论处理</title>
</head>

<body>
<?php

session_start();
//测试登录
if($_SESSION["userMail"] == NULL){echo "<script>alert('尚未登陆，请先登录');window.location ='login.php'</script>";exit();}

$commentTime=date("Y-m-d")." ".date("h:i:sa");//获取时间

$commentUser=$_SESSION["userMail"];//获取登录的用户
$videoID=$_SESSION["videoID"];//获取视频ID
//echo $videoID;
$commentText=$_POST["commentText"];//收取评论的内容
//echo $commentText;
include "pdo.php";//连接数据库

try{ 
			$ret=$pdo->query("insert into comment(ownedComment,commentUser,commentTime,commentContent) values (
				'{$videoID}',
				'{$commentUser}',
				'{$commentTime}',
				'{$commentText}'
				)");
				
			if($ret){
				echo  "<script>alert('已经评论成功！！');window.history.back();</script>";
				}else{
					echo "<script>alert('对不起，评论失败！请检查服务器或联系客服。');window.history.back();</script>";
					}
	}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}


?>
</body>
</html>