<?php
error_reporting(-1);  
date_default_timezone_set('PRC'); 
$pdo=new  PDO("mysql:host=127.0.0.1; dbname=iot; port = 3306","root","123456");
$pdo->query("SET NAMES utf8");
	
	$things = $_GET['things'];
	$data = $_GET['data'];
	$createdTime = date('y-m-d H:i:s',time());
	
	function getIP() /*获取客户端IP*/ 
	{ 
		if (@$_SERVER["HTTP_X_FORWARDED_FOR"]) 
		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"]; 
		else if (@$_SERVER["HTTP_CLIENT_IP"]) 
		$ip = $_SERVER["HTTP_CLIENT_IP"]; 
		else if (@$_SERVER["REMOTE_ADDR"]) 
		$ip = $_SERVER["REMOTE_ADDR"]; 
		else if (@getenv("HTTP_X_FORWARDED_FOR")) 
		$ip = getenv("HTTP_X_FORWARDED_FOR"); 
		else if (@getenv("HTTP_CLIENT_IP")) 
		$ip = getenv("HTTP_CLIENT_IP"); 
		else if (@getenv("REMOTE_ADDR")) 
		$ip = getenv("REMOTE_ADDR"); 
		else 
		$ip = "Unknown"; 
		return $ip; 
	} 
	
 
    $ip = getIP() ;
    
	
	
	
	$sql2 = "insert into  things(thing,data,createdTime,thingsIP) values(?,?,?,?)";
	$stmt = $pdo->prepare($sql2);
	$stmt->bindValue(1,$things);
	$stmt->bindValue(2,$data);
	$stmt->bindValue(3,$createdTime);
	$stmt->bindValue(4,$ip);
	if($stmt->execute())
	{
			echo "OK";	
		   
	}   


echo 	$things."<br/>";
echo  $data."<br/>";
echo $createdTime."<br/>";
echo $ip."<br/>";
	


	
	


?>