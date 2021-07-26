<?php 

class profileModel extends database {

    public function getData(){

        if($this->Query("SELECT * FROM employees")){

            $data = $this->fetchAll();
            return $data;

        }

    }
	
	public function edit_data($id){

        if($this->Query("SELECT * FROM employees WHERE id = ?", [$id])){

            $row = $this->fetch();
            return $row;

        }

    }

   public function updateEmp($updateData){

        if($this->Query("UPDATE employees SET first_name = ? , last_name= ? , email = ? , password = ? , birthdate = ? , gender = ?, mobile_cc = ? , mobile_no = ? , org_name = ? , website = ? , address = ? , city = ? , country = ? , post_code = ? , types_of_org = ? , lang = ? , image = ? WHERE id = ? ", $updateData)){

            return true;

		}

    }

	
	public function deleteEmp($id){

        if($this->Query("DELETE FROM employees WHERE id = ? ", [$id])){
			//echo $id;
            return true;
        }

    }

}


?>