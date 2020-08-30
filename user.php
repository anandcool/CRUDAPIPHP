<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type:application/json");
header("Access-Control-Allow-Methods:GET");
require_once "Classes/Base.php";
$base = new Base;
$id = $pageNum;
if($base->query("SELECT * FROM users WHERE id =?",[$id])){
    if($base->count() > 0){
        $users = $base->single();
        echo json_encode(['status'=>200,'users'=>$users]);
    }else{
        echo json_encode(['status'=>404,'msg'=>'No user found on that id of '.$id]);
    }
}
?>