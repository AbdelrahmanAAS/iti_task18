<?php
require_once "../layout/connect.php";
if(isset($_GET['ssn'])){
    $ssn=$_GET['ssn'];
}else{
    $ssn=0;
}

$empresult=$connect->query("select * from employee where SSN=$ssn");
$empData=$empresult->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            .table{
        width:80%;
        margin: auto;
        border-collapse: collapse;
        background-color: #d9e6ff;
    }
    .table, th, td{
        border:1px solid #333;
    }
    td{
        padding: 5px;
    }
    </style>
</head>
<body>
    <table class="table">
        <tr>
            <th>SSn</th>
            <td><?php echo $empData['SSN'] ?></td>
        </tr>
        <tr>
            <th>fname</th>
            <td><?php echo $empData['Fname'] ?></td>
        </tr>
        <tr>
            <th>lname</th>
            <td><?php echo $empData['Lname'] ?></td>
        </tr>
        <tr>
            <th>email</th>
            <td><?php echo $empData['Email'] ?></td>
        </tr>
        <tr>
            <th>gender</th>
            <td><?php echo $empData['Gender'] ?></td>
        </tr>
        <tr>
            <th>image</th>
            <td><img src="../layout/assets/images/employee/<?php echo $empData['ImageName'] ?>" width="100"></td>
        </tr>
        <tr>
            <th>department</th>
            <td><?php echo $empData['Dno'] ?></td>
        </tr>
    </table>
</body>
</html>