<!DOCTYPE HTML>
<html>
<head>
<title>给我选择留言</title>
<style>
body{
	background-color:#DDD;
	margin:0 auto;
}
.jxq{
	margin:0 auto;
	width:100%;
	height:300px;
}
p{
	color:#333;
	font-size:44px;
}
.center{
	margin:0 auto;
	text-align:center;
}
</style>
</head>
<body>
<script>
alert("抽到什么就要给我留言什么呦");
</script>
<div class="jxq"></div>
<div class="center">
<?php
$strNum=rand(1,9);
switch($strNum)
{
    case 1:
        echo"<p>我一直在原地等你</p>";
        break;
	case 2:
		echo"<p>你是我见过最美丽的风景</p>";
		break;
    case 3:
        echo"<p>别怕，有我在！</p>";
        break;
    case 4:
        echo"<p>我的肩膀永远是你的依靠</p>";
        break;
    case 5:
        echo"<p>我懂你</p>";
        break;
    case 6:
        echo"<p>还有我</p>";
        break;
    case 7:
        echo"<p>你是我的</p>";
        break;
    case 8:
        echo"<p>我们永远不要分开</p>";
        break;
    case 9:
        echo"<p>让我牵起你的手</p>";
        break;
}
?>
</div>

</body>
</html>
