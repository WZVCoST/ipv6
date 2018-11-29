<?php
// 从文件中读取数据到PHP变量
$json_string = file_get_contents('test.json');
// 把JSON字符串转成PHP数组
$data = json_decode($json_string, true);
// 显示出来看看
var_dump($data);
?>