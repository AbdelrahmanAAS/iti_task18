<?php
require_once "../layout/connect.php";
if(isset($_GET['ssn'])){
    $ssn=$_GET['ssn'];
}else{
    $ssn=0;
}

$result=$connect->query("delete from employee where SSN=$ssn");
if($result){
    header("location: index.php");
}
