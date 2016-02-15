<?php

class Application extends CI_Controller {

	protected $data = array();	  // parameters for view components
	protected $id;				  // identifier for our content

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct(){
		parent::__construct();
		$this->data = array();
                $this->menudata = array();
		$this->data['title'] = 'Stock Ticker';	// our default title
		$this->errors = array();
		$this->data['content'] = 'Welcome';   // our default page
		$this->data['pageTitle'] = 'Welcome';   // our default page
                //$this->data['stockpanel'] = '<tr>'.'test1'.'</tr>';
                //$this->data['playerpanel'] = 'test2';
	}

	/**
	 * Render this page
	 */
	function render(){
           $this->init_session();
           $this->init_menu();
           $this->data['menubar'] = $this->parser->parse('menubar', $this->menudata,true);
           $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
            
           $this->data['data'] = &$this->data;
           $this->parser->parse('template', $this->data);
	}
        
        function init_session() {
            $newdata = array(
                'username' => 'Donald'
            );
            
            $this->session->set_userdata($newdata);
        }
        
        function init_menu() {
            if($this->session->userdata('username') == ''){
                $username = '';
                $action = 'Login';
                $userlink ='';
                $closelink = '';
                
            } else {
                $username = $this->session->userdata('username');
                $action = 'Logout';
                $userlink = '<a href="player/'.$username.'">';
                $closelink = '</a>';
            }

         
            $this->menudata['menudata'] = array(
                array('name' => 'Stocks', 'link' => '/stocks'),
                array('name' => 'Players', 'link' => '/player'),
            );
            $this->menudata['username'] = $username;
            $this->menudata['loginlink'] = ' <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">';
            $this->menudata['action'] = $action;
            $this->menudata['userlink'] = $userlink;
            $this->menudata['closelink'] = $closelink;  
            
        }

}
