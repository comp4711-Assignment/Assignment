<?php

class Stocks extends Application {
    
    function __construct()
    {
	parent::__construct();
    }
    
    function display($name = null) {
        $this->data['pagebody'] = 'stock';
        $this->data['stockname'] = $name;
        $this->data['stockdata'] = $this->db->get('stocks')->row()->Value;
        $this->render();
    }
}