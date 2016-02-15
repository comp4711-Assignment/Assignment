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
		$this->data['pageTitle'] = 'Welcome';   // our default page
                //$this->data['stockpanel'] = '<tr>'.'test1'.'</tr>';
                //$this->data['playerpanel'] = 'test2';
	}

	/**
	 * Render this page
	 */
	function render(){
		
           $this->data['menubar'] = $this->parser->parse('menubar', $this->config->item('menu_choices'),true);
           $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
            
           $this->data['data'] = &$this->data;
           $this->parser->parse('template', $this->data);
	}

}
