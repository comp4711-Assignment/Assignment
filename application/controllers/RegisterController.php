<?php

/************
 * The register controller that holds the functions to create the register view
 * class.
 ******/
class RegisterController extends Application {
    
    //protected $xml = null;
    
    /****
     * Constructs the registercontroller.
     */
        function __construct()
	{
		parent::__construct();
        }
 
        function display()
        {
            $this->data['pagebody'] = 'register';
            
            $this->render();
        }
        
        function validate()
        {   
            //$status = $this->bsx->getStatus();
            
            //$this->xml = simplexml_load_string($status);

            $name = $this->input->post("name");
            $password = $this->input->post("password");
            $userType = 'USER';
            
            $users = $this->players->all();
            
            foreach($users as $user)
            {
                if($user->Player == $name)
                {
                    redirect('register');
                }
            }
            redirect('welcome');
        }
}
