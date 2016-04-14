<?php

/************
 * The register controller that holds the functions to create the register view
 * class.
 ******/
class RegisterController extends Application {
    
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
            $name = $this->input->post("name");
            $password = $this->input->post("password");
            $userType = 'USER';
            
            echo $name;
            echo $password;
        }
}
