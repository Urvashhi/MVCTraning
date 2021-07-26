<?php
class userModel{
	public function myData(){
		$first_name="kinju";
		$last_name="kohli";
		$email="kinju@gmail.com";
		$password="1234";
	
			if($this->Query("insert into employees(first_name,last_name,email,password) values(?,?,?,?)",[$first_name,$last_name,$email,$password])){
		
				return true;
		}
		else
		{
			return false;
		}
		//echo "my databade data";
	}
?>