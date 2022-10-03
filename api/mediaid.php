<?php
header("Access-Control-Allow-Origin: *");
define('CACHE', true);
define('CACHE_TIME', 3600*6);//缓存时间间隔为3小时
header('Content-type:text/json'); 

if(isset($_GET['mediaid'])&&isset($_GET['page'])){
header('Content-type:text/json'); 
$geturl = 'https://api.bilibili.com/x/v3/fav/resource/list?media_id='. $_GET['mediaid'].'&pn='. $_GET['page'] .'&ps=20&keyword=&order=mtime&type=0&tid=0&platform=web&jsonp=jsonp';
$file_path = __DIR__ . '/cache/media-' .$_GET['mediaid'] . 'page-'. $_GET['page'] .'.json';
}

if(isset($_GET['seasonid'])&&isset($_GET['page'])){
header('Content-type:text/json'); 
$geturl = 'https://api.bilibili.com/x/space/fav/season/list?season_id='. $_GET['seasonid'].'&pn='. $_GET['page'] .'&ps=20&jsonp=jsonp';
$file_path = __DIR__ . '/cache/season-' .$_GET['seasonid'] . '.json';
}


if (file_exists($file_path)) {
            if ($_SERVER['REQUEST_TIME'] - filectime($file_path) < CACHE_TIME) {
                echo file_get_contents($file_path);
                exit;
            }
}


$json_strings=MCurl($geturl);
$json_strings=str_replace('#', '✘', $json_strings);
$json_strings=str_replace('http://', 'https://', $json_strings);
if (CACHE) {file_put_contents($file_path, $json_strings);}

echo $json_strings;


function MCurl($url){
$headers[] = "User-Agent: Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)";
$curl = curl_init(); // 启动一个CURL会话
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION,1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存在
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$tmpInfo = curl_exec($curl);
//关闭URL请求
curl_close($curl);
return $tmpInfo;
    }
?>