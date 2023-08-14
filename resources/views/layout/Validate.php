<?php
trait Validate{
    public function validateInput($input){
        $input=htmlspecialchars($input);
        $input=trim($input);
        $input=stripslashes($input);

        return $input;
    }

    public function checkEmail($email){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            return true;
        }
    }
}