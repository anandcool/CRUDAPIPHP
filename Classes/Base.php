<?php
class Base{
    public $db;
    public $res;

    public function __construct(){
        try{
        $this->db = new PDO("mysql:host=localhost;dbname=api","root","");
        // echo "Database Connected!!";
        }catch(PDOException $e){
            echo "Database Error".$e->getMessage();
        }
    }

    public function query($query,$param=[]){

        if(empty($param)){
            $this->res = $this->db->prepare($query);
            return $this->res->execute();
        }else{
            $this->res = $this->db->prepare($query);
            return $this->res->execute($param);
        }

    }

    public function fetch(){
        return $this->res->fetchAll(PDO::FETCH_OBJ);
    }

    public function single(){
        return $this->res->fetch(PDO::FETCH_OBJ);
    }

    public function count(){
        return $this->res->rowCount();
    }
}

?>