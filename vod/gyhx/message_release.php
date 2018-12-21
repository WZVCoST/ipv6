<?php
//测试信息
session_start();
$messageTitle = $_POST["messageTitle"];
$messageContent = $_POST["messageContent"];
$messageImgAdd = $_FILES["messageImgAdd"];
$messageType = $_POST["messageType"];
$messageDateTime = time();
$messageName = $_SESSION["userName"];
$b = "<br />";
echo "标题：".$messageTitle.$b."信息内容:".$messageContent.$b."消息类型：".$messageType.$b."时间戳：".$messageDateTime.$b."所属用户:".$messageName;


//文件移动部分
$fileArray = explode(".",$messageImgAdd["name"]);//用"."分割出来后缀名
$fileType = end($fileArray);//取数组的最后一个对象
//检测后缀名是否错误
if($fileType != "jpg" && $fileType != "JPG" && $fileType != "png" && $fileType != "gif" && $fileType != "jpeg"){
echo "<script>alert('上传文件格式错误!');window.history.go(-1);</script>";//报错，输出“返回”链接
exit;//结束，不执行以下代码了
}
	
//检测文件大小；以字节为单位，2'000'000相当于2MB	
if($messageImgAdd["size"] > 10000000){
		echo "<script>alert('上传文件太大');window.history.go(-1);</script>";//报错，输出“返回”链接
		exit;//结束，不执行以下代码
		}

//生成和拼接路径和文件名
$dir = "image/message_img/";//上传文件夹根目录
$saveName = time().rand(10000,99999).".".$fileType;//生成文件名
$uploadDir = $dir.$saveName;//拼接根目录路径和文件名
//echo $uploadDir;
	
move_uploaded_file($messageImgAdd["tmp_name"],$uploadDir);//移动文件
echo "<br><br>";

include "inc/pdo.php";

try{ 
		$ret=$pdo->query("insert into message(messageTitle,messageContent,messageImgAdd,messageType,messageDateTime,messageName) values (
				'{$messageTitle}',
				'{$messageContent}',
				'{$uploadDir}',
				'{$messageType}',
				'{$messageDateTime}',
				'{$messageName}'
			)");
	echo "<script>alert('提交已完成！');window.location.href='backstage.php';</script>";
}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}

?>