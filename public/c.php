<?php
 function getTime($url)
{
    //获取视频重定向后的链接
    $location = locationUrl($url);
    //获取视频Content-Length
    $responseHead = get_data($location);
    $list1 = explode("Content-Length: ", $responseHead);

    $list2 = explode("Connection", $list1[1]);
    $list = explode("x", $list2[0]);
    return $list[0];
}
echo getTime("http://www.online.com/admin/shiping/pre_fe7ecc4de28b2c83c016b5c6c2acd8261561361905.mkv");
//获取视频重定向后的链接
function locationUrl($url){
    $url_parts = @parse_url($url);
    if (!$url_parts) return false;
    if (!isset($url_parts['host'])) return false;
    if (!isset($url_parts['path'])) $url_parts['path'] = '/';
    $sock = fsockopen($url_parts['host'], (isset($url_parts['port']) ? (int)$url_parts['port'] : '80'), $errno, $errstr, 30);
    if (!$sock) return false;
    $request = "HEAD " . $url_parts['path'] . (isset($url_parts['query']) ? '?'.$url_parts['query'] : '') . " HTTP/1.1\r\n";
    $request .= 'Host: ' . $url_parts['host'] . "\r\n";
    $request .= "Connection: Close\r\n\r\n";
    fwrite($sock, $request);
    $response = '';
    while(!feof($sock)) {
        $response .= fread($sock, 8192);
    }
    fclose($sock);
    if (preg_match('/^Location: (.+?)$/m', $response, $matches)){
        if ( substr($matches[1], 0, 1) == "/" ){
            return $url_parts['scheme'] . "://" . $url_parts['host'] . trim($matches[1]);
        }
        else{
            return trim($matches[1]);
        }
    } else {
        return false;
    }
}
//审核视频 curl
function get_data($url){
    $oCurl = curl_init();
    //模拟浏览器
    $header[] = "deo.com";
    $user_agent = "Mozilla/4.0 (Linux; Andro 6.0; Nexus 5 Build) AppleWeb/537.36 (KHTML, like Gecko)";
    curl_setopt($oCurl, CURLOPT_URL, $url);
    curl_setopt($oCurl, CURLOPT_HTTPHEADER,$header);
    curl_setopt($oCurl, CURLOPT_HEADER, true);
    curl_setopt($oCurl, CURLOPT_NOBODY, true);
    curl_setopt($oCurl, CURLOPT_USERAGENT,$user_agent);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
    // 不用 POST 方式请求, 意思就是通过 GET 请求
    curl_setopt($oCurl, CURLOPT_POST, false);
    $sContent = curl_exec($oCurl);
    // 获得响应结果里的：头大小
    $headerSize = curl_getinfo($oCurl, CURLINFO_HEADER_SIZE);
    // 根据头大小去获取头信息内容
    $header = substr($sContent, 0, $headerSize);
    curl_close($oCurl);
    return $header;
}