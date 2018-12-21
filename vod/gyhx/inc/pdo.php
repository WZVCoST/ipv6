<?php
	$dbms='mysql';
	$dbName='vod';
	$user='Jianr';
	$pdoPwd='smile037.';
	$host='localhost';
	$dsn="$dbms:host=$host;dbname=$dbName";
	try{             
		$pdo=new PDO($dsn,$user,$pdoPwd);
		//echo "<br />PDO 连接数据库成功<br />";
		 $head = "set names utf8";
		$heads = $pdo->prepare($head);
		$heads->execute();
		}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}
?>