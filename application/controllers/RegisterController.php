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
        
        function userProfile()
        {
            $this->data['pagebody'] = 'userSettings';
            $this->data['user'] = $this->session->userdata('username');
            
            $this->render();
        }
        
        function update()
        {
            $name = $this->session->userdata('username');
            $type = $this->session->userdata('type');
            
            $pass = $this->input->post('pass');
            if($pass == '')
            {
                redirect('register/userProfile');
            }
            
            $cash = $this->players->get($name)->Cash;
            $avatar = $this->players->get($name)->Avatar;
            
            $rec = array(
                'player' => $name,
                'Cash' => $cash,
                'Type' => $type,
                'Password' => $pass,
                'Avatar' => $avatar
            );
            
            $this->players->update($rec);
            redirect('welcome');
        }
        
        function upload()
        {
            $name = $this->session->userdata('username');
            //$filepath = './data/uploads/' . $name;
            $config['upload_path'] = './data/uploads/';
            $config['allowed_types'] = 'gif|jpg|png|bmp';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $name;
            $config['max_size']	= '256';
            $config['max_width']  = '256';
            $config['max_height']  = '256';
            
            $this->load->library('upload', $config);
            
            if($this->upload->do_upload("avatar"))
            {
                $data = array('upload_data' => $this->upload->data());
                $filepath = '../data/uploads/' . $data['upload_data']['file_name'];
                $rec = array(
                    'player' => $this->players->get($name)->Player,
                    'Cash' => $this->players->get($name)->Cash,
                    'Type' => $this->players->get($name)->Type,
                    'Password' => $this->players->get($name)->Password,
                    'Avatar' => $filepath
                );
                $this->players->update($rec);
                redirect('welcome');

                //echo $filepath;
            }
            //echo $this->upload->display_errors('<p>', '</p>');
            redirect('register/userProfile');
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
