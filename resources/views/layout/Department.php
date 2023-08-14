<?php
class Department extends Database{
    // prop

    public function index(){
        $result=parent::RunDml("select Dno,Dname from departments");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

}