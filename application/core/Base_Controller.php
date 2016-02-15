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
		$this->data['title'] = 'Stock Ticker';	// our default title
		$this->errors = array();
		$this->data['content'] = 'Welcome';   // our default page
		$this->data['pageTitle'] = 'Welcome';   // our default page
	}

	/**
	 * Render this page
	 */
	function render(){
		
           $this->data['menubar'] = $this->parser->parse('menubar', $this->config->item('menu_choices'),true); // menubar data
           $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true); // content data
            
           $this->data['data'] = &$this->data; // base data
           $this->parser->parse('template', $this->data); // gets the base template for all pages to use
	}

}
