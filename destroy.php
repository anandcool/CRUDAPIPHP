<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type:application/json");
header("Access-Control-Allow-Methods:DELETE");
$data = json_decode(file_get_contents("php://input"));
// print_r($data);
require_once "Classes/Base.php";
$id = $pageNum;
$base = new Base;

if($base->query("DELETE FROM users WHERE id = ? ",[$id])){
    echo json_encode(['status'=>200,'msg'=>'Your record Delete successfully']);
}

?>