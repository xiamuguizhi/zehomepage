<?php
header("Access-Control-Allow-Origin: *");
header('Content-type:text/json'); 
$json['ver']='0.1.1';
$json['avatar']='https://cdn.helingqi.com/avatar/';
$json['message']='ok';
echo json_encode($json);


?>