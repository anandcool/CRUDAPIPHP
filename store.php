<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type:application/json");
header("Access-Control-Allow-Methods:POST");
$data = json_decode(file_get_contents("php://input"));
// print_r($data);
require_once "Classes/Base.php";
$name = $data->name;
$email = $data->email;
$password = password_hash($data->password,PASSWORD_DEFAULT);
$base = new Base;

if($base->query("INSERT INTO users(name,email,password) VALUES(?,?,?)",[$name,$email,$password])){
    echo json_encode(['status'=>200,'msg'=>'Data Added Successfully']);
}

?>