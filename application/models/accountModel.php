<?php

class accountModel extends database {


    public function checkEmail($email){

        if($this->Query("SELECT email FROM employees WHERE email = ?", [$email])){

            if($this->rowCount() > 0 ){
                return false;
            } else {
                return true;
            }
        }
    }
	 

    public function createAccount($data){

        if($this->Query("INSERT INTO employees (first_name, last_name, email, password, birthdate, gender, mobile_cc, mobile_no, org_name, website, address, city, country, post_code, types_of_org, lang, image) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $data)){
            return true;
        }

    }

   public function userLogin($email, $password){

        if($this->Query("SELECT * FROM employees WHERE email = ? ", [$email])){
			//$res=$this->Query("SELECT * FROM employees WHERE email = ? ", [$email])
            //echo $email;		echo $password;
            if($this->rowCount() > 0 ){

                $row = $this->fetch();
                $dbPassword = $row->password;
				//echo ($dbPassword);die();
                $userId = $row->id;
                if(password_verify($password, $dbPassword)){

                    return ['status' => 'ok', 'data' => $userId];

                } else {
                    return ['status' => 'passwordNotMacthed'];
                }

            } else {
                return ['status' => 'emailNotFound'];
            }
        }
    }
}


?>