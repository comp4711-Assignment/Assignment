<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2013, James L. Parry
 * ------------------------------------------------------------------------
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
		$this->data['pageTitle'] = 'Welcome';   // our default page
	}

	/**
	 * Render this page
	 */
	function render(){
		
           //$this->data['menubar'] = $this->parser->parse('_menubar', $this->config->item('menu_choices'),true);
           //$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
            
             $this->data['data'] = &$this->data;
             $this->parser->parse('template', $this->data);
	}

}
