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
		$this->data['title'] = 'Stock Ticker';	// our default title
		$this->errors = array();
		$this->data['content'] = 'Welcome';   // our default page
	}

	/**
	 * Render this page
	 */
	function render(){
		
           //$this->data['menubar'] = $this->parser->parse('_menubar', $this->config->item('menu_choices'),true);
            
	}

}
