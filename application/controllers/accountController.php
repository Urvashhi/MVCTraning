<?php

class accountController extends framework {


    public function __construct(){
		
       
        $this->helper("link");
        $this->accountModel = $this->model('accountModel');
        
    }

    public function index(){

        $this->view("index");
    }

    public function createAccount(){
			
			
		 $userData = [

         'first_name'     => $this->input('first_name'),
		 'last_name'      => $this->input('last_name'),
         'email'        => $this->input('email'),
         'password'     => $this->input('password'),
		 'birthdate'    => $this->input('birthdate'),
		 'gender' 		=> $this->input('gender'),
		 'mobile_cc' 		=> $this->input('mobile_cc'),
		'mobile_no' 		=> $this->input('mobile_no'),
		'org_name'        => $this->input('org_name'),
		'website'        => $this->input('website'),
		'address'        => $this->input('address'),
         'city'        => $this->input('city'),
		 'country'        => $this->input('country'),
		 'post_code'        => $this->input('post_code'),
		 'types_of_org'        => $this->input('types_of_org'),
		// 'lang'        => $this->input('ch[]'),
		 'lang'        => implode(',',$_POST[ 'ch']),
		  'image'        => $this->input('image'),
		 'first_NameError'   => '',
         'last_NameError'   => '',
		 'emailError'      => '',
         'passwordError'   => '',
		'birthdateError'   => '',
		'genderError'   => '',
		'mobile_ccError'   => '',
		'mobile_noError' => '',
		'org_nameError' => '',
		'websiteError'  => '',
		'addressError'  => '',
		'cityError'  => '',
		'countryError'  => '',
		'post_codeError'  => '',
		'types_of_orgError'  => '',
		'langError'  => '',
		'imageError'  => ''
		
		];
	
        if(empty($userData['first_name'])){

            $userData['first_NameError'] = 'First Name is required';

        }
		 if(empty($userData['last_name'])){

            $userData['last_NameError'] = 'Last Name is required';

        }

        if(empty($userData['email'])){
            $userData['emailError'] = 'Email is required';
        } else {
            if(!$this->accountModel->checkEmail($userData['email'])){

             $userData['emailError'] = "Sorry this email is already exist";

            }
        }

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
            $data = [$userData['first_name'], $userData['last_name'], $userData['email'], $password, $dt, $userData['gender'], $userData['mobile_cc'], $userData['mobile_no'], $userData['org_name'], $userData['website'], $userData['address'], $userData['city'], $userData['country'], $userData['post_code'], $userData['types_of_org'], $userData['lang'], $userData['image']]; 
            if($this->accountModel->createAccount($data)){
                
                $this->setFlash("accountCreated", "Your account has been created successfully");
              $this->redirect("accountController/loginForm");
			  
            }

        } else {
            $this->view('signup', $userData);
        }

    }

    public function loginForm(){
        $this->view("login");
    }
		
  public function userLogin(){

        $userData = [

         'email'         => $this->input('email'),
         'password'      => $this->input('password'),
         'emailError'    => '',
         'passwordError' => ''

        ];

        if(empty($userData['email'])){
            $userData['emailError'] = "Email is required";
        }

        if(empty($userData['password'])){
            $userData['passwordError'] = "Password is required";
        }

        if(empty($userData['emailError']) && empty($userData['passwordError'])){

            $result = $this->accountModel->userLogin($userData['email'], $userData['password']);
            if($result['status'] === 'emailNotFound'){
                $userData['emailError'] = "Sorry invalid email";
                $this->view("login", $userData);
            } else if($result['status'] === 'passwordNotMacthed'){
                $userData['passwordError'] = "Sorry invalid password";
                $this->view("login", $userData);
            } else if($result['status'] === "ok"){
                $this->setSession("id", $result['data']);
                $this->redirect("profile");
            }

        } else {
            $this->view("login", $userData);
        }

    }
	
	 
  
}


?>