<?php
$pdo=new  PDO("mysql:host=127.0.0.1; dbname=iot; port = 3306","root","123456");
$pdo->query("SET NAMES utf8");
$slq="SELECT id,thing ,data  from things  limit 100  ";
$cl_sql=$pdo->prepare($slq);
$cl_sql->execute();
$sc_sql=$cl_sql->fetchAll(PDO::FETCH_ASSOC);

foreach ($sc_sql as $val)
{
	$id[]	=	$val['id'];

	$thing[]	=	$val['thing'];
	$sj[]	=	$val['data'];
	
	
}



$id = json_encode($id); //调用函数json_encode生成json数据。
$thing = json_encode($thing); 
$sj = json_encode($sj); 

$data1 = array("name"=>$id,"data"=>$thing,"sj"=>$sj);

$data1 = json_encode($data1);
file_put_contents('test.json', $data1);
?>