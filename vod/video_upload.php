<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>视频上传处理</title>
</head>

<body>
<?php
session_start();
if($_SESSION == NULL){echo "<script>alert('尚未登陆，请先登录');window.location ='login.php'</script>";}
$ownedUser = $_SESSION["userMail"];//获取所有者
$videoTitle = $_POST["videoTitle"];//获取标题
$videoAbout = $_POST["videoAbout"];//获取视频信息
$postTime = date("Y-m-d")." ".date("h:i:sa");//获取时间
$videoFile = $_FILES["videoFile"];
echo "测试："."<br />".$ownedUser."<br />".$videoTitle."<br />".$videoAbout."<br />".$postTime;

//***下面是视频上传
try{
$fileArray = explode(".",$videoFile["name"]);//用"."分割出来后缀名
$fileType = end($fileArray);//取数组的最后一个对象
//检测后缀名是否错误
if($fileType != "mp4"){
echo "<script>alert('上传文件格式错误!目前只支持MP4格式');window.location ='userpage.php';</script>"."<br>"."<a href='userpage.php'>返回</a><br><br>";//报错，输出“返回”链接
exit;//结束，不执行以下代码了
}
	
//检测文件大小；以字节为单位，2'000'000相当于2MB
//下面这个100m	
if($videoFile["size"] > 100000000){
		echo "<script>alert('对不起，视频文件过大');window.location ='userpage.php';</script>";//报错，输出“返回”链接
		exit;//结束，不执行以下代码
		}

//生成和拼接路径和文件名
$dir = "videos/";//上传文件夹根目录
$saveName = time().rand(10000,99999).".".$fileType;//生成文件名
$uploadDir = $dir.$saveName;//拼接根目录路径和文件名
//echo $uploadDir;
	
move_uploaded_file($videoFile["tmp_name"],$uploadDir);//移动文件
echo "<script>alert('文件已经上传！');window.location ='userpage.php';</script>";	
}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}

//***文件已经上传，然后就是存数据库工作。*********************************************************************************
session_start();
$userMail = $_SESSION["userMail"];
echo "测试："."user:".$userMail;

include"pdo.php";

try{ 
		$ret=$pdo->query("insert into video(ownedUser,videoAdd,videoAbout,postTime,videoTitle) values (
				'{$ownedUser}',
				'{$uploadDir}',
				'{$videoAbout}',
				'{$postTime}',
				'{$videoTitle}'
			)");
}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}
print_r($res);

?>
</body>
</html>