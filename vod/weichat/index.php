<?php
include "class.php";
$timestamp = $_GET["timestamp"];
$nonce = $_GET["nonce"];
$token = "twgdhbtzhy";
$signature = $_GET["signature"];
$echostr = $_GET["echostr"];

$array = array($timestamp,$nonce,$token);
sort($array);

$tmpstr = implode('',$array);
$tmpstr = sha1($tmpstr);

if($tmpstr == $signature && $echostr){
    echo $echostr;
    exit();
}else{
    responseMsg();
}

function responseMsg()
{
    $postArr = $GLOBALS["HTTP_RAW_POST_DATA"];
    $postObj = simplexml_load_string( $postArr );
    //关注事件的回复
    if( strtolower($postObj->MsgType) == "event")
    {
        if(strtolower($postObj->Event == "subscribe"))
        {
            $content = "欢迎关注本微信公众号，更多的功能还在开发之中！";
            $firstMsg = new weichatPlay();
            $firstMsg->response($postObj,$content);
        }
    }

    //图文回复
    if(strtolower($postObj->MsgType) == "text" && trim($postObj->Content) == "getpic")
    {
        $arr = array(
            array(
                'title' => '最大是百度，哈哈',
                'description' => 'objdesc',
                'picUrl'=>'http://120.27.230.232/vod/images/user_icon/149235351349399.jpg',
                'url'=>'http://www.baidu.com',
            ),
            array(
                'title' => '第二是淘宝',
                'description' => 'objdesc',
                'picUrl'=>'http://120.27.230.232/vod/images/user_icon/149235351349399.jpg',
                'url'=>'http://www.taobao.com',
            ),
            array(
                'title' => '第三是。。。自己得vod',
                'description' => 'objdesc',
                'picUrl'=>'http://120.27.230.232/vod/images/user_icon/149235351349399.jpg',
                'url'=>'http://120.27.230.232/vod/',
            ),
        );

        $resNews = new weichatPlay();
        $resNews->responseNews($postObj,$arr);
    }else{
        $content = $postObj->Content;
        $area = "";
        switch ($content)
        {
            case "温州":
                $area = "wenzhou";
                break;
            case "北京":
                $area = "beijing";
                break;
            case "王建日":
                $content = "此微信大佬";
                break;
            default:
                $content = "您输入了".$postObj->Content;
        };
        if($area != "")
        {
            $returnWeather = new weichatPlay();
            $returnWeather->getWeather($area);
//            $resText = new weichatPlay();
//            $resText->responseText($postObj, $content."weather test");
        }else {
            $resText = new weichatPlay();
            $resText->responseText($postObj, $content);
        }
    }


}
session_start();
definedItem();

//创建微信菜单
function definedItem()
{
    $access_token_test = new weichatPlay();
    echo $access_token = $access_token_test->getWxAccessToken();
    echo "<br />";
    $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
    $postArr = array(
        "button"=>array(
            array(//*******************************一级菜单1
                "name"=>urlencode("菜单1"),
                "type"=>"click",
                "key"=>"item1",
            ),
            array(//*******************************一级菜单2
                "name"=>urlencode("菜单2"),
                "sub_button"=>array(
                  array(//二级菜单1
                      "name"=>"baidu",
                      "type"=>"view",
                      "url"=>"http://www.baidu.com",
                  ),
                    array(//二级菜单2
                        "name"=>"buton2",
                        "type"=>"click",
                        "key"=>"click2_2",
                    ),
                ),
            ),
            array(//*******************************一级菜单1
                "name"=>urlencode("进优酷"),
                "type"=>"view",
                "url"=>"http://www.youku.com",
            ),
        ),
    );
    echo "<hr />";
    var_dump($postArr);
    var_dump($postArr["button"][1]["sub_button"]);
    echo "<hr />";
    echo $postJson = urldecode(json_encode($postArr));
    $menuOk = new weichatPlay();
    $res = $menuOk->http_curl($url,"post","json",$postJson);
    var_dump($res);
}
//getWxServerIp();
//function getAccessToken()
//{
//    $appid = "wx7ab5d4b840af2431";
//    $appsecret = "e9bdc217cb80d98cf4ec55ab3cdd784f";
//    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret;
//
//    $ch = curl_init();
//    curl_setopt($ch,CURLOPT_URL,$url);
//    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//    $res = curl_exec($ch);
//    if( curl_errno($ch) ){
//        var_dump(curl_error($ch));
//    }
//    curl_close($ch);
//
//    $arr = json_decode($res,true);
//    //var_dump($arr);
//    return $arr["access_token"];
//}
//
//function getWxServerIp()
//{
//    $accessToken = getAccessToken();
//    $url = "https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=".$accessToken;
//    $ch = curl_init();
//    curl_setopt($ch,CURLOPT_URL,$url);
//    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//    $res = curl_exec($ch);
//    if( curl_errno($ch) ){
//        var_dump(curl_error($ch));
//    }
//    curl_close($ch);
//
//    $arr = json_decode($res,1);
//    echo "<pre>";
//    var_dump($arr);
//    echo "</pre>";
//}

?>


