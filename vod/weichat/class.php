<?php
class weichatPlay{

    //回复图文消息
    public function responseNews($postObj,$arr)
    {
        $toUser = $postObj->FromUserName;
        $fromUser = $postObj->ToUserName;
        $time = time();
        $template = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <ArticleCount>".count($arr)."</ArticleCount>
                    <Articles>";
        foreach ($arr as $k => $v){
            $template .= "<item>
                    <Title><![CDATA[".$v['title']."]]></Title> 
                    <Description><![CDATA[".$v['description']."]]></Description>
                    <PicUrl><![CDATA[".$v['picUrl']."]]></PicUrl>
                    <Url><![CDATA[".$v['url']."]]></Url>
                    </item>";
        }

        $template .= "</Articles>
                        </xml>";
        $info = sprintf($template,$toUser,$fromUser,$time,"news");
        echo $info;
    }

    //回复文本
    public function responseText($postObj,$content)
    {
        $toUser = $postObj->FromUserName;
        $fromUser = $postObj->ToUserName;
        $msgType = "text";
        $time = time();

        $template = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[%s]]></MsgType>
            <Content><![CDATA[%s]]></Content>
            </xml>";
        $info = sprintf($template,$toUser,$fromUser,$time,$msgType,$content);
        echo $info;
    }

//    public function getWeather($area)
//    {
//        $weatherCurl = curl_init();
//        $weatherUrl = "http://apistore.baidu.com/microservice/weather?citypinyin=".$area;
//        curl_setopt($weatherCurl,CURLOPT_URL,$weatherUrl);
//        curl_setopt($weatherCurl,CURLOPT_RETURNTRANSFER,1);
//        $weatherOut = curl_exec($weatherCurl);
//        if(curl_errno($weatherCurl))
//        {
//            var_dump(curl_error($weatherCurl));
//        }
//        curl_close();
//        json_decode($weatherOut,1);
//        var_dump($weatherOut);
//    }

    //操作curl
    public function http_curl($url,$type="get",$res="json",$arr="")
    {
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $output = curl_exec($ch);
        if($type == "post")
        {
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
        }
        curl_close($ch);
        if($res == "json")
        {
            if(curl_errno($ch))
            {
                return curl_error($ch);
            }else
            {
                return json_decode($output,true);
            }
        }
    }

    //获得access_token
    public function getWxAccessToken()
    {
//        echo "<br />class前测试：exptime:".$_SESSION['expire_time']."    time:".time()."<br />";
        if($_SESSION["access_token"] && $_SESSION["expire_time"] > time())
        {//如果accessToken还没过期
//            echo "还未过期的：".$_SESSION["access_token"];
            return $_SESSION["access_token"];

        }else{
            //重新取accessToken
            $appid = "wx7ab5d4b840af2431";
            $appsecret = "e9bdc217cb80d98cf4ec55ab3cdd784f";
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret;

            $outAccessToken = $this->http_curl($url,"get","json");
//            var_dump($outAccessToken);

            $_SESSION["access_token"] = $outAccessToken["access_token"];
            $_SESSION["expire_time"] = time() + 7000;
            return $outAccessToken["access_token"];
        }
    }


}

?>