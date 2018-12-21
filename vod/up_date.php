<?php
include "head.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>更新处理</title>
</head>
<?php
include "pdo.php";
$videoTitle=$_POST["reVideoTitle"];
$videoAbout=$_POST["reVideoAbout"];
$videoID = $_COOKIE["vdoID"];
?>
<body>
<div class="jumbotron">
<br /><br />
<?php 
//echo $videoAbout.$videoTitle.$videoID;

try{ 
		//UPDATE 表名称 SET 列名称 = 新值 WHERE 列名称 = 某值
		$query = "UPDATE video SET videoTitle = '$videoTitle' WHERE videoID = '$videoID'";
		$result = $pdo->prepare($query);
		$result->execute();
		
		$query2 = "UPDATE video SET videoAbout = '$videoAbout' WHERE videoID = '$videoID'";
		$result2 = $pdo->prepare($query2);
		$result2->execute();
		
		echo "<script>alert('更新信息成功！');window.location ='userpage.php';</script>";


}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}
?>

</div>
</body>
</html>