<?php
class Database{
    private $connection;

    public function __construct()
    {
        try{
            $this->connection= new PDO("mysql:host=localhost;dbname=ititasks","root","");
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function RunDml($stmt){
        return $this->connection->query($stmt);
    }
}