<?php header('Content-type:text/json');

$json['video']=array(//收藏
    '168960083',//漫画家系列
    '172982283',//音乐
    '168951983',//动画短片
    );
$json['season']=array(//订阅
    '134',//绵羊料理
    );

echo json_encode($json);

?>