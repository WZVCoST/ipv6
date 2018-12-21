<?php
$userName = $_POST["userName"];
$userPassWord = md5($_POST["userPassWord"]);
$iconAdd = $_FILES["iconAdd"];
$phoneNum = $_POST["phoneNum"];
$s = "<br />";
echo $userName.$s.$userPassWord.$s.$phoneNum.$s;
var_dump($iconAdd);
include("inc/pdo.php");

//******上传头像
//取后缀名
$fileArray = explode(".",$iconAdd["name"]);//用"."分割出来后缀名
$fileType = end($fileArray);//取数组的最后一个对象
//检测后缀名是否错误
if($fileType != "jpg" && $fileType != "JPG" && $fileType != "png" && $fileType != "gif" && $fileType != "jpeg"){
echo "<script>alert('上传文件格式错误!');window.history.go(-1);</script>";//报错，输出“返回”链接
exit;//结束，不执行以下代码了
}
	
//检测文件大小；以字节为单位，2'000'000相当于2MB	
if($iconAdd["size"] > 10000000){
		echo "<script>alert('上传文件太大');window.history.go(-1);</script>";//报错，输出“返回”链接
		exit;//结束，不执行以下代码
		}

//生成和拼接路径和文件名
$dir = "image/user_icon/";//上传文件夹根目录
$saveName = time().rand(10000,99999).".".$fileType;//生成文件名
$uploadDir = $dir.$saveName;//拼接根目录路径和文件名
//echo $uploadDir;
	
move_uploaded_file($iconAdd["tmp_name"],$uploadDir);//移动文件
echo "<br><br>";

//******插入记录
try{ 	
		$query = "select userName from user where mail='$userName'";
		$result = $pdo->prepare($query);
		$result->execute();
		$res=$result->fetch(PDO::FETCH_ASSOC);

	//如果记录为空
	if(empty($res))
		{
			$ret=$pdo->query("insert into user(userName,userPassWord,iconAdd,phoneNum,class) values (
				'{$userName}',
				'{$userPassWord}',
				'{$uploadDir}',
				'{$phoneNum}',
				0
			)");
	
		if($ret){
    		echo "<script>alert('申请提交成功!');window.history.go(-1);</script>";//执行后返回之前页面
		}
		else {
    		echo "<script>alert('申请提交失败!');window.history.go(-1);</script>";
		}
	}
	else
	{
			 echo "<script>alert('此用户名已存在!');window.history.go(-1);</script>";
			 exit();
		}
	}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}


?>