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
            
            $this->db->set('Player', $name);
            $this->db->set('Cash', 1000);
            $this->db->set('Type', $userType);
            $this->db->set('Password', $password);
            $this->db->insert('players');
            
            $this->session->set_flashdata('name', $name);
            $this->session->set_flashdata('pass', $password);
            
            redirect('welcome/login');
        }
}
