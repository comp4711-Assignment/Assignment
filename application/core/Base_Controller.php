<?php

/****
 * Base controller that all the other controllers call upon when generating 
 * render and construct.
 */
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
	}

	/**
	 * Render this page
	 */
	function render(){
           
           $this->init_menu();
           $this->data['menubar'] = $this->parser->parse('menubar', $this->menudata,true);
           $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
            
           $this->data['data'] = &$this->data;
           $this->parser->parse('template', $this->data);
	
           
        }
        
       /***
        * Initializes the menu for the session
        */
        function init_menu() {
            if($this->session->userdata('username') == ''){
                $username = '';
                $action = 'Login';
                $userlink ='';
                $closelink = '';
                $loginlink = ' <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">';
                $reglink = ' <button type="button" class="btn btn-info btn-lg" onclick=location.href="../register">';
                $regtext = 'Register';
                $settings = '';
                $settext = '';
            } else {
                $username = $this->session->userdata('username');
                $action = 'Logout';
                $userlink = '<a href="player/'.$username.'">';
                $closelink = '</a>';
                $loginlink = ' <button type="button" class="btn btn-info btn-lg" onclick=location.href="../welcome/logout">';
                $reglink = '';
                $regtext = '';
                $settings = ' <button type="button" class="btn btn-info btn-lg" onclick=location.href="../register/userProfile">';
                $settext = 'Settings';
            }

         
            $this->menudata['menudata'] = array(
                array('name' => 'Stocks', 'link' => '/stocks'),
                array('name' => 'Players', 'link' => '/player'),
            );
            $this->menudata['username'] = $username;
            $this->menudata['loginlink'] = $loginlink;
            $this->menudata['action'] = $action;
            $this->menudata['userlink'] = $userlink;
            $this->menudata['closelink'] = $closelink;
            $this->menudata['reglink'] = $reglink;
            $this->menudata['regtext'] = $regtext;
            $this->menudata['settings'] = $settings;
            $this->menudata['settingstext'] = $settext;
            
        }

}
