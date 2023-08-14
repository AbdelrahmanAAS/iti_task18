<?php
try{
    $connect= new PDO("mysql:host=localhost;dbname=ititasks","root","");
}catch(PDOException $e){
    echo $e->getMessage();
    exit();
}
