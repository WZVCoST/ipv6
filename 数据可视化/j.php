<?php
	$pdo=new  PDO("mysql:host=127.0.0.1; dbname=iot; port = 3306","root","123456");
	$pdo->query("SET NAMES utf8");
	$slq="SELECT createdTime,thing ,data  from things  where thing ='Hem1'  order by id desc limit 100  ";
	$cl_sql=$pdo->prepare($slq);
	$cl_sql->execute();
	$sc_sql=$cl_sql->fetchAll(PDO::FETCH_ASSOC);
	
	
	$b = array();

	foreach ($sc_sql as $val)
	{
		$b[] = array('name'=>"湿度", 'y' =>  floatval($val['data']) );
		//$b[] = array('name'=>$val['createdTime'], 'y' =>  floatval($val['data']) );
		//echo "<br>";
		//var_dump(floatval($val['data']) );
		
	}	
  
    $data = json_encode($b);
	
    echo($data);
?>