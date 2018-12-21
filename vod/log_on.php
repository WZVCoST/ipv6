<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>注册提交界面</title>
</head>

<body>
<?php

$userName = $_POST["userName"];
$pwd = md5($_POST["password"]);
$icon = $_FILES["icon"];
$mail = $_POST["mail"];
$userTel = $_POST["userTel"];
//输出测试
//echo $userName."<br />".$pwd."<br />".$icon."<br />".$mail."<br />".$userTel;

//取后缀名
$fileArray = explode(".",$icon["name"]);//用"."分割出来后缀名
$fileType = end($fileArray);//取数组的最后一个对象
//检测后缀名是否错误
if($fileType != "jpg" && $fileType != "JPG" && $fileType != "png" && $fileType != "gif" && $fileType != "jpeg"){
echo "<script>alert('上传文件格式错误!');</script>"."<br>"."<a href='index.php'>返回</a><br><br>";//报错，输出“返回”链接
exit;//结束，不执行以下代码了
}
	
//检测文件大小；以字节为单位，2'000'000相当于2MB	
if($icon["size"] > 10000000){
		echo "<script>alert('上传文件太大');</script>"."<a href='index.php'>返回</a><br><br>";//报错，输出“返回”链接
		exit;//结束，不执行以下代码
		}

//生成和拼接路径和文件名
$dir = "images/user_icon/";//上传文件夹根目录
$saveName = time().rand(10000,99999).".".$fileType;//生成文件名
$uploadDir = $dir.$saveName;//拼接根目录路径和文件名
//echo $uploadDir;
	
move_uploaded_file($icon["tmp_name"],$uploadDir);//移动文件
echo "<br><br>";	


//PDO连接
include"pdo.php";

try{ 
		$query = "select mail from users where mail='$mail'";
		$result = $pdo->prepare($query);
		$result->execute();
		$res=$result->fetch(PDO::FETCH_ASSOC);
		
	//如果记录为空
	if(empty($res))
		{
			$ret=$pdo->query("insert into users(userName,pwd,icon,mail,userTel) values (
				'{$userName}',
				'{$pwd}',
				'{$uploadDir}',
				'{$mail}',
				'{$userTel}'
			)");
	
		if($ret){
    		echo "<script>alert('注册成功!');window.location ='login.php';</script>";//执行后返回之前页面
		}
		else {
    		echo "<script>alert('注册失败!');</script>";
		}
	}
	else
	{
			 echo "<script>alert('此邮箱已存在!');window.location ='logon.php';</script>";
			 exit();
		}
	}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}
//上面是邮箱验证***********************************************************
	
/*	$insertStr="insert into users(
            userName,
			pwd,
            icon,
            mail,
            userTel
) values (?,?,?,?,?)";

$stmt =$pdo -> prepare($insertStr);

$stmt->bindParam(1,$userName,PDO::PARAM_STR);
$stmt->bindParam(2,$pwd,PDO::PARAM_STR);
$stmt->bindParam(3,$uploadDir,PDO::PARAM_STR);
$stmt->bindParam(4,$mail,PDO::PARAM_STR);
$stmt->bindParam(5,$userTel,PDO::PARAM_STR);
if($stmt->execute())
{
    echo "<script>alert('注册成功!');</script>";//执行后返回之前页面
}
else {
    echo "<script>alert('注册失败!');</script>";
}
*/
?>
</body>
</html>