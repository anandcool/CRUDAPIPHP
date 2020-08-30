<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type:application/json");
header("Access-Control-Allow-Methods:PATCH");
$data = json_decode(file_get_contents("php://input"));
// print_r($data);
require_once "Classes/Base.php";
$name = $data->name;
$email = $data->email;
$password = password_hash($data->password,PASSWORD_DEFAULT);
$id = $data->id;
$base = new Base;

if($base->query("UPDATE users SET name = ?, email = ?, password= ? WHERE id = ? ",[$name,$email,$password,$id])){
    echo json_encode(['status'=>200,'msg'=>'Your record update successfully']);
}

?>