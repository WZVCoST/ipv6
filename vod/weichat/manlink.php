<?php
//接入是传入的参数，nonce:随机数，timestamp:时间戳，echostr:随机字符串，signature:微信加密签名，token:自定义参数。
//1。接收传入的参数
$timestamp = $_GET['timestamp'];
$nonce =$_GET['nonce'];
$token ='twgdhbtzhy';
$signature =$_GET['signature'];
$echostr=$_GET['echostr'];

//2。将token、timestamp、nonce三个参数进行字典序排序
$array =array($timestamp ,$nonce,$token);
sort($array);

//3.将三个参数字符串拼接成一个字符串进行sha1加密
$tmpstr = implode('',$array);
$tmpstr = sha1($tmpstr);

//开发者获得加密后的字符串可与signature对比，标识该请求来源于微信
if( $tmpstr == $signature && $echostr)//第一次验证是会多传入一个参数，echostr
{
	echo $echostr;
	exit();
}
else
{
    if(strtolower($postobj->MsgType) == 'event')
    {
        if(strtolower($postobj->Event == 'subscribe'))
        {
            /*<xml>发送文本消息的模板
            <ToUserName><![CDATA[toUser]]></ToUserName>
            <FromUserName><![CDATA[fromUser]]></FromUserName>
            <CreateTime>12345678</CreateTime>
            <MsgType><![CDATA[text]]></MsgType>
            <Content><![CDATA[你好]]></Content>
            </xml>*/
            $touser = $postobj->FromuserName;
            $fromuser=$postobj->ToUserName;
            $time = time();
            $msgtype = 'text';
            $Conent="欢迎关注我们的微信公众号".$postobj->FromuserName.'-'.$postobj->ToUserName;
            $template ="<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[%s]]></MsgType>
			<Content><![CDATA[%s]]></Content>
			</xml>";
            $info = sprintf($template,$touser,$fromuser,$time,$msgtype,$Conent);
            echo $info;
        }
    }
}
//function reposeMsg()
//{
//	//获取推送过来的消息（xml格式）
//	$postArr=$GLOBALS['HTTP_RAW_POST_DATA'];
//	//将消息转化成对象
//	$postobj=simplexml_load_string($postArr);
//	//接收的模板消息参数
//	/*<xml>
//	<ToUserName><![CDATA[toUser]]></ToUserName>
//	<FromUserName><![CDATA[FromUser]]></FromUserName>
//	<CreateTime>123456789</CreateTime>
//	<MsgType><![CDATA[event]]></MsgType>消息类型，event
//	<Event><![CDATA[subscribe]]></Event>事件类型，关注（subscribe），取消关注（unsubscribe）
//	</xml>*/
//
//	if(strtolower($postobj->MsgType) == 'text')
//	{
//		switch(trim($postobj->Content))
//		{
//			case 1:
//				$content="您输入了数字一";
//			break;
//			case 2:
//				$content="您输入了数字二";
//			break;
//			case 3:
//				$content="您输入了数字三";
//			break;
//			case 4:
//				$content="您输入了数字四";
//			break;
//			case '名字':
//				$content="汤姆";
//			break;
//			case '年龄':
//				$content="21";
//			break;
//
//		}
//		//发送的模板消息
//			$template="<xml>
//				<ToUserName><![CDATA[%s]]></ToUserName>
//				<FromUserName><![CDATA[%s]]></FromUserName>
//				<CreateTime>%s</CreateTime>
//				<MsgType><![CDATA[%s]]></MsgType>
//				<Content><![CDATA[%s]]></Content>
//				</xml>";
//			$touser=$postobj->FromUserName;
//			$fromuser=$postobj->ToUserName;
//			$tiem=time();
//			$msgType='text';
//			$info=sprintf($template,$touser,$fromuser,$tiem,$msgType,$content);
//			echo $info;
//
//	}
//	if( strtolower($postobj->MsgType) == 'text' && trim($postobj->Content)== 'tuwen2')
//	{
//		$touser=$postobj->FromUserName;
//		$fromuser=$postobj->ToUserName;
//		$arr=array(
//				array(
//				'title'=>'imooc',
//				'description'=>"imooc is chaoshi",
//				'picurl'=>'http://www.imooc.com/static/img/common/logo.png',
//				'url'=>'http://www.imooc.com',
//				),
//				array(
//				'title'=>'baidu',
//				'description'=>"baidu is chaoshi",
//				'picurl'=>'https://www.baidu.com/img/bd_logo1.png',
//				'url'=>'http://www.baidu.com',
//				),
//				array(
//				'title'=>'hao123',
//				'description'=>"hao123 is chaoshi",
//				'picurl'=>'http://www.imooc.com/static/img/common/logo.png',
//				'url'=>'http://www.hao123.com',
//				),
//			);
//			$template="<xml>
//					<ToUserName><![CDATA[%s]]></ToUserName>
//					<FromUserName><![CDATA[%s]]></FromUserName>
//					<CreateTime>%s</CreateTime>
//					<MsgType><![CDATA[%s]]></MsgType>
//					<ArticleCount>".count($arr)."</ArticleCount>
//					<Articles>";
//		foreach($arr as $k=>$v)
//		{
//			$template.="<item>
//					<Title><![CDATA[".$v['title']."]]></Title>
//					<Description><![CDATA[".$v['description']."]]></Description>
//					<PicUrl><![CDATA[".$v['picurl']."]]></PicUrl>
//					<Url><![CDATA[".$v['url']."]]></Url>
//					</item>";
//
//		}
//			$template.="</Articles>
//					</xml>";
//		echo sprintf($template,$touser,$fromuser,time(),'news');
//
//
//	}
//	else
//	{
//		switch(trim($postobj->Content))
//		{
//			case 1:
//				$content="您输入了数字一";
//			break;
//			case 2:
//				$content="您输入了数字二";
//			break;
//			case 3:
//				$content="您输入了数字三";
//			break;
//			case 4:
//				$content="您输入了数字四";
//			break;
//			case '名字':
//				$content="汤姆";
//			break;
//			case '年龄':
//				$content="21";
//			break;
//
//		}
//		//发送的模板消息
//			$template="<xml>
//				<ToUserName><![CDATA[%s]]></ToUserName>
//				<FromUserName><![CDATA[%s]]></FromUserName>
//				<CreateTime>%s</CreateTime>
//				<MsgType><![CDATA[%s]]></MsgType>
//				<Content><![CDATA[%s]]></Content>
//				</xml>";
//			$touser=$postobj->FromUserName;
//			$fromuser=$postobj->ToUserName;
//			$tiem=time();
//			$msgType='text';
//			$info=sprintf($template,$touser,$fromuser,$tiem,$msgType,$content);
//			echo $info;
//	}
//}
?>