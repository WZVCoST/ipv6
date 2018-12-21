<?php
	$dbms='mysql';
	$dbName='vod';
	$user='nlh';
	$pdoPwd='19820222.';
	$host='127.0.0.1';
	$dsn="$dbms:host=$host;dbname=$dbName";
	try{             
		$pdo=new PDO($dsn,$user,$pdoPwd);
		//echo "PDO 连接数据库成功";
		 $head = "set names utf8";
		$heads = $pdo->prepare($head);
		$heads->execute();
		}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}
			
?>