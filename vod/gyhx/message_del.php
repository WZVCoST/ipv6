<?php
$messageID=$_GET["msgid"];
echo $messageID;

include "inc/pdo.php";
$msgdelSql="delete from message where messageID='{$messageID}'";
$msgdelQueryOut=$pdo->query($msgdelSql);
echo "<script>window.history.go(-1);</script>";
?>