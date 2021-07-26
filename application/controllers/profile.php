<?php 

class profile extends framework {

   public function __construct()
    {
		if(!$this->getSession('id')){

        $this->redirect("accountController/loginForm");

    }
	  $this->helper("link");
      $this->profileModel = $this->model("profileModel"); 
    }
    public function index(){
     //$id = $this->getSession('id');
    $data = $this->profileModel->getData();
 
      $this->view("profile", $data);
		//echo "login user.";
    }
	
	public function edit_emp($id){
      //echo $id;
		$userId = $this->getSession('id');
      $editEmp = $this->profileModel->edit_data($id, $userId);
		$userData = [
		
			'data'  		=> $editEmp,
        'first_NameError'   => '',
         'last_NameError'   => '',
		 'emailError'      => '',
         'passwordError'   => '',
		'birthdateError'   => '',
		'genderError'  		 => '',
		'mobile_ccError'   => '',
		'mobile_noError' 	=> '',
		'org_nameError' 	=> '',
		'websiteError'  	=> '',
		'addressError'  	=> '',
		'cityError' 	 	=> '',
		'countryError' 		 => '',
		'post_codeError'  	=> '',
		'types_of_orgError'  => '',
		'langError'  		=> '',
		'imageError'  		=> ''
		
      ];
      $this->view("edit_emp",$userData);

   }

	public function updateEmp(){
		
       $id = $this->input('hiddenId');
      $userId = $this->getSession('id');
      $editEmp = $this->profileModel->edit_data($id, $userId);
	// echo $editEmp;
      $userData = [

         'first_name'    => $this->input('first_name'),
		 'last_name'     => $this->input('last_name'),
         'email'        => $this->input('email'),
         'password'     => $this->input('password'),
		 'birthdate'    => $this->input('birthdate'),
		 'gender' 		=> $this->input('gender'),
		 'mobile_cc' 	=> $this->input('mobile_cc'),
		'mobile_no' 	=> $this->input('mobile_no'),
		'org_name'      => $this->input('org_name'),
		'website'       => $this->input('website'),
		'address'       => $this->input('address'),
         'city'        	=> $this->input('city'),
		 'country'      => $this->input('country'),
		 'post_code'      => $this->input('post_code'),
		 'types_of_org'   => $this->input('types_of_org'),
		// 'lang'        => $this->input('ch[]'),
		 'lang'       	 => implode(',',$_POST[ 'ch']),
		  'image'        => $this->input('image'),
		'data'           => $editEmp,
        'hiddenId'       => $this->input('hiddenId'),
        'first_NameError'   => '',
         'last_NameError'   => '',
		 'emailError'      => '',
         'passwordError'   => '',
		'birthdateError'   => '',
		'genderError'   	=> '',
		'mobile_ccError'   => '',
		'mobile_noError' 	=> '',
		'org_nameError' 	=> '',
		'websiteError'  	=> '',
		'addressError'  	=> '',
		'cityError'  		=> '',
		'countryError'  	=> '',
		'post_codeError'  	=> '',
		'types_of_orgError'  => '',
		'langError' 		 => '',
		'imageError' 		 => ''
		
 
       ];
		if(empty($userData['first_name'])){

            $userData['first_NameError'] = 'First Name is required';

        }
		 if(empty($userData['last_name'])){

            $userData['last_NameError'] = 'Last Name is required';

        }

        if(empty($userData['email'])){
            $userData['emailError'] = 'Email is required';
        }/* else {
            if(!$this->accountModel->checkEmail($userData['email'])){

             $userData['emailError'] = "Sorry this email is already exist";

            }
        }*/

        if(empty($userData['password'])){
            $userData['passwordError'] = "Password is required";
        } else if(strlen($userData['password']) < 5 ){
            $userData['passwordError'] = "Passowrd must be 5 characters long";
        }
		
		if(empty($userData['birthdate'])){

            $userData['birthdateError'] = 'Birthdate is required';

        }
		if(empty($userData['gender'])){

            $userData['genderError'] = 'Gender is required';

        }
		if(empty($userData['mobile_cc'])){

            $userData['mobile_ccError'] = 'Mobile code is required';

        }
		if(empty($userData['mobile_no'])){

            $userData['mobile_noError'] = 'Mobile number is required';

        }
		if(empty($userData['org_name'])){

            $userData['org_nameError'] = 'org_name is required';

        }
		if(empty($userData['website'])){

            $userData['websiteError'] = 'website is required';

        }
		 if(empty($userData['address'])){

            $userData['addressError'] = 'address is required';

        }
		if(empty($userData['city'])){

            $userData['cityError'] = 'City is required';

        }
		 if(empty($userData['country'])){

            $userData['countryError'] = 'Country is required';

        }
		if(empty($userData['post_code'])){

            $userData['post_codeError'] = 'post_code is required';

        }
		
		if(empty($userData['types_of_org'])){

            $userData['types_of_orgError'] = 'types_of_org is required';

        }
		 if(empty($userData['lang'])){

            $userData['langError'] = 'Lang is required';

        }
		 
		 if(empty($userData['image'])){

            $userData['imageError'] = 'Image is required';

        }
		 
		

        if(empty($userData['first_nameError']) && empty($userData['last_NameError']) && empty($userData['emailError']) && empty($userData['passwordError']) && empty($userData['birthdateError']) && empty($userData['genderError']) && empty($userData['mobile_ccError']) && empty($userData['mobile_noError']) && empty($userData['org_nameError']) && empty($userData['websiteError']) && empty($userData['addressError'])  && empty($userData['addressError'])   && empty($userData['cityError'])  && empty($userData['countryError'])  && empty($userData['post_codeError'])  && empty($userData['types_of_orgError']) && empty($userData['imageError'])){
            
           // $password =md5($userData['password']);
			 $password = password_hash($userData['password'], PASSWORD_DEFAULT);
			$dt=date('Y-m-d',strtotime($userData['birthdate']));
            $updateData = [$userData['first_name'], $userData['last_name'], $userData['email'], $password, $dt, $userData['gender'], $userData['mobile_cc'], $userData['mobile_no'], $userData['org_name'], $userData['website'], $userData['address'], $userData['city'], $userData['country'], $userData['post_code'], $userData['types_of_org'], $userData['lang'], $userData['image'], $userData['hiddenId']]; 
            if($this->profileModel->updateEmp($updateData)){
                
                $this->setFlash("empUpdated", "Your record has been updated successfully");
              
				$this->redirect("profile/index");
				//echo "updated data";
            }
			//echo "updated data";

        } else {
            $this->view('edit_emp', $userData);
        }

       
    }
    
   

	
	public function delete($id){

      $userId = $this->getSession('id');
      if($this->profileModel->deleteEmp($id , $userId)){
        $this->setFlash('deleted', 'Your data has been deleted successfully');
        $this->redirect('profile/index');
      }

    }

    public function logout(){

        $this->destroy();
        $this->redirect("accountController/loginForm");

    }

}


?>