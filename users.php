<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type:application/json");
header("Access-Control-Allow-Methods:GET");
require_once "Classes/Base.php";
$base = new Base;

if($base->query("SELECT * FROM users")){
    if($base->count() > 0){
        $users = $base->fetch();
        echo json_encode(['status'=>200,'users'=>$users]);
    }else{
        echo json_encode(['status'=>200,'msg'=>'No record Found']);
    }
}
?>