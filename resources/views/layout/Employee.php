<?php
class Employee extends Database{
    use Validate;
    // prop

    private $ssn,$fname,$lname,$gender,$email,$image,$dno;
    
    public function set_ssn($ssn){
        $ssn=$this->validateInput($ssn);
        $this->ssn=$ssn;
    }
    public function get_ssn(){
        return $this->ssn;
    }

    public function set_fname($fname){
        $fname=$this->validateInput($fname);
        $this->fname=$fname;
    }
    public function get_fname(){
        return $this->fname;
    }

    public function set_lname($lname){
        $this->lname=$lname;
    }
    public function get_lname(){
        return $this->lname;
    }

    public function set_gender($gender){
        $this->gender=$gender;
    }
    public function get_gender(){
        return $this->gender;
    }

    public function set_dno($dno){
        $this->dno=$dno;
    }
    public function get_dno(){
        return $this->dno;
    }

    public function index(){
        $result=parent::RunDml("SELECT SSN, concat(Fname,' ',Lname) as Fullname, sex, Dname FROM employee left join departments on employee.Dno = departments.Dno");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function store(){
        
            if(empty($this->image['name'])){
                $stmt="INSERT INTO `employee`(`SSN`, `Fname`, `Lname`, `Email`, `Gender`,`Dno`) VALUES ('$this->ssn','$this->fname','$this->lname','$this->email','$this->gender','$this->dno')";
            }else{
                $image_name=$this->image['name'];
                $stmt="INSERT INTO `employee`(`SSN`, `Fname`, `Lname`, `Email`, `sex`, `Dno`) VALUES ('$this->ssn','$this->fname','$this->lname','$this->email','$this->gender','$this->dno')";
            }
            $result=parent::RunDml($stmt);
            if($result){
                return true;
            }
        
    }

}